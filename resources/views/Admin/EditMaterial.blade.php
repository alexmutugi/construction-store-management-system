@extends('layouts.boot')


@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{url('/materials')}}">Materials</a></li>
            <li>Edit Materials</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form  method="POST" action='{{url("/Admin/update/material/{$selected->id}/save")}}' class="form">
                {{ csrf_field() }}

                <div class="form-group ">
                    <label for="name" class="control-label">Material category</label>
                    <div class="col-sm-12">
                        <select class="form-control" name="category">
                            <option value="">{{$selected->material_category->category}}</option>
                            @foreach($cats as $cat)
                                <option value="{{$cat->id}}">{{$cat->category}}</option>
                            @endforeach


                        </select>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="name" class=" control-label">Material name</label>
                    <div class="col-sm-12">
                        <input type="text" class="col-sm-12 form-control" id="name" value="{{$selected->name}}" required placeholder="enter material name" name="name">
                    </div>
                </div>

                <div class="form-group ">
                    <label for="name" class=" control-label">Date received</label>
                    <div class="col-sm-12">
                        <input type="date" class="col-sm-12 form-control" id="name" value="{{$selected->date}}" required placeholder="Enter the date material was received" name="date">
                    </div>
                </div>

                <div class="form-group ">
                    <label for="supplier" class="control-label">supplier name</label>
                    <div class="col-sm-12">
                        <select class="form-control" name="supplier">
                            <option  value="{{$selected->supplier->id}}">{{$selected->supplier->name}}</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                            @endforeach


                        </select>
                    </div>
                </div>

                <div class="form-group ">
                    <label for="quantity" class=" control-label">Quantity received</label>
                    <div class="col-sm-12">
                        <input type="text" class="col-sm-12 form-control" id="quantity"  value="{{$selected->quantity}}"required placeholder="enter quantity received" name="quantity">
                    </div>
                </div>


                <div class="form-group ">
                    <label for="unit" class=" control-label">units</label>
                    <div class="col-sm-12">
                        <input type="text" class="col-sm-12 form-control" id="unit" required  value="{{$selected->unit}}" placeholder="Enter units (e.g tonnes, pieces)" name="unit">
                    </div>
                </div><br/><br/>

                <div class="modal-footer text-center">
                    {{--<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>--}}
                    <div class="text-center"></div>
                    <button type="submit" class="btn btn-primary text-center "><i class="fa fa-save"></i> Update </button>
                </div>

            </form>

        </div>
    </div>




    @endsection