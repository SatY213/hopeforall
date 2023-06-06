@extends('layouts.app')

@section('content')

@include('include-dashboard')
<!-- Main Content -->
<main role="main" id ="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}
        
                    </div>
                    <div class="card-body">
                        <h1>Posts</h1>

                        <div class="row">
                            @foreach ($posts as $post)
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $post->title }}</h5>
                                            
                                                <img style="width:100%" src="/storage/cover_image/{{$post->cover_image}}">
                                            
                                            <p class="card-text">{{ $post->body }}</p>
                                            <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn btn-primary">Read More</a>
                                        </div>
                                        <hr>
                                        <small style="margin-left: 1rem;margin-bottom:0.5rem">Written on {{$post->created_at}} by {{$post->user->name}}</small>
                                        
                                    </div>
                                </div>
                            @endforeach
                    
                            <div class="col-12 d-flex ">
                                {{ $posts->links('pagination::simple-bootstrap-4')}}
                            </div>
                        </div>
                    

    
                        <div class="panel-body" id="content-container">
                            {{--  --}}
                            <a href="{{ route('posts.create') }}" class="btn btn-success">Add Post</a>

                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<style>
    .card-text {
      max-height: 4.8em; /* Adjust the height as needed */
      overflow: hidden;
      text-overflow: ellipsis;
      display: -webkit-box;
      -webkit-line-clamp: 4; /* Limit the content to four lines */
      -webkit-box-orient: vertical;
    }
    .card {
        height: 100%;
    }

    .image-container {
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .card-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card-footer-text {
        margin-left: 1rem;
        margin-bottom: 0.5rem;
    }
  </style>
@endsection
