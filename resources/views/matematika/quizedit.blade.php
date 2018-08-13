@extends('layouts.app')

@section('content')
<h3 class="page-title">@lang('quickadmin.matematika.title')</h3>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">Edit your Math Quiz!</div>
                <div class="panel-body">
                    {!! Form::open(['method' => 'POST', 'route' => ['matematika.update', $matematika->id]]) !!}
                    <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title', $matematika->title), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
                    <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('topic_id', 'Topic', ['class' => 'control-label']) !!}
                    <select class="form-control" name="topic_id">
                        @if ($topic->count()>0)
                            @foreach($topic as $top)
                            <option value="{{ $top->id }}" {{ $matematika->topic_id == $top->id ? 'selected="selected"' : '' }}> {{ $top->title }}</option>
                            @endforeach
                        @endif
                    </select>
                    <p class="help-block"></p>
                    @if($errors->has('topic_id'))
                        <p class="help-block">
                            {{ $errors->first('topic_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('time', 'Time', ['class' => 'control-label']) !!}
                    {!! Form::text('time', old('time', $matematika->time), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('time'))
                        <p class="help-block">
                            {{ $errors->first('time') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('num_question', 'Number of Question', ['class' => 'control-label']) !!}
                    {!! Form::text('num_question', old('num_question', $matematika->num_question), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('num_question'))
                        <p class="help-block">
                            {{ $errors->first('num_question') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description', $matematika->description), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>

            {!! Form::submit(trans('quickadmin.edit'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
