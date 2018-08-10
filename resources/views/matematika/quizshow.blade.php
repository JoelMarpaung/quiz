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
                        <label><strong>Title : </strong> {{$matematika->title}}</label>
                            <label></label>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
