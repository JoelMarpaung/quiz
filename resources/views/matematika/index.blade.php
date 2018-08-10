@extends('layouts.app')

@section('content')
<h3 class="page-title">@lang('quickadmin.matematika.title')</h3>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">Welcome!</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                        <a href="{{route('matematika.quiz')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Quiz Matematika</a>

                        <table class="table table-bordered table-striped {{ count($quiz) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>@lang('quickadmin.questions.fields.topic')</th>
                        <th>@lang('quickadmin.questions.fields.question-text')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($quiz) > 0)
                        @foreach ($quiz as $qu)
                            <tr data-entry-id="{{ $qu->id }}">
                                <td></td>
                                <td>{{ $qu->title }}</td>
                                <td>{!! $qu->topic->title or '' !!}</td>
                                <td>
                                    {{-- <a href="{{ route('questions.show',[$question->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    <a href="{{ route('questions.edit',[$question->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['questions.destroy', $question->id])) !!}
                                    {!! Form::submit(trans('quickadmin.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!} --}}
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
