@extends('layouts.app')

@section('content')
@include('include-dashboard')

    <div class="container" style="margin-left: 7cm;">
        
        <h1>{{ $project->name }}</h1>
        <div class="row">

            <div class="col-md-6">
              <ul class="list-group">
                <li class="list-group-item"><strong>Description:</strong> {{ $project->description }}</li>
                <li class="list-group-item"><strong>Budget:</strong> {{ $project->budget }}</li>
                <li class="list-group-item"><strong>Start date:</strong> {{ $project->starting_date }}</li>
                <li class="list-group-item"><strong>End date:</strong> {{ $project->ending_date }}</li>
                <li class="list-group-item"><strong>Boughts: </strong> <button type="button" class="btn btn-success" onclick="toggleTable2()">+</button><strong> Benevoles: </strong>                 <button type="button" class="btn btn-success" onclick="toggleTable()">+</button>
                </li>
                


              </ul>
            </div>


       @include('benevoles.include')
       @include('boughts.include') 


      </div>
      
@endsection
