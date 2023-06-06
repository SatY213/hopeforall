@extends('layouts.app')

@section('content')
<!-- Home page content... -->

<div class="contact-section">
    <h2>Contact Us</h2>
    <form method="POST" action="{{ route('contact.submit') }}">
      @csrf
      <div>
        <label for="name">Name:</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required>
      </div>
      <div>
        <label for="email">Email:</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
      </div>
      <div>
        <label for="message">Message:</label>
        <textarea id="message" name="message" required>{{ old('message') }}</textarea>
      </div>
      <button type="submit">Submit</button>
    </form>
  </div>
  
  <!-- More home page content... -->
  
  <style>
  .contact-section {
    margin: 50px 0;
  }
  
  .contact-section h2 {
    text-align: center;
    font-size: 2rem;
    margin-bottom: 30px;
  }
  
  .contact-section form {
    max-width: 500px;
    margin: 0 auto;
  }
  
  .contact-section form label {
    display: block;
    margin-bottom: 10px;
  }
  
  .contact-section form input,
  .contact-section form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  
  .contact-section form textarea {
    height: 200px;
  }
  
  .contact-section form button[type="submit"] {
    display: block;
    margin: 0 auto;
    padding: 10px 20px;
    font-size: 1rem;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  
  .contact-section form button[type="submit"]:hover {
    background-color: #3e8e41;
  }
  </style>
  
@endsection