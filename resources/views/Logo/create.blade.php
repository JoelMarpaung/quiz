@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.Logo.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['Logo.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.create')
        </div>
        
        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('question_id', 'question*', ['class' => 'control-label']) !!}
                    {!! Form::text('question_id', old('question_id'), ['class' => 'form-control', 'placehoder' => ''] !!}
                    <p class="help-block"></p>
                    @if($errors->has('question_id'))
                        <p class="help-block">
                            {{ $errors->first('question_id') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('option', 'Answer*', ['class' => 'control-label']) !!}
                    {!! Form::text('option', old('option'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('option'))
                        <p class="help-block">
                            {{ $errors->first('option') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">

                    <input type="file" name="file[]" multiple><br/>
                        <script>
                            var form = document.getElementById('upload');
                            var request = new XMLHttpRequest();

                            form.addEventListener('submit', function(e){
                                e.preventDefault();
                                var formdata = new FormData(form);

                                request.open('post', '/upload');
                                request.addEventListener("load", transferComplete);
                                request.send(formdata);
                            });

                            function transferComplete(data){
                                console.log(data.currentTarget.response);
                            }
                        </script>
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

