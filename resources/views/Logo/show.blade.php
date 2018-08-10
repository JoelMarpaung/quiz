@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.Logo.title')</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>@lang('quickadmin.Logo.fields.question')</th>
                    <td>{{ $Logo->question->question_text or '' }}</td></tr><tr><th>@lang('quickadmin.Logo.fields.option')</th>

                    <td>{{ $Logo->option }}</td></tr><tr><th>@lang('quickadmin.Logo.fields.correct')</th>

                    <td>{{ $Logo->correct == 1 ? 'Yes' : 'No' }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('Logo.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop