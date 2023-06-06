<?php
namespace App\Http\Controllers;

use App\Models\Benevole;
use App\Models\Project;
use Illuminate\Http\Request;

class BenevoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['index','create','edit', 'update', 'destroy']);
    }

    public function index()
    {
        $benevoles = Benevole::all();
        return view('benevoles.index', compact('benevoles'));
    }

    public function create()
    {
        $projects = Project::all();
        return view('benevoles.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:benevoles,email',
            'birthday' => 'required|date',
            'job' => 'required',
            'address' => 'required',
            'phone' => 'required',
        
        ]);

        $benevole = new Benevole();
        $benevole->name = $validatedData['name'];
        $benevole->email = $validatedData['email'];
        $benevole->birthday = $validatedData['birthday'];
        $benevole->job = $validatedData['job'];
        $benevole->address = $validatedData['address'];
        $benevole->phone = $validatedData['phone'];
       
        $benevole->save();
        

        // attach projects to the newly created Benevole
        if ($request->has('projects')) {
            $benevole->projects()->attach($request->input('projects'));
        }

        return redirect()->route('benevoles.index')->with('success', 'Benevole created successfully.');
    }

    public function show(Benevole $benevole)
    {
        
        $projects = $benevole->projects;
        return view('benevoles.show', compact('benevole', 'projects'));
    }

    public function edit(Benevole $benevole)
    {$projects = $benevole->projects;
        return view('benevoles.edit', compact('benevole','projects'));
    }

    public function update(Request $request, Benevole $benevole)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:benevoles,email,' . $benevole->id,
            'birthday' => 'required|date',
            'job' => 'required',
            'address' => 'required',
            'phone' => 'required',
        
       
            // add any other validation rules for your Benevole model
        ]);

        $benevole->update($validatedData);

        // sync projects to the updated Benevole
        if ($request->has('projects')) {
            $benevole->projects()->sync($request->input('projects'));
        } else {
            $benevole->projects()->detach();
        }

        return redirect()->route('benevoles.show', $benevole->id);
    }

    public function destroy(Benevole $benevole)
    {
        $benevole->projects()->detach();
        $benevole->delete();
        return redirect()->route('benevoles.index');
    }

    public function getProjects(Benevole $benevole)
{
    $projects = $benevole->projects;
    return view('projects.index', ['projects' => $projects]);
}
}
