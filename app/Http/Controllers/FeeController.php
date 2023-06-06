<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fee;
use App\Models\User;
use App\Http\Middleware\AdminMiddleware;

class FeeController extends Controller
{
    public function __construct()
    {
        $this->middleware(AdminMiddleware::class)->only(['index','create','edit', 'update', 'destroy']);
    }

    public function create()
    {
        $members = User::all(); // Fetch all members to populate the dropdown

        return view('fees.create', compact('members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member' => 'required',
            'amount' => 'required',
            'from' => 'required|date',
            'to' => 'required|date',
        ]);

        Fee::create([
            'member' => $request->member,
            'amount' => $request->amount,
            'from' => $request->from,
            'to' => $request->to,
        ]);

        return redirect()->route('fees.index')
            ->with('success', 'Fee created successfully.');
    }

    public function edit(Fee $fee)
    {
        $members = User::all(); // Fetch all members to populate the dropdown

        return view('fees.edit', compact('fee', 'members'));
    }

    public function update(Request $request, Fee $fee)
    {
        $request->validate([
            'member' => 'required',
            'amount' => 'required',
            'from' => 'required|date',
            'to' => 'required|date',
        ]);

        $fee->update([
            'member' => $request->member,
            'amount' => $request->amount,
            'from' => $request->from,
            'to' => $request->to,
        ]);

        return redirect()->route('fees.index')
            ->with('success', 'Fee updated successfully.');
    }

    public function destroy(Fee $fee)
    {
        $fee->delete();

        return redirect()->route('fees.index')
            ->with('success', 'Fee deleted successfully');
    }

    public function index()
    {
        $fees = Fee::all();

        return view('fees.index', compact('fees'));
    }
}
