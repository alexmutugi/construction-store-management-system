@extends('layouts.boot')


@section('content')
    <div class="row">
        <ol class="breadcrumb">
            @if(Auth::User()->id <=2)
                <li><a href="{{url('/materials')}}">Materials supplied/In</a></li>
                <li><a href="{{url('/Current_materials')}}">Available Materials</a></li>
                <li><a href="{{url('/material_usage')}}">Materials Out</a></li>
            @else
                <li><a href="{{url('keeper/materials')}}">Materials supplied</a></li>
                <li><a href="{{url('keeper/Current_materials')}}">Available Materials</a></li>
                <li><a href="{{url('keeper/material_usage')}}">Materials Usage</a></li>
            @endif
        </ol>
    </div>

    <div class="row">
        <!-- Button trigger modal -->

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    @if(count($cats)>0)

                        <div class="modal-header">
                            <button type="button" class="close btn-sm " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h5 class="modal-title small text-center font-weight-bold" id="myModalLabel">New material</h5>
                        </div>

                        <form  method="POST" action='{{url("/Admin/save/material")}}'>
                            {{ csrf_field() }}

                            <div class="modal-body">


                                <div class="form-group ">
                                    <label for="name" class="control-label">Material category</label>
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
                                    <label for="name" class=" control-label">Material name</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" id="material" name="name">
                                            <option value="">--select -</option>


                                        </select>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="name" class=" control-label">Date received</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="col-sm-12 form-control" id="pickDate" required placeholder="Enter the date material was received" name="date">
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

                            <form  method="POST" action='{{url("/Admin/save/material/category")}}'>
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
                            @if(Auth::User()->id <=2)
                            <a href='{{url("/view/{$cat->id}/Materials")}}' class="list-group-item">{{$cat->category}}</a>
                            @else
                            <a href='{{url("keeper/view/{$cat->id}/Materials")}}' class="list-group-item">{{$cat->category}}</a>
                            @endif
                        @endforeach
                    @else
                        <li class="list-group-item text-warning">no category found</li>
                    @endif


                </div>

            </div>
            <div class="col-sm-8">
                <h3 class="text-center">Current Materials</h3>
                <button  type="button" class="btn btn-primary btn-sm col-10 text-center" data-toggle="modal" data-target="#myModal">
                    new material
                </button>
                <div class="table-responsive ">
                    <table class="table table-bordered table-hover table-condensed table-responsive">
                        <thead>
                        <tr>
                            <th>category</th>
                            <th>name</th>
                            <th>quantity</th>

                        </tr>
                        </thead>

                        @if(count($selecteds)>0)

                            <tbody>
                            @foreach($selecteds as $selected)
                                <tr>

                                    <td>{{$selected->category}}</td>
                                    <td>{{$selected->material->name}}</td>
                                    <td>{{$selected->total}} units </td>
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
                @if(Auth::User()->id <=2)
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal3">
                    new material type
                </button>
                @endif
                <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close btn-sm " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h5 class="modal-title small text-center font-weight-bold" id="myModalLabel2">New material type</h5>
                            </div>

                            <form  method="POST" action='{{url("/Admin/save/material/type")}}'>
                                {{ csrf_field() }}
                                <div class="form-group ">
                                    <label for="name" class=" control-label">Material category </label>
                                    <div class="col-sm-12">
                                        <select class="form-control" id="category" name="category">
                                            <option value="">--select -</option>
                                            @foreach($cats as $cat)
                                                <option value="{{$cat->id}}">{{$cat->category}}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>

                                <div class="modal-body">
                                    <div class="form-group ">
                                        <label for="type" class=" control-label">Material Type</label>
                                        <div class="col-sm-12">
                                            <input name="type" type="text" id="material" class="form-control">
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
                        Material Types
                    </li>

                    @if(count($Tmaterials)>0)
                        @foreach($Tmaterials as $Tmaterial)
                            @if(Auth::User()->id <=2)
                                <a href='{{url("view/material/{$Tmaterial->id}/byType")}}'  class="list-group-item">{{$Tmaterial->name}}</a>
                            @else
                                <a href='{{url("keeper/view/material/{$Tmaterial->id}/byType")}}'  class="list-group-item">{{$Tmaterial->name}}</a>
                            @endif
                        @endforeach
                    @else
                        <li class="list-group-item text-warning">no material Type found</li>
                    @endif


                </div>

            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).on("change", '#category', function () {
            var stateUrl = "{{ url('api/material')}}";

            $.get(stateUrl,
                {option: $(this).val()},
                function (data) {
                    var model = $('#material');
                    model.empty();
                    model.append("<option>Select material name</option>");
                    $.each(data, function (index, element) {
                        model.append("<option value='" + element.id + "'>" + element.name + "</option>");
                    });
                }
            );
        });

    </script>

    {{--<script>--}}
        {{--var dt= new Date();--}}
        {{--var yyyy = dt.getFullYear().toString();--}}
        {{--var mm = (dt.getMonth()+1).toString(); // getMonth() is zero-based--}}
        {{--var dd  = dt.getDate().toString();--}}
        {{--var min = yyyy +'-'+ (mm[1]?mm:"0"+mm[0]) +'-'+ (dd[1]?dd:"0"+dd[0]); // padding--}}
        {{--alert(min);--}}
        {{--$('#date').prop('min',min);--}}
    {{--</script>--}}
@endsection