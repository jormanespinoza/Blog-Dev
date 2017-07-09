@extends('main')

@section('title', '| Edit Comment')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Edit Comment</h1>
            {!! Form::model($comment, ['route' => ['comments.update', $comment->id], 'data-parsley-validate' => '']) !!}
                {{ Form::hidden('_method', 'PUT') }}
                <div class="form-group">
                    {{ Form::label('name', 'Name:')}}
                    {{ Form::text('name', null, ['class' => 'form-control', 'disabled' => '']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('email', 'Email:')}}
                    {{ Form::text('email', null, ['class' => 'form-control', 'disabled' => '']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('comment', 'Comment:')}}
                    {{ Form::text('comment', null, ['class' => 'form-control', 'required' => '', 'minlength' => '5','maxlength' => '255']) }}
                </div>
                
                {{ Form::submit('Update Comment', ['class' => 'btn btn-block btn-success'])}}
            {!! Form::close()!!}
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection