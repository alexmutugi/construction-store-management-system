@extends('layouts.boot')


@section('content')

    <div class="row">
        <ol class="breadcrumb">
            @if(Auth::User()->id <= 2)
            <li><a href="{{url('/tools')}}">Tools</a></li>
            @else
            <li><a href="{{url('keeper/tools')}}">Tools</a></li>
                @endif
        </ol>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">


       </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    @if(count($cats)>0)

                        <div class="modal-header">
                            <button type="button" class="close btn-sm " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h5 class="modal-title small text-center font-weight-bold" id="myModalLabel">New Tool</h5>
                        </div>

                        <form  method="POST" action='{{url("/Admin/save/tool")}}'>
                            {{ csrf_field() }}

                            <div class="modal-body">
                                <h5 class="text-warning text-center text-capitalize"> Make sure you have added a Tool category and also tool type</h5>


                                <div class="form-group ">
                                    <label for="name" class="control-label">Tool category</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" id="category" name="category">
                                            <option value="">--select -</option>
                                            @foreach($cats as $cat)
                                                <option value="{{$cat->id}}">{{$cat->category}}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="name" class=" control-label">Tool name</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" id="tool" name="tool">
                                           

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="name" class=" control-label">Date received</label>
                                    <div class="col-sm-12">
                                        <input type="date" class="col-sm-12 form-control" id="name" required placeholder="Enter the date material was received" name="date">
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
        <div class="col-md-12">
            <div class="col-md-2">
                @if(Auth::User()->id <= 2)
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

                    @if(count($cats)>0)
                        @foreach($cats as $cat)
                            @if(Auth::User()->id <= 2)
                            <a href='{{url("/view/{$cat->id}/tool")}}'  class="list-group-item">{{$cat->category}}</a>
                            @else
                            <a href='{{url("keeper/view/{$cat->id}/tool")}}'  class="list-group-item">{{$cat->category}}</a>
                            @endif
                        @endforeach
                    @else
                        <li class="list-group-item text-warning">no category found</li>
                    @endif


                </div>
            </div>
            <div class="col-sm-8">
                <div class="col-md-12 text-center">
                    <h3 class="text-center">Tools Supplied</h3>
                </div>
                <!-- Button trigger modal -->
                <button  type="button" class="btn btn-primary btn-sm col-10 " data-toggle="modal" data-target="#myModal">
                    new Tool details
                </button>
                <div class="table-responsive col-sm-12">
                    <table class="table table-bordered table-hover table-condensed table-responsive-sm">
                        <thead>
                        <tr>
                            <th>category</th>
                            <th>name</th>
                            <th>quantity</th>
                            <th>supplier</th>
                            <th>date recieved</th>
                            @if(Auth::User()->id <= 2)
                            <th colspan="2"></th>
                                @endif
                        </tr>
                        </thead>

                        @if(count($tools)>0)

                            <tbody>
                            @foreach($toolss as $tool)
                                <tr>
                                    <td>{{$tool->tool_category->category}}</td>
                                    <td>{{$tool->tool->name}}</td>
                                    <td>{{$tool->quantity}} {{$tool->unit}}</td>
                                    <td>{{$tool->supplier->name}}</td>
                                    <td>{{$tool->date}}</td>
                                    @if(Auth::User()->id <= 2)
                                    <td><a href='{{url("/view/Atool/{$tool->id}")}}'> <i class="fa fa-eye"></i> more</a> </td>
                                    <td >
                                        <a href="{{ route('tool.delete', $tool->id) }}" class="text-warning" onclick="return confirm('please confirm delete, proceed??')"><i class="fa fa-fw fa-trash"></i> Delete</a>
                                    </td>
                                        @endif

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
            <div class="col-md-2">
                @if(Auth::User()->id <= 2)
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal3">
                    new tool type
                </button>
                @endif
                <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close btn-sm " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h5 class="modal-title small text-center font-weight-bold" id="myModalLabel2">New category</h5>
                            </div>

                            <form  method="POST" action='{{url("/Admin/save/tool/type")}}'>
                                {{ csrf_field() }}
                                <div class="form-group ">
                                    <label for="name" class=" control-label">Tool category </label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="category">
                                            <option value="">--select -</option>
                                            @foreach($cats as $cat)
                                                <option value="{{$cat->id}}">{{$cat->category}}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>

                                <div class="modal-body">
                                    <div class="form-group ">
                                        <label for="type" class=" control-label">Tool Type</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="type" class="col-sm-12 form-control" id="type" required placeholder="Enter Tool Type" name="category">
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
                        Tool Type
                    </li>

                    @if(count($tools)>0)
                        @foreach($tools as $tool)
                            @if(Auth::User()->id <= 2)

                            <a href='{{url("/view/{$tool->id}/toolType")}}'  class="list-group-item">{{$tool->name}}</a>
                            @else
                            <a href='{{url("keeper/view/{$tool->id}/toolType")}}'  class="list-group-item">{{$tool->name}}</a>
                            @endif
                        @endforeach
                    @else
                        <li class="list-group-item text-warning">no Available Tool Type found</li>
                    @endif


                </div>

            </div>

        </div>
    </div>
@endsection
@section('script')

    <script>
        $(document).on("change", '#category', function () {
            var myUrl = "{{ url('api/tool')}}";

            $.get(myUrl,
                {option: $(this).val()},
                function (data) {
                    var model = $('#tool');
                    model.empty();
                    model.append("<option>Select a tool</option>");
                    $.each(data, function (index, element) {
                        model.append("<option value='" + element.id + "'>" + element.name + "</option>");
                    });
                }
            );
        });

    </script>
@endsection