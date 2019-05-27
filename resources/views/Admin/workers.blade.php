@extends('layouts.boot')


@section('content')

        <div class="row">
            <ol class="breadcrumb">
                @if(Auth::User()->id <=2)
                <li class="active">Workers</li>
                <li><a href="{{url('/allocate')}}">Allocate Resource</a></li>
                <li ><a href="{{url('/view/allocate')}}">view Resource Allocation</a></li>
                @else
                <li class="active">Workers</li>
                <li><a href="{{url('keeper/allocate')}}">Allocate Resource</a></li>
                <li ><a href="{{url('keeper/view/allocate')}}">view Resource Allocation</a></li>
                    @endif
            </ol>
        </div>
        <div class="row">
            <!-- Button trigger modal -->
            @if(Auth::User()->id <=2)
            <button type="button" class="btn btn-primary btn-sm col-10 pull-right" data-toggle="modal" data-target="#myModal">
                new Employee
            </button>
            @endif
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close btn-sm " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h5 class="modal-title small text-center font-weight-bold" id="myModalLabel">New Employee</h5>
                            </div>

                            <form  method="POST" action='{{url("/Admin/save/Employee")}}'>
                                {{ csrf_field() }}

                                <div class="modal-body">

                                    <div class="form-group col-sm-12">
                                        <label for="name" class="col-sm-12 control-label">Employee's Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="col-sm-12 form-control" id="name" placeholder="Enter the Employee's name" name="name"  required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <label for="id_no" class="col-sm-12 control-label">National ID</label>
                                        <div class="col-sm-12">
                                            <input type="integers" class="col-sm-12 form-control" id="id_no" placeholder="Enter the ID number" name="id_no"  required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="phone" class="col-sm-12 control-label">Telephone Number</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="col-sm-12 form-control" id="phone" placeholder="Enter the Employee's telephone number" name="phone"  required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="area" class="col-sm-12 control-label">Area of specialization</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="col-sm-12 form-control" id="area" placeholder="Enter Employees area of specialization" name="area"  required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="status" class="control-label col-sm-12">Employee status</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="status" required autofocus>
                                                <option value="">--select -</option>
                                                <option value="full time">skilled </option>
                                                <option value="part time">unskilled</option>


                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer text-center">
                                    {{--<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>--}}
                                    <div class="text-center"></div>
                                    <button type="submit" class="btn btn-primary text-center "><i class="fa fa-save"></i> Save </button>
                                </div>

                            </form>

                    </div>
                   
                </div>
            </div>

            <!-- Modal -->

        </div>

    <div class="row" >
        <h3 class="text-center">Employees </h3>
        <div class="table-responsive col-sm-10 align-content-center">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Employee name</th>
                    <th>phone</th>
                    <th>National ID</th>
                    <th>Area Of Specialization</th>
                    <th>Tool Allocated</th>
                    {{--<th>Number of Tool</th>--}}
                    {{--<th>Work status</th>--}}
                    {{--<th>Date</th>--}}
                    <th></th>
                </tr>
                </thead>
                @if(count($employees)>0)
                <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->phone}}</td>
                        <td>{{$employee->id_no}}</td>
                        <td>{{$employee->area}}</td>
                        <td>{{$employee->status}}</td>
                        {{--<td>{{$employee->tool_category->category}}</td>--}}
                        {{--<td>{{$employee->status}}</td>--}}
                        <td><i class="fa fa-eye"></i> more</td>
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
