@extends('layouts.boot')


@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{url('/tools')}}">Tools</a></li>
            <li>View A Tool</li>
        </ol>
    </div>
    <div class="row"><a href="{{url('/tools')}}"> <button class="btn-info"><i class="fa fa-backward"> </i> back </button> </a></div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form  method="POST" action='{{url("/Admin/update/tool/{$selected->id}")}}'>
                {{ csrf_field() }}

                <div class="modal-body">
                    <h5 class="text-warning text-center text-capitalize"> Make sure you have added a Tool category and also tool type</h5>


                    <div class="form-group ">
                        <label for="name" class="control-label">Tool category</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="category" name="category">
                                <option value="{{$selected->tool_category->id}}">{{$selected->tool_category->category}}</option>
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
                                <option value="{{$selected->tool->id}}">{{$selected->tool->name}}</option>
                                {{--@foreach($tools as $tool)--}}
                                {{--<option value="{{$tool->id}}">{{$tool->name}}</option>--}}
                                {{--@endforeach--}}


                            </select>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="name" class=" control-label">Date received</label>
                        <div class="col-sm-12">
                            <input type="text" class="col-sm-12 form-control"  value="{{$selected->date}}" id="pickDate" required placeholder="Enter the date material was received" name="date">
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="supplier" class="control-label">supplier name</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="supplier">
                                <option value="{{$selected->supplier->id}}">{{$selected->supplier->name}}</option>
                                @foreach($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                @endforeach


                            </select>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="quantity" class=" control-label">Quantity received</label>
                        <div class="col-sm-12">
                            <input type="text" class="col-sm-12 form-control" id="quantity" value="{{$selected->quantity}}" required placeholder="enter quantity received" name="quantity">
                        </div>
                    </div>


                    <div class="form-group ">
                        <label for="unit" class=" control-label">units</label>
                        <div class="col-sm-12">
                            <input type="text" class="col-sm-12 form-control" value="{{$selected->unit}}" id="unit" required placeholder="Enter units (e.g tonnes, pieces)" name="unit">
                        </div>
                    </div>


                </div>

                <div class="modal-footer text-center">
                    {{--<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>--}}
                    <div class="text-center"></div>
                    <button type="submit" class="btn btn-primary text-center "><i class="fa fa-save"></i> Update </button>
                </div>

            </form>

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

    <script>

        $(document).ready(function () {
            $('#pickDate').datepicker({
                startDate: new Date(),
                format: "dd/mm/yyyy"
            });
        });
    </script>
@endsection
