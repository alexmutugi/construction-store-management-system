@extends('layouts.boot')


@section('content')
    @if(Auth::User()->id <=2)
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{url('/tools')}}">tools</a></li>
                <li class="active">{{$selected->category}}</li>
            </ol>
        </div>
        @else
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{url('keeper/tools')}}">tools</a></li>
            <li class="active">{{$selected->category}}</li>
        </ol>
    </div>

@endif

    <div class="row">
        @if(Auth::User()->id <=2)
        <a href="{{url("/tools")}}">
            <button class="pull-left" ><i class="fa fa-backward"></i> back</button>
        </a>
        @else
        <a href="{{url("keeper/tools")}}">
            <button class="pull-left" ><i class="fa fa-backward"></i> back</button>
        </a>
        @endif
        <!-- Button trigger modal -->
            @if(Auth::User()->id <=2)
            <button  type="button" class="btn btn-primary btn-sm col-10 pull-right" data-toggle="modal" data-target="#myModal">
            new tool IN
        </button>
            @else
            <button  type="button" class="btn btn-primary btn-sm col-10 pull-right" data-toggle="modal" data-target="#myModal">
            new tool IN
        </button>
            @endif
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    @if(count($cats)>0)

                        <div class="modal-header">
                            <button type="button" class="close btn-sm " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h5 class="modal-title small text-center font-weight-bold" id="myModalLabel">New tool</h5>
                        </div>

                        <form  method="POST" action='{{url("/Admin/save/tool")}}'>
                            {{ csrf_field() }}

                            <div class="modal-body">


                                <div class="form-group ">
                                    <label for="name" class="control-label"> category</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="category">
                                            <option value="{{$selected->id}}">{{$selected->category}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="name" class=" control-label">tool name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="col-sm-12 form-control" id="name" required placeholder="enter tool name" name="name">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="name" class=" control-label">Date received</label>
                                    <div class="col-sm-12">
                                        <input type="date" class="col-sm-12 form-control" id="name" required placeholder="Enter the date tool was received" name="date">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="supplier" class="control-label">supplier name</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="supplier">
                                            <option value="">--select -</option>
                                            @foreach($suppliers as $supplier)
                                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="quantity" class=" control-label">Quantity received</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="col-sm-12 form-control" id="quantity" required placeholder="enter quantity received" name="quantity">
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <label for="unit" class=" control-label">units</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="col-sm-12 form-control" id="unit" required placeholder="Enter units (e.g tonnes, pieces)" name="unit">
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
                @else
                    <div class="modal-body">
                        <p class="alert-warning">Please first Add a category</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Modal -->

    </div>
    <div class="row" >
        <h3 class="text-center">{{$selected->category}} Tool category</h3>
        <div class="col-md-12">
            <div class="col-md-3">
                @if(Auth::User()->id <=2)
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal2">
                    new category
                </button>
                @endif
                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close btn-sm " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h5 class="modal-title small text-center font-weight-bold" id="myModalLabel2">New category</h5>
                            </div>

                            <form  method="POST" action='{{url("/Admin/save/tool/category")}}'>
                                {{ csrf_field() }}

                                <div class="modal-body">
                                    <div class="form-group ">
                                        <label for="name" class=" control-label">category</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="col-sm-12 form-control" id="category" required placeholder="Enter category" name="category">
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

                <div class="list-group" style="margin-top: 10px;">
                    <li class="list-group-item disabled">
                        Categories
                    </li>
                    @if(Auth::User()->id <=2)
                    @if(count($cats)>0)
                        @foreach($cats as $cat)
                            <a href='{{url("/view/{$cat->id}/tool")}}' class="list-group-item">{{$cat->category}}</a>
                        @endforeach
                    @else
                        <li class="list-group-item text-warning">no category found</li>
                    @endif
                    @else
                    @if(count($cats)>0)
                        @foreach($cats as $cat)
                            <a href='{{url("keeper/view/{$cat->id}/tool")}}' class="list-group-item">{{$cat->category}}</a>
                        @endforeach
                    @else
                        <li class="list-group-item text-warning">no category found</li>
                    @endif

                        @endif


                </div>

            </div>
            <div class="col-sm-9">
                <div class="table-responsive col-sm-12">
                    <table class="table table-bordered table-hover table-condensed table-responsive-sm">
                        <thead>
                        <tr>
                            <th>category</th>
                            <th>name</th>
                            <th>quantity</th>
                            <th>supplier</th>
                            <th>date recieved</th>
                            <th>date recorded</th>
                        </tr>
                        </thead>

                        @if(count($tools)>0)

                            <tbody>
                            @foreach($tools as $tool)
                                <tr>
                                    <td>{{$tool->tool_category->category}}</td>
                                    <td>{{$tool->tool->name}}</td>
                                    <td>{{$tool->quantity}} {{$tool->unit}}</td>
                                    <td>{{$tool->supplier->name}}</td>
                                    <td>{{$tool->date}}</td>
                                    <td>{{$tool->created_at}}</td>

                                </tr>
                            @endforeach

                            @else
                                <tr class="text-danger"> no record found
                                </tr>
                            @endif


                            </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection