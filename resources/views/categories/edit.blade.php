@extends('main')

@section('title', '| Edit Category')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Category
                </div>
                <div class="panel-body">
                    {!! Form::model($category, ['route' => ['categories.update', $category->id], 'data-parsley-validate' => '']) !!}
                        {{ Form::hidden('_method', 'PUT') }}
                        <div class="form-group">
                            {{ Form::text('name', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}
                        </div>
                        <div class="row">
                            <div class="col col-sm-6">
                                {!! Html::linkRoute('categories.index', 'Cancel', [], ['class' => 'btn btn btn-danger btn-block']) !!}
                            </div>
                            <div class="col col-sm-6">
                                {{ Form::submit('Save', ['class' => 'btn btn-success btn-block']) }}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection