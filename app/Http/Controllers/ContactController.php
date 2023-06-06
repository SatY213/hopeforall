<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmitted;

class ContactController extends Controller
{
    public function index()
{
    return view('emails.contact');
}

    public function submit(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Mail::to('hakimesl11@gmail.com')->send(new ContactFormSubmitted($data));

        return redirect('/')->with('success', 'Thank you for your message!');
    }

    
}

