@extends('layouts.app')
@section('content')

    <h1>Create Post</h1>
    {!! Form::open(['route' => 'posts.store', 'method' => 'POST' , 'enctype' => 'multipart/form-data']) !!}
    {{ Form::token() }}

    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) }}
        @error('title')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        {{ Form::label('body', 'Body') }}
        {{ Form::textarea('body', null, ['class' => 'form-control', 'required' => 'required']) }}
        @error('body')
            <span>{{ $message }}</span>
        @enderror
    </div>
    <br>

    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
    {{ Form::submit('Create Post', ['class' => 'btn btn-primary']) }}
{!! Form::close() !!}



@endsection
