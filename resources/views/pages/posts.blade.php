@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <H1>Blog Posts</h1>
            <br>

            @foreach($posts as $post)
            <div class="card mb-3" style="max-width: 19cm;">
                @if($post->cover_image)
                <img class="card-img-top" src="{{ asset('storage/cover_image/' . $post->cover_image) }}" alt="Post Image">
                @endif
                <div class="card-body">
                    <h2 class="card-title">{{ $post->title }}</h2>
                    <p class="card-text">{{ $post->body }}</p>
                </div>
                <div class="card-footer text-muted">
                    Posted on {{ $post->created_at->format('M d, Y') }} by {{ $post->user->name }}
                </div>
            </div>
            @endforeach

            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
