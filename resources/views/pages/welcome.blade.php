@extends('main')

@section('content')
    <div class="jumbotron">
        <h1>Welcome to my Blog!</h1>
        <p>Thank you so much for visiting. This is my test website built Laravel. Please read my popular post!</p>
        <p>
            <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">Latest Post</a>
        </p>
    </div>

    <div class="row">
        <!-- Main -->
        <div class="col-md-8">
            @foreach($posts as $post)
                <div class="post">
                    <h3>{{ substr($post->title, 0,50 ) }} {{ strlen($post->title) > 50 ? '...' : '' }}</h3>
                    <p>{{ substr($post->body, 0, 300) }} {{ strlen($post->body) > 300 ? '...' : '' }}</p>
                    <p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </p>
                </div>
                <hr>
            @endforeach
        </div>

        <!-- Sidebar -->
        <div class="col-md-3 col-md-offset-1">
            <h3>Sidebar</h3>
            <p></p>
        </div>
    </div>
@endsection