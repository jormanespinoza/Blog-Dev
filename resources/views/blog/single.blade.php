@extends('main')

@section('title', "| $post->title")

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $post->title}}</h1>
            <p>{!!  $post->body !!}</p>
            <hr>
            <p>
                Posted In: {{ $post->category->name }} |
                @foreach($post->tags->sortBy('name') as $tag)
                    <span class="label label-default">{{ $tag->name }}</span>
                @endforeach
            </p>
        </div>
    </div>

    {{-- Comments Display --}}

    @if(count($post->comments))
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <hr>
                <h4>Comments</h4>
                <hr>
                @foreach($post->comments as $comment)
                    <div class="comment">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <p><strong>Name:</strong> {{ $comment->name }}</p>
                                <p><strong>Comment:</strong> {{ $comment->comment }}</p>
                                <p><strong>Posted:</strong> {{ $comment->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p>Add the first comment</p>
    @endif

    <div class="row">
        <div id="comment-form" class="col-md-8 col-md-offset-2">
            <hr>
            <h4>Leave a comment</h4>
            <hr>
            {{ Form::open(['route' => ['comments.store', $post->id], 'data-parsley-validate' => '']) }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('name', 'Name:') }}
                            {{ Form::text('name', null, ['class' => 'form-control', 'required' => '', 'max-length' => '255']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::text('email', null, ['class' => 'form-control', 'required' => '', 'max-length' => '255']) }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('comment', 'Comment:') }}
                            {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5', 'required' => '', 'minlength' => '5','maxlength' => '255']) }}
                        </div>
                        {{ Form::submit('Add Comment', ['class' => 'form-control btn btn-success btn-block']) }}
                    </div>
                </div>
             {{ Form::close() }}
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection