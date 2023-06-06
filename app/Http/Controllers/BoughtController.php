<?php

namespace App\Http\Controllers;

use App\Models\Bought;
use App\Models\Project;
use Illuminate\Http\Request;

class BoughtController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['index','create','edit', 'update', 'destroy']);
    }

    public function index()
    {
        $boughts = Bought::with('project')->get();

        return view('boughts.index', compact('boughts'));
    }

    public function create()
    {
        $projects = Project::all();
    
        return view('boughts.create', compact('projects'));
    }
    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product' => 'required',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0',
            'project_id' => 'required|exists:projects,id',
        ]);
    
        $bought = new Bought($validatedData);
        $bought->total_cost = $validatedData['quantity'] * $validatedData['unit_price'];
        $bought->save();
    
        return redirect()->route('boughts.index')->with('success', 'Bought created successfully.');
    }
    

    public function edit(Bought $bought)
    {
        $projects = Project::all();
        return view('boughts.edit', compact('bought'),compact('projects'));
    }

    public function show($id)
{
    $bought = Bought::find($id);
    $projects = $bought->projects;
    return view('boughts.show', compact('bought'),compact('projects'));

}
public function update(Request $request, Bought $bought)
{
    $validatedData = $request->validate([
        'product' => 'required',
        'quantity' => 'required|integer|min:1',
        'unit_price' => 'required|numeric|min:0',
        'project_id' => 'required|exists:projects,id',
    ]);

    $bought->fill($validatedData);
    $bought->total_cost = $validatedData['quantity'] * $validatedData['unit_price'];
    $bought->save();

    return redirect()->route('boughts.index')->with('success', 'Bought updated successfully.');
}


    public function destroy(Bought $bought)
    {
        $bought->delete();

        return redirect()->route('boughts.index')->with('success', 'Bought deleted successfully.');
    }
}
