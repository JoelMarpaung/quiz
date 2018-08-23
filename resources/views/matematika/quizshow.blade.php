@extends('layouts.app')

@section('content')
<h3 class="page-title">@lang('quickadmin.matematika.title')</h3>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">Here your Math Quiz!</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                        <label><strong>Title : </strong> {{$matematika->title}}</label> <br>
                        <label><strong>Topic : </strong> {{$matematika->topic->title}}</label><br>
                        <label><strong>Time : </strong> {{$matematika->time}}</label><br>
                        <label><strong>Number of Question : </strong> {{$matematika->num_question}}</label><br>
                        <label><strong>Score : </strong> {{$matematika->score}}</label>
                        </div>
                        <div class="col-md-6">
                        <label><strong>Description : </strong> {{$matematika->description}}</label> <br>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            @if (count($questions) == 0)
                            <a href="{{route('matematika.question',$matematika->id)}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Question</a><br><br>
                            @endif
                            <table class="table table-bordered table-striped {{ count($questions) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th>Question</th>
                        <th>Point</th>
                        <th>Correct Answer</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($questions) > 0)
                        @foreach ($questions as $qu)
                            <tr data-entry-id="{{ $qu->id }}">
                                <td>{{ $qu->question }}</td>
                                <td>{{ $qu->point}}</td>
                                <td>{{ $qu->correct}}</td>
                                <td>
                                    <a href="{{ route('matematika.question.show',[$qu->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    <a href="{{ route('matematika.question.edit',[$qu->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    {!! Form::close() !!}
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
