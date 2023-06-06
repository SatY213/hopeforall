<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Needer;

class NeederController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['index','create','edit', 'update', 'destroy']);
    }
    
    public function index()
    {
        $needers = Needer::all();
        return view('needers.index', compact('needers'));
    }

    public function create()
    {
        return view('needers.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:needers,email',
            'phone' => 'required',
            'type' => 'required',
            'job' => 'required',
            'address' => 'required',
            'birthday' => 'required|date',
            'children' => 'nullable',
            'salary' => 'required',
            'description' => 'required',
            
        ]);

        Needer::create($request->all());
        return redirect()->route('needers.index')->with('success', 'Needer created successfully.');
    }

    public function show(Needer $needer)
    {
        return view('needers.show', compact('needer'));
    }

    public function edit(Needer $needer)
    {
        return view('needers.edit', compact('needer'));
    }

    public function update(Request $request, Needer $needer)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:needers,email,'.$needer->id,
            'phone' => 'required',
            'type' => 'required',
            'job' => 'required',
            'address' => 'required',
            'birthday' => 'required|date',
            'children' => 'required',
            'salary' => 'required',
            'description' => 'required',
        ]);

        $needer->update($request->all());
        return redirect()->route('needers.index')->with('success', 'Needer updated successfully.');
    }

    public function destroy(Needer $needer)
    {
        $needer->delete();
        return redirect()->route('needers.index')->with('success', 'Needer deleted successfully.');
    }
}
