@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.questions.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['matematika.question.update',$question->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('question', 'Question', ['class' => 'control-label']) !!}
                    {!! Form::textarea('question', old('question', $question->question), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('question'))
                        <p class="help-block">
                            {{ $errors->first('question') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('point', 'Point', ['class' => 'control-label']) !!}
                    {!! Form::number('point', old('point', $question->point), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('point'))
                        <p class="help-block">
                            {{ $errors->first('point') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('option_a', 'Option A', ['class' => 'control-label']) !!}
                    {!! Form::text('option_a', old('option_a', $question->option_a), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('option_a'))
                        <p class="help-block">
                            {{ $errors->first('option_a') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('option_b', 'Option B', ['class' => 'control-label']) !!}
                    {!! Form::text('option_b', old('option_b', $question->option_b), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('option_b'))
                        <p class="help-block">
                            {{ $errors->first('option_b') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('option_c', 'Option C', ['class' => 'control-label']) !!}
                    {!! Form::text('option_c', old('option_c', $question->option_c), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('option_c'))
                        <p class="help-block">
                            {{ $errors->first('option_c') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('option_d', 'Option D', ['class' => 'control-label']) !!}
                    {!! Form::text('option_d', old('option_d', $question->option_d), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('option_d'))
                        <p class="help-block">
                            {{ $errors->first('option_d') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('option_e', 'Option E', ['class' => 'control-label']) !!}
                    {!! Form::text('option_e', old('option_e', $question->option_e), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('option_e'))
                        <p class="help-block">
                            {{ $errors->first('option_e') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('correct', 'Answer', ['class' => 'control-label']) !!}
                    <select class="form-control" name="correct">
                        <option value="A" {{ $question->correct == 'A' ? 'selected="selected"' : '' }}>Option A</option>
                        <option value="B" {{ $question->correct == 'B' ? 'selected="selected"' : '' }}>Option B</option>
                        <option value="C" {{ $question->correct == 'C' ? 'selected="selected"' : '' }}>Option C</option>
                        <option value="D" {{ $question->correct == 'D' ? 'selected="selected"' : '' }}>Option D</option>
                        <option value="E" {{ $question->correct == 'E' ? 'selected="selected"' : '' }}>Option E</option>
                    </select>
                    <p class="help-block"></p>
                    @if($errors->has('correct'))
                        <p class="help-block">
                            {{ $errors->first('correct') }}
                        </p>
                    @endif
                </div>
            </div>
            <hr>
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.edit'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

