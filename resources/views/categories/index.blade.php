@extends('main')

@section('title', '| All Categories')

@section('content')
    <div class="row">
        <div class="col col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Categoties
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th>{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-3">
            <div class="well">
                {!! Form::open(['route' => 'categories.store', 'data-parsley-validate' => '']) !!}
                <h3>New Category</h3>
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