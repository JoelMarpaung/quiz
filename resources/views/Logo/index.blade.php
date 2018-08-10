@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.Logo.title')</h3>

    <p>
        <a href="{{ route('Logo.create') }}" class="btn btn-success">@lang('quickadmin.add_new')</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($Logo) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>@lang('quickadmin.Logo.fields.question')</th>
                        <th>@lang('quickadmin.Logo.fields.option')</th>
                        <th>@lang('quickadmin.Logo.fields.picture')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($Logo) > 0)
                        @foreach ($Logo as $Logo)
                            <tr data-entry-id="{{ $Logo->id }}">
                                <td></td>
                                <td>{{ $Logo->question }}</td>
                                <td>{{ $Logo->option }}</td>
                                <td>{{ $Logo->picture }}</td>
                                <td>
                                    <a href="{{ route('Logo.show',[$Logo->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    <a href="{{ route('Logo.edit',[$Logo->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['Logo.destroy', $Logo->id])) !!}
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
        window.route_mass_crud_entries_destroy = '{{ route('Logo.mass_destroy') }}';
    </script>
@endsection