@extends('layouts.app')

@section('title', 'show post detail')

@section('content')
    <div class="container">
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <div class="card-subtitle mb-2 text-muted small">
                    {{ $post->created_at->diffForHumans() }}
                    Category: <b>{{ $post->category->name }}</b>
                </div>
                <p class="card-text">{{ $post->body }}</p>
                <a class="btn btn-info" href="{{ url('/posts') }}">
                    Back
                </a>
                <a class="btn btn-warning" href="{{ url('/posts/delete', $post->id) }}">
                    Delete
                </a>
            </div>
        </div>

        @if (Session::has('status'))
            <div class="alert alert-danger">
              {{ Session::get('status') }}
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-warning">
              {{ Session::get('error') }}
            </div>
        @endif

        <ul class="list-group">
            <li class="list-group-item active">
                <b>Comments ({{ count($post->comments) }})</b>
            </li>
            @foreach ($post->comments as $comment)
                <li class="list-group-item">
                    {{ $comment->content }}
                    <a href="{{ url("/comments/delete/$comment->id") }}" class="close">
                        &times;
                    </a>
                    <div class="small mt-2">
                        By <b>{{ $comment->user->name }}</b>,
                        {{ $comment->created_at->diffForHumans() }}
                        </div>
                </li>
            @endforeach
        </ul>

        <br>

        @if (Session::has('successMsg'))
            <div class="alert alert-success">
              {{ Session::get('successMsg') }}
            </div>
        @endif

        @auth
        <form action="{{ url('/comments/store') }}" method="post">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <textarea name="content" class="form-control mb-2 @error('content') is-invalid @enderror" placeholder="New Comment"></textarea>
            @error('content')
            <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
            </span>
        @enderror
            <input type="submit" value="Add Comment" class="btn btn-secondary">
        </form>
        @endauth

    </div>
@endsection

<script type="text/javascript">
    function deletePerson(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {

                event.preventDefault();
                document.getElementById('delete-form-' + id).submit();
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })
    }
</script>
