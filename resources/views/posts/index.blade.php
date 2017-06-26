@extends('main')

@section('title', '| All Posts')
    
@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>All Posts</h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-h1-spacing">Create Post</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th>{{ $post->id }}</th>
                            <td>{{ substr($post->title, 0, 25) }} {{ strlen($post->title) > 25 ? '...' : '' }}</td>
                            <td>{{ substr($post->body, 0, 25) }} {{ strlen($post->body) > 25 ? '...' : '' }}</td>
                            <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
                            <td>{{ date('M j, Y', strtotime($post->updated_at)) }}</td>
                            <td>
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- Pagination --}}
            <div class="text-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>
@endsection