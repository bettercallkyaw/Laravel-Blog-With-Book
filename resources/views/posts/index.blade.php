@extends('layouts.app')

@section('title', 'all posts')

@section('content')
    <div class="container">
        @foreach ($posts as $post)
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <div class="card-subtitle mb-2 text-muted small">
                        {{ $post->created_at->diffForHumans() }}
                    </div>
                    <p class="card-text">{{ $post->body }}</p>
                    <a class="card-link" href="{{ url('/posts/show',$post->id) }}">
                        View Detail &raquo;
                    </a>
                </div>
            </div>
        @endforeach
        <br>
        {{ $posts->links() }}
    </div>
@endsection
