@extends('layouts.boot')


@section('content')
    <div class="row">
        <h3 class="text-center">{{$emp->employee->name}} Tool Allocation</h3>
        <div class="col-12">

            </div>
            <div class="col-md-5 col-md-offset-1 form-horizontal">
                <div class="form-group ">
                    <label for="name" class=" control-label">Employee's Name</label>
                    <div class="col-sm-12">
                        <input type="text" class="col-sm-12 form-control" id="name" required readonly placeholder="Enter supplier's name" value="{{$emp->employee->name}}" name="name">
                    </div>
                </div>
                <div class="form-group ">
                    <label for="email" class=" control-label">employee phone number</label>
                    <div class="col-sm-12">
                        <input type="text" class="col-sm-12 form-control" id="email" required readonly placeholder="enter employee's email"  value="{{$emp->employee->phone}}" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="control-label">ID number</label>
                    <div class="col-sm-12">
                        <input type="number" class="col-sm-12 form-control" id="phone" required placeholder="Enter the phone number"  value="{{$emp->employee->id_no}}" readonly="" name="phone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="control-label">Tool allocated</label>
                    <div class="col-sm-12">
                        <input type="text" class="col-sm-12 form-control" id="phone" required placeholder="Enter the phone number"  value="{{$emp->tool->name}}"  readonly name="phone">
                    </div>
                </div>
            </div>
        <div class="col-md-5 col-md-offset-1 form-horizontal">
                <div class="form-group">
                    <label for="phone" class="control-label">Numbers of Tool allocated</label>
                    <div class="col-sm-12">
                        <input type="text" class="col-sm-12 form-control" id="phone" required placeholder="Enter the phone number"  value="{{$emp->quantity}}"  readonly name="phone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="control-label">Allocated By</label>
                    <div class="col-sm-12">
                        <input type="text" class="col-sm-12 form-control" id="phone" required placeholder="Enter the phone number"  value="{{$emp->user->name}}"  readonly name="phone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="control-label">Date allocated</label>
                    <div class="col-sm-12">
                        <input type="text" class="col-sm-12 form-control" id="phone" required placeholder="Enter the phone number"  value="{{$emp->date}}"  readonly name="phone">
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone" class="control-label">Status</label>
                    <div class="col-sm-12">
                        <input type="text" class="col-sm-12 form-control" id="phone" required placeholder="Enter the phone number"  value="{{$emp->status}}"  readonly name="phone">
                    </div>
                </div>


            </div>
        </div>
    </div>


@endsection