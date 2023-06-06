<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Benevole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['index', 'create', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'budget' => 'required|integer',
            'starting_date' => 'required|date',
            'ending_date' => 'required|date|after_or_equal:starting_date',
            'image' => 'image|nullable|max:1999', // Image validation rules
        ]);

        $project = new Project();
        $project->name = $validatedData['name'];
        $project->description = $validatedData['description'];
        $project->budget = $validatedData['budget'];
        $project->starting_date = $validatedData['starting_date'];
        $project->ending_date = $validatedData['ending_date'];

        // Handle Image Upload
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/project_images', $fileNameToStore);
            $project->image = $fileNameToStore;
        }

        $project->save();

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        $benevoles = $project->benevoles;
        $boughts = $project->boughts;
        return view('projects.show', compact('project', 'boughts'), ['benevoles' => $benevoles], ['boughts' => $boughts]);
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'budget' => 'required|integer',
            'starting_date' => 'required|date',
            'ending_date' => 'required|date|after_or_equal:starting_date',
            'image' => 'image|nullable|max:1999', // Image validation rules
        ]);

        $project->name = $validatedData['name'];
        $project->description = $validatedData['description'];
        $project->budget = $validatedData['budget'];
        $project->starting_date = $validatedData['starting_date'];
        $project->ending_date = $validatedData['ending_date'];

        // Handle Image Upload
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/project_images', $fileNameToStore);

            // Delete old image if it exists
            if ($project->image != null) {
                Storage::delete('public/project_images/' . $project->image);
            }

            $project->image = $fileNameToStore;
        }

        $project->save();

        return redirect()->route('projects.index')->with('success', 'Project updated successfully');
    }

    public function destroy(Project $project)
    {
        // Delete associated image if it exists
        if ($project->image != null) {
            Storage::delete('public/project_images/' . $project->image);
        }

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
    }

    public function getBenevoles(Project $project)
    {
        $benevoles = $project->benevoles;
        return view('benevoles.index', ['benevoles' => $benevoles]);
    }

    public function getBoughts(Project $project)
    {
        $boughts = $project->boughts;
        return view('boughts.index', ['boughts' => $boughts]);
    }
}
