@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Details') }}</div>

                <div class="card-body">
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <!-- Other user details -->

                    <!-- Add the form element -->
                    <form action="{{ route('users.print', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image">Upload Image:</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Print Card</button>
                        </div>
                    </form>
                    <!-- End of form -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
