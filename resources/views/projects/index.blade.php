@extends('layouts.app')

@section('content')
@include('include-dashboard')

    <div class="container" style="margin-left: 7cm; ">
        <div class="row">
            <div class="col-md-12">
                <h3>Projects</h3>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Budget</th>
                                    <th>Starting Date</th>
                                    <th>Ending Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                <tr>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->budget }}</td>
                                    <td>{{ $project->starting_date }}</td>
                                    <td>{{ $project->ending_date }}</td>
                                    <td>
                                        <div style="display: flex;">
                                            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info mr-2">Details</a>
                                            <div style="width: 10px;"></div>
                                            <form method="POST" action="{{ route('projects.destroy', $project->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary">Edit</a>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                                
                                @endforeach
                            </tbody>
                        </table>

                        <div class="float-right">
                            <a href="{{ route('projects.create') }}" class="btn btn-success">Add Project</a>
                            <a href="/dashboard" class="btn btn-outline-secondary float-right ml-2">Go Back</a>

                        </div>
                  
            </div>
        </div>
    </div>


    
@endsection    
