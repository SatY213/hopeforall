@extends('layouts.app')

@section('content')
@include('include-dashboard')


<div class="container" style="margin-left: 7cm;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Edit needers</h3></div>
                <div class="panel-body">
        <form method="POST" action="{{ route('needers.update', $needer->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $needer->name }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $needer->email }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $needer->phone }}" required>
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{ $needer->type }}" required>
                @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="job">Job:</label>
                <input type="text" class="form-control @error('job') is-invalid @enderror" id="job" name="job" value="{{ $needer->job }}" required>
                @error('job')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ $needer->address }}" required>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="birthday">Birthday:</label>
                <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" value="{{ $needer->birthday }}" required>
                @error('birthday')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="children">Children:</label>
                <input type="text" class="form-control @error('children') is-invalid @enderror" id="children" name="children" value="{{ $needer->children }}" required>
                @error('children')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="/needers" class="btn btn-outline-secondary float-right ml-2">Go Back</a>

            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
            @endsection
