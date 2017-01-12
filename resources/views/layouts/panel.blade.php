@extends('layouts.front')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @yield('panel-heading')
                </div>
                <div class="panel-body">
                    @yield('panel-body')
                </div>
            </div>
        </div>
    </div>
@stop