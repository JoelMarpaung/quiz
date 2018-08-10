@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.multiple_options.title')</h3>

    <p>
        <a href="{{ route('multiple_options.create') }}" class="btn btn-success">@lang('quickadmin.add_new')</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($multiple_options) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>@lang('quickadmin.multiple_options.fields.question')</th>
                        <th>@lang('quickadmin.multiple_options.fields.option')</th>
                        <th>@lang('quickadmin.multiple_options.fields.correct')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($multiple_options) > 0)
                        @foreach ($multiple_options as $multiple_options)
                            <tr data-entry-id="{{ $multiple_options->id }}">
                                <td></td>
                                <td>{{ $multiple_options->question->question_text or '' }}</td>
                                <td>{{ $multiple_options->option }}</td>
                                <td>{{ $multiple_options->correct == 1 ? 'Yes' : 'No' }}</td>
                                <td>
                                    <a href="{{ route('multiple_options.show',[$multiple_options->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    <a href="{{ route('multiple_options.edit',[$multiple_options->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['multiple_options.destroy', $multiple_options->id])) !!}
                                    {!! Form::submit(trans('quickadmin.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('multiple_options.mass_destroy') }}';
    </script>
@endsection