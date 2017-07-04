@extends('main')

@section('title', '| All Tags')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tags
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Posts</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <th>{{ $tag->id }}</th>
                            <td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
                            <td>{{ $tag->posts->count() }}</td>
                            <td>
                                <a href="{{ route('tags.show', $tag->id) }}" class="btn btn-default btn-xs">View</a>
                                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-default btn-xs">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                {!! $tags->links() !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                {!! Form::open(['route' => 'tags.store', 'data-parsley-validate' => '']) !!}
                    <h3>New Tag</h3>
                    <div class="form-group">
                        {{ Form::label('name', 'Name:') }}
                        {{ Form::text('name', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}
                    </div>
                    {{ form::submit('Create', ['class' => 'btn btn-primary btn-block']) }}
                {!! Form::close()!!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection