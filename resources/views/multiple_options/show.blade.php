@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.multiple_options.title')</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>@lang('quickadmin.multiple_options.fields.question')</th>
                    <td>{{ $multiple_options->question->question_text or '' }}</td></tr><tr><th>@lang('quickadmin.multiple_options.fields.option')</th>

                    <td>{{ $multiple_options->option }}</td></tr><tr><th>@lang('quickadmin.multiple_options.fields.correct')</th>

                    <td>{{ $multiple_options->correct == 1 ? 'Yes' : 'No' }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('multiple_options.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop