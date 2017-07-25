@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                        <div style="text-align: center; border: 1px lightblue solid" class="col-xs-6 well">
                            <h3>Total Post: {{ $totalPost }}</h3>
                        </div>

                        <div style="text-align: center; border: 1px lightblue solid;" class="col-xs-6 well">
                            <h3>Total User: {{ $totalUser }}</h3>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
