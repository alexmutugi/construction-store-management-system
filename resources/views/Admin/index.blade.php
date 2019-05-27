@extends('layouts.boot')

@section('title')

    @endsection

@section('content')

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12 text-center">
        {{--<h1 class="page-header">--}}
            {{--Dashboard <small>Statistics Overview</small>--}}
        {{--</h1>--}}
        <ol class="breadcrumb">
            <li class="active text-uppercase">
                <i class="fa fa-dashboard fa-2x"></i> <strong>Dashboard</strong>
            </li>
        </ol>
    </div>
</div>


<div class="row">

    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 ></h3>
            </div>
            <div class="panel-body">
                <div class="col-md-12 text-center">
                    <div class="col-md-4">
                        @if(count($alerts)==0)
                            <button class="btn btn-danger btn-large" style="padding: 40px" type="button">
                                Alerts <span class="badge">0</span>
                            </button>
                            @elseif(count($alerts)>0)
                            <a href="">
                                <button class="btn btn-danger btn-large" style="padding: 40px" type="button">
                                    Alerts <span class="badge">{{count($alerts)}}</span>
                                </button></a>

                            @endif
                    </div>
                    <div class="col-md-4">
                        <a href="">
                            <button class="btn btn-primary btn-large" style="padding: 40px" type="button">
                                My Employees <span class="badge">{{count($employees)}}</span>
                            </button></a>
                    </div>
                    <div class="col-md-4">
                        <a href="">
                            <button class="btn btn-primary btn-large" style="padding: 40px" type="button">
                                Supplier <span class="badge">{{count($supps)}}</span>
                            </button></a>
                    </div>

                </div>





            </div>
        </div>
    </div>
</div>
<!-- /.row -->

    @endsection