@extends('layouts.app')

@section('content')

<div class="container" style="margin-left: 7cm;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Edit User</h3></div>
                <div class="panel-body">
        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="isadmin">isadmin:</label>
                <input type="text" class="form-control @error('isadmin') is-invalid @enderror" id="isadmin" name="isadmin" value="{{ $user->isadmin }}" required>
                @error('isadmin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


      
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="/users" class="btn btn-outline-secondary float-right ml-2">Go Back</a>

            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
            @endsection
