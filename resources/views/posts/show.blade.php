@extends('layouts.app')

@section('title', 'show post detail')

@section('content')
    <div class="container">
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <div class="card-subtitle mb-2 text-muted small">
                    {{ $post->created_at->diffForHumans() }}
                </div>
                <p class="card-text">{{ $post->body }}</p>
                <a class="btn btn-info" href="{{ url('/posts') }}">
                    Back
                </a>
                <a class="btn btn-warning" href="{{ url('/posts/delete/{id}') }}">
                    Delete
                </a>
            </div>
        </div>
    </div>
@endsection
