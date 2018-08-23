@extends('layouts.app')

@section('content')
<h3 class="page-title">Quiz @lang('quickadmin.matematika.title')</h3>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">Welcome!</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                        <table class="table table-bordered table-striped {{ count($quiz) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Topic</th>
                        <th>Time</th>
                        <th>Number of Question</th>

                    </tr>
                </thead>

                <tbody>
                    @if (count($quiz) > 0)
                        @foreach ($quiz as $qu)
                            <tr data-entry-id="{{ $qu->id }}">
                                <td>{{ $qu->title }}</td>
                                <td>{{ $qu->topic->title}}</td>
                                <td>{{ $qu->time}}</td>
                                <td>{{ $qu->num_question}}</td>
                                <td>
                                    <a href="{{ route('quizmatematika.play',[$qu->id]) }}" class="btn btn-xs btn-primary">Play</a>
                                    <a href="{{ route('matematika.edit',[$qu->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
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
