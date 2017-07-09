@extends('main')

@section('content')
    <div class="jumbotron">
        <h1>Welcome to my Blog!</h1>
        <p>Thank you so much for visiting. This is my test website built Laravel. Please read my popular post!</p>
        <p>
             @if(count($posts) > 0)
                <a class="btn btn-lg btn-primary" href="{{ route('blog.single', $latest_post->slug ) }}" role="button">Latest Post</a>
            @endif
        </p>
    </div>

    <div class="row">
        <!-- Main -->
        <div class="col-md-8">
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <div class="post">
                        <h3>{{ substr($post->title, 0,50 ) }} {{ strlen($post->title) > 50 ? '...' : '' }}</h3>
                        <p>{{ substr(strip_tags($post->body), 0, 300) }} {{ strlen(strip_tags($post->body)) > 300 ? '...' : '' }}</p>
                        <p>
                            <a href="{{ url('blog/'.$post->slug)}}" class="btn btn-primary">Read More</a>
                        </p>
                    </div>
                    <hr>
                @endforeach
            @else
                <p>No posts found.</p>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="col-md-3 col-md-offset-1">
            <h3>Sidebar</h3>
            <p></p>
        </div>
    </div>
@endsection