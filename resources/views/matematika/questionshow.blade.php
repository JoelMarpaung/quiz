@extends('layouts.app')

@section('content')
<h3 class="page-title">@lang('quickadmin.matematika.title')</h3>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">Here your Math Question!</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                        <label><strong>Question : </strong> {{$question->question}}</label> <br>
                        <label><strong>Point : </strong> {{$question->point}}</label><br>
                        <label><strong>Option A : </strong> {{$question->option_a}}</label><br>
                        <label><strong>Option B : </strong> {{$question->option_b}}</label><br>
                        <label><strong>Option C : </strong> {{$question->option_c}}</label><br>
                        <label><strong>Option D : </strong> {{$question->option_d}}</label><br>
                        <label><strong>Option E : </strong> {{$question->option_e}}</label><br>
                        <label><strong>Correct Answer : </strong> {{$question->correct}}</label>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
