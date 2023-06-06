<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['edit', 'update', 'destroy']);
    }
    public function index()
    {
        $donations = Donation::all();
        return view('donation.index', compact('donations'));
    }

    public function create()
    {
        return view('donation.create');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'amount' => 'required|numeric|min:0.01',
            'message' => 'nullable|max:1000',
        ]);

        // Create a new donation with the validated data
        $donation = new Donation;
        $donation->name = $validatedData['name'];
        $donation->email = $validatedData['email'];
        $donation->amount = $validatedData['amount'];
        $donation->message = $validatedData['message'];
        $donation->save();

        // Redirect the user back to the index page with a success message
        return redirect()->route('pages.index')->with('success', 'Thank you for your donation!');
    }

    public function edit($id)
    {
        $donation = Donation::find($id);
        return view('donation.edit', compact('donation'));
    }
    public function show($id)
    {
        $donation = Donation::find($id);
        return view('donation.show', compact('donation'));
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'amount' => 'required|numeric|min:0.01',
            'message' => 'nullable|max:1000',
        ]);

        // Update the existing donation with the validated data
        $donation = Donation::find($id);
        $donation->name = $validatedData['name'];
        $donation->email = $validatedData['email'];
        $donation->amount = $validatedData['amount'];
        $donation->message = $validatedData['message'];
        $donation->save();

        // Redirect the user back to the index page with a success message
        return redirect()->route('donation.index')->with('success', 'Donation updated successfully!');
    }

    public function destroy($id)
    {
        // Find the donation and delete it
        $donation = Donation::find($id);
        $donation->delete();

        // Redirect the user back to the index page with a success message
        return redirect()->route('donation.index')->with('success', 'Donation deleted successfully!');
    }
}
