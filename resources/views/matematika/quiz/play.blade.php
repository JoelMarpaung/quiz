@extends('layouts.app')

@section('content')
<h3 class="page-title">New Matematika Quiz</h3>
{!! Form::open(['method' => 'POST', 'route' => ['quizmatematika.store', $matematika->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
        Answer these {{$matematika->num_question}} questions. Within {{$matematika->time}} minutes. With total score = {{$matematika->score}}
        </div>
        @if(count($questions) > 0)
        <div class="panel-body">
        <?php $i = 1; ?>
        @foreach($questions as $question)
            @if ($i > 1) <hr /> @endif
            <div class="row">
                <div class="col-xs-12 form-group">
                    <div class="form-group">
                        <strong>Question {{ $i }}.<br />{!! nl2br($question->question) !!}</strong>
                        <input
                            type="hidden"
                            name="questions[{{ $i }}]"
                            value="{{ $question->id }}">
                        <br>
                        <label class="radio-inline">
                            <input
                                type="radio"
                                name="answers[{{ $i }}]"
                                value="A">
                            {{ $question->option_a }}
                        </label>
                        <br>
                        <label class="radio-inline">
                            <input
                                type="radio"
                                name="answers[{{ $i }}]"
                                value="B">
                            {{ $question->option_b }}
                        </label>
                        <br>
                        <label class="radio-inline">
                            <input
                                type="radio"
                                name="answers[{{ $i }}]"
                                value="C">
                            {{ $question->option_c }}
                        </label>
                        <br>
                        <label class="radio-inline">
                            <input
                                type="radio"
                                name="answers[{{ $i }}]"
                                value="D">
                            {{ $question->option_d }}
                        </label>
                        <br>
                        <label class="radio-inline">
                            <input
                                type="radio"
                                name="answers[{{ $i }}]"
                                value="E">
                            {{ $question->option_e }}
                        </label>
                        <br>
                        Point : {{ $question->point }}
                    </div>
                </div>
            </div>
        <?php $i++; ?>
        @endforeach
        </div>
    @endif
    </div>

    {!! Form::submit(trans('quickadmin.submit_quiz'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="{{ url('quickadmin/js') }}/timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
    <script>
        $('.datetime').datetimepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}",
            timeFormat: "hh:mm:ss"
        });
    </script>

@stop
