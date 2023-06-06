@extends('layouts.app')

@section('content')
@include('include-dashboard')

    <div class="container" style="margin-left: 6cm;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $benevole->name }}</div>

                    <div class="card-body">
                        <p><strong>ID:</strong> {{ $benevole->id }}</p>
                        <p><strong>Birthdate:</strong> {{ $benevole->birthday }}</p>
                        <p><strong>Job:</strong> {{ $benevole->job }}</p>
                        <p><strong>Email:</strong> {{ $benevole->email }}</p>
                        <p><strong>Address:</strong> {{ $benevole->address }}</p>
                        <p><strong>Phone:</strong> {{ $benevole->phone }}</p>

                        <h4>Projects</h4>
                        @if($benevole->projects->count() > 0)
                            <ul>
                                @foreach($benevole->projects as $project)
                                    <li><a href="{{ route('projects.show', $project->id) }}">{{ $project->name }}</a></li>
                                @endforeach
                            </ul>
                        @else
                            <p>No projects associated with this benevole.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
