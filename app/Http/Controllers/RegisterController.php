<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Registration;
use App\Mail\RegistrationRequest;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
{
    return view('emails.registration-request');
}



    //
    public function submitRequest(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:registrations',
            'presentation' => 'required|string|max:1000',
        ]);
    
        $registration = new Registration();
        $registration->name = $request->name;
        $registration->email = $request->email;
        $registration->presentation = $request->presentation;
        $registration->save();
    
    
        return redirect()->route('pages.index')->with('success', 'Your registration request has been submitted.');
    }
    

}
