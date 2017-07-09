@extends('main')

@section('title', '| Blog')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Blog</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach($posts as $post)
            <hr>
                @if($post->image != null)
                    <img src="{{ asset('images/featured/' . $post->image) }}" alt="Featured Image" class="img-thumbnail">
                @endif
                <h1>{{ $post ->title }}</h1>
                <h5>Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>
                {{-- <h5>Published: {{ $post->created_at->diffForHumans() }}</h5> --}}
                <p>{{ substr(strip_tags($post->body), 0, 300) }} {{ strlen(strip_tags($post->body)) > 300 ? '...' : '' }}</p>
                <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
            @endforeach
            <div class="text-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>
@endsection