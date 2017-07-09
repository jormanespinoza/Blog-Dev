@extends('main')

@section('title', '| Edit Blog Post')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
    {{-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=nk4fz930u36fp80tw5lw70459r4sxn2hf62z6oaoukdms7ts"></script>
    <script>
        tinymce.init({ 
            selector:'textarea',
            plugins: 'link',
            menubar: false
        });
    </script> --}}
@endsection

@section('content')
    <div class="row">
        {!! Form::model($post, ['route' => ['posts.update', $post->id]]) !!}
            {{ Form::hidden('_method', 'PUT') }}
            <div class="col-md-8">
                <div class="form-group">
                    {{ Form::label('title', 'Title:' )}}
                    {{ Form::text('title', null, ['class' => 'form-control input-lg']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('slug', 'Slug:') }}
                    {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5','maxlength' => '255')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('category_id', 'Category:') }}
                    {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('tags', 'Tags:') }}
                    {{ Form::select('tags[]', $tags, null, ['class' => 'form-control js-select2', 'multiple' => 'multiple']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('body', 'Body:')}}
                    {{ Form::textarea('body', null, ['id' => 'article-ckeditor', 'class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-md-4">
                <div class="well">
                     <dl class="dl-vertical">
                        <dt>Url:</dt>
                        <dd><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></dd>
                    </dl>
                    <dl class="dl-vertical">
                        <dt>Category:</dt>
                        <dd>{{ $post->category->name }}</dd>
                    </dl>
                    <dl class="dl-vertical">
                        <dt>Created At:</dt>
                        <dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
                    </dl>
                    <dl class="dl-vertical">
                        <dt>Last Updated:</dt>
                        <dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col col-sm-6">
                            {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
                        </div>
                        <div class="col col-sm-6">
                            {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".js-select2").select2();
        });
    </script>
@endsection