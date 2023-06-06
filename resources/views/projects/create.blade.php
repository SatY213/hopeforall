<!-- resources/views/projects/create.blade.php -->

@extends('layouts.app')

@section('content')
@include('include-dashboard')

    <div class="container" style="margin-left: 7cm; width:15cm;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Project</div>
                    <div class="card-body">
                        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" id="description" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="starting_date">Starting Date:</label>
                                <input type="date" name="starting_date" id="starting_date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="ending_date">Ending Date:</label>
                                <input type="date" name="ending_date" id="ending_date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="budget">Budget:</label>
                                <input type="number" name="budget" id="budget" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" name="image" id="image" class="form-control-file">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success">Create Project</button>
                            <a href="/projects" class="btn btn-outline-secondary float-right ml-2">Go Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
