@extends('main')

@section('title', '| Delete Comment')

@section('content')

    <div class="row">
        <col-md-8 class="col-md-8 col-md-offset-2">
            <h2>Are you sure you want to delete this comment?</h2>
            <div class="well well-lg">
                <strong>Name:</strong> {{ $comment->name }}<br>
                <strong>Email:</strong> {{ $comment->email }}<br>
                <strong>Comment:</strong> 
                {{ substr($comment->comment, 0, 200) }} {{ strlen($comment->comment) > 200 ? '...' : '' }}
            </div>

            {{ Form::open(['route' => ['comments.destroy', $comment->id]]) }}
                {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Yes, delete this comment', ['class' => 'btn btn-danger btn-block']) }}
                    <a href="{{ route('posts.show', $comment->post->id) }} " class="btn btn-success btn-block">No, cancel this action</a>
                    </div>
            {{ Form::close() }}
        </col-md-8>
    </div>

@endsection