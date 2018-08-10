@extends('layouts.app')

@section('content')
<h3 class="page-title">@lang('quickadmin.ketangkasan-waktu.title')</h3>

    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome! Here are some numbers about Quiz Master .</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <h1>{{ $questions }}</h1>
                            questions in our database
                        </div>
                        <div class="col-md-3 text-center">
                            <h1>{{ $users }}</h1>
                            users registered
                        </div>
                        <div class="col-md-3 text-center">
                            <h1>{{ $quizzes }}</h1>
                            quizzes taken
                        </div>
                        <div class="col-md-3 text-center">
                            <h1>{{ number_format($average, 2) }} / 10</h1>
                            average score
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
