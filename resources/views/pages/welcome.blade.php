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
            <div class="post">
                <h3>Post Title</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis officiis quis ratione quidem eligendi error autem sit enim pariatur, minus itaque, eveniet rem magnam architecto dolores commodi praesentium laborum amet?</p>
                <p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </p>
            </div>

            <hr>

            <div class="post">
                <h3>Post Title</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis officiis quis ratione quidem eligendi error autem sit enim pariatur, minus itaque, eveniet rem magnam architecto dolores commodi praesentium laborum amet?</p>
                <p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </p>
            </div>

            <hr>

            <div class="post">
                <h3>Post Title</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis officiis quis ratione quidem eligendi error autem sit enim pariatur, minus itaque, eveniet rem magnam architecto dolores commodi praesentium laborum amet?</p>
                <p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </p>
            </div>

            <hr>

            <div class="post">
                <h3>Post Title</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis officiis quis ratione quidem eligendi error autem sit enim pariatur, minus itaque, eveniet rem magnam architecto dolores commodi praesentium laborum amet?</p>
                <p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </p>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-md-3 col-md-offset-1">
            <h3>Sidebar</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique asperiores dolorum laudantium sed velit assumenda sapiente. Laborum placeat ducimus autem architecto perspiciatis! Exercitationem earum eos deserunt voluptas sed neque veritatis!</p>
        </div>
    </div>
@endsection