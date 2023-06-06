<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ParticipationFormSubmitted;
use App\Models\Project;

class ParticipationController extends Controller
{
    /**
     * Store a new participation form submission.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        // Create a new project instance
        $project = Project::find($request->input('project_id'));

        // Send an email notification
        Mail::to('recipient@example.com')->send(new ParticipationFormSubmitted($validatedData, $project));

        // Redirect or return a response
        // Example:
        return redirect('/')->with('success', 'Participation form submitted successfully! We will send you a confirmation email soon');
    }
}

