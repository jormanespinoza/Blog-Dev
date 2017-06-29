@extends('main')

@section('title', '| Edit Tag')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Tag
                </div>
                <div class="panel-body">
                    {!! Form::model($tag, ['route' => ['categories.update', $tag->id]]) !!}
                        {{ Form::hidden('_method', 'PUT') }}
                        <div class="form-group">
                            {{ Form::text('name', null, ['class' => 'form-control', ]) }}
                        </div>
                        <div class="row">
                            <div class="col col-sm-6">
                                {!! Html::linkRoute('tags.index', 'Cancel', [], ['class' => 'btn btn btn-danger btn-block']) !!}
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