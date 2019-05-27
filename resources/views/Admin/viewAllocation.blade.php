@extends('layouts.boot')


@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li ><a href="{{url('/workers')}}">Workers</a></li>
            <li><a href="{{url('/allocate')}}">Allocate Resource</a></li>
            <li class="active">view Resource Allocation</li>
        </ol>
    </div>

    <div class="row" >
        <h3 class="text-center">Allocated Tools </h3>
        <div class="table-responsive col-sm-12 align-content-center">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Employee name</th>
                    <th>Employee status</th>
                    <th>Tool name </th>
                    <th>Number of tools allocated</th>
                    <th>status</th>
                    <th>date</th>
                    <th>Mark as</th>
                    <th></th>
                </tr>
                </thead>
                @if(count($allocates)>0)
                    <tbody>
                    @foreach($allocates as $allocate)
                        <tr>
                            <td>{{$allocate->employee->name}}</td>
                            <td>{{$allocate->employee->status}}</td>
                            <td>{{$allocate->tool->name}}</td>
                            <td>{{$allocate->quantity}}</td>
                            <td>{{$allocate->status}}</td>
                            <td>{{$allocate->date}}</td>
                            <td><a href='{{url("/recieve/{$allocate->id}")}}'> Recieved</a> </td>
                            <td><a href='{{url("/view/{$allocate->id}/allocation")}}'><i class="fa fa-eye"></i> more</a> </td>
                        </tr>
                    @endforeach
                    @else
                        <tr>
                            <p class="text-danger"> no record found</p>
                        </tr>
                    @endif


                    </tbody>
            </table>
        </div>
    </div>


@endsection