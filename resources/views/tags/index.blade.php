@extends('main')

@section('title', '| All Tags')

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
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <th>{{ $tag->id }}</th>
                            <td>{{ $tag->name }}</td>
                            <td>
                                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            </td>
                            <td>
                                {!! Form::open(['route' => ['tags.destroy', $tag->id]]) !!}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                                {!! Form::close() !!}
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
        <div class="col-md-3">
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