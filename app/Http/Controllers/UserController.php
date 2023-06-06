<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Fee;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\AdminMiddleware;
use Dompdf\Dompdf;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(AdminMiddleware::class)->only(['index','create','edit', 'update', 'destroy']);
    }

    public function index()
    {
        $users = User::all();
        $fees = Fee::all();
        return view('users.index', compact('users','fees'));
    }
    
    public function create()
    {
        return view('users.create');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'isadmin' => 'required|boolean'
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
    
        User::create($validatedData);
    
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
    
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
    
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'min:8',
            'isadmin' => 'required|boolean'
        ]);
        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }
    
        $user->update($validatedData);
    
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
    

    public function printCard(Request $request, User $user)
{
    $image = $request->file('image');

    // Create a new Dompdf instance
    $dompdf = new Dompdf();

    // Generate the HTML for the user card
    $html = '<h2 style="color:blue">Adherent Card</h2>';
    $html .= '<h1>Name: ' . $user->name . '</h1>';

    // Handle the image
    if (isset($image) && $image->isValid()) {
        // Get the image data and convert it to base64
        $imageData = base64_encode(file_get_contents($image->getPathname()));
        $imageSrc = 'data:' . $image->getClientMimeType() . ';base64,' . $imageData;

        // Add the image tag to the HTML
        $html .= '<h3 style="color:red;">HopeForAll <img style ="margin-left:3cm; height:3cm;" src="' . $imageSrc . '" alt="User Image"></h3>';
    } else {
        // Code to handle the case when no image is uploaded or the uploaded file is invalid
        $html .= '<p>No image uploaded</p>';
    }


    // Add other user details to the HTML

    // Load the HTML into Dompdf
    $dompdf->loadHtml($html);

    // Set the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to the browser
    $dompdf->stream('user_card.pdf');
}

}


