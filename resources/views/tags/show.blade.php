@extends('main')

@section('title', "| $tag->name Tag")

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>
                {{ $tag->name}} Tag | <small>{{ $tag->posts()->count() }} Posts</small>
            </h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-block btn-h1-spacing">Edit</a>
        </div>
        <div class="col-md-2">
            {!! Form::open(['route' => ['tags.destroy', $tag->id]]) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block btn-h1-spacing'])}}
            {!! Form::close() !!}
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Tags</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    @foreach($tag->posts as $post)
                        <th>{{ $post->id }}</th>
                        <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                        <td>
                            @foreach($post->tags->sortBy('name') as $tag)
                                <a href="{{ route('tags.show', $tag->id) }}" class="label label-default"><span >{{ $tag->name }}</span></a>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-xs">View</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-xs">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection