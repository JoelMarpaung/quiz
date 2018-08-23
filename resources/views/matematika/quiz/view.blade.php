@extends('layouts.app')

@section('content')
<h3 class="page-title">Quiz @lang('quickadmin.matematika.title') Results</h3>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">These are your result for this quiz so far!</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                        <table class="table table-bordered table-striped {{ count($quiz) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th>Total Correct</th>
                        <th>Score</th>
                        <th>Result</th>
                        <th>Test Date</th>

                    </tr>
                </thead>

                <tbody>
                    @if (count($quiz) > 0)
                        @foreach ($quiz as $qu)
                            <tr data-entry-id="{{ $qu->id }}">
                            <td>{{ $qu->total_correct }} of {{$matematika->num_question}}</td>
                                <td>{{ $qu->score}} of {{$matematika->score}}</td>
                                <td>{{ $qu->result}}</td>
                                <td>{{ $qu->created_at}}</td>
                                <td>
                                    {{-- <a href="{{ route('quizmatematika.play',[$qu->id]) }}" class="btn btn-xs btn-primary">Play</a> --}}
                                    {{-- <a href="{{ route('quizmatematika.view',[$qu->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.view')</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
