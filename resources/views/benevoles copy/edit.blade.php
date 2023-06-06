@extends('layouts.app')

@section('content')
@include('include-dashboard')

    <div class="container" style="margin-left: 6cm; width:15cm;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Edit Benevole</h3></div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('benevoles.update', $benevole->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $benevole->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="birthday">Birthday</label>
                                <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $benevole->birthday }}" required>
                            </div>
                            @if ($projects->count() > 0)
                            <div class="form-group">
                                <label for="project_id">Project</label>
                                <select name="project_id" id="project_id" class="form-control">
                                    @foreach($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('project_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('project_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        @else
                            <p>No projects found.</p>
                        @endif
                        
                            <div class="form-group">
                                <label for="job">Job</label>
                                <input type="text" class="form-control" id="job" name="job" value="{{ $benevole->job }}" required>
                            </div>
                  
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ $benevole->address }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $benevole->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $benevole->phone }}" required>
                            </div>
                     
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="/benevoles" class="btn btn-outline-secondary float-right ml-2">Go Back</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
