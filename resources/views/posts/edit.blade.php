@extends('layouts.app')
@section('content')

    <h1>Edit Post</h1>

    {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
    {{ Form::token() }}

    <div>
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', null, ['class' => 'form-control', 'required' => 'required','enctype' => 'multipart/form-data']) }}
        @error('title')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        {{ Form::label('body', 'Body') }}
        {{ Form::textarea('body', null, ['class' => 'form-control', 'required' => 'required']) }}
        @error('body')
            <span>{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
    
    {{ Form::submit('Update Post', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}

@endsection
