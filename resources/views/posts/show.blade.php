@extends('layouts.app')
@section('content')
  
  <h1>{{$post->title}}</h1>
  <div class ="col-md-6 col-sm-4">
    <img style="width:100%" src="/storage/cover_image/{{$post->cover_image}}">
  </div>
              
  <div>
    {{$post->body}}
  </div>

  <hr>
  <small style="margin-left: 1rem;margin-bottom:0.5rem">Written on {{$post->created_at}} by {{$post->user->name}}</small>

  <hr>
  @if (!Auth::guest())
  @if (Auth::user()->id == $post->user_id)
  <div class="d-flex">
    <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit</a>

    <!-- Destroy Form -->
    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'POST', 'onsubmit' => 'return confirm("Are you sure you want to delete this post?");']) !!}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Delete', ['class' => 'btn btn-danger mx-2']) }}
    {!! Form::close() !!}

    <a href="/posts" class="btn btn-default mx-2">Go back</a>
</div>
      
  @endif    
  @endif
  


@endsection               
