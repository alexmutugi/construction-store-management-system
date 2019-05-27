@extends('layouts.boot')


@section('content')
    <div class="row">
        <ol class="breadcrumb">
            @if(Auth::User()->id <=2)
                <li>Workers</li>
                <li class="active"><a href="{{url('/allocate')}}">Allocate Resource</a></li>
                <li ><a href="{{url('/view/allocate')}}">view Resource Allocation</a></li>
            @else
                <li >Workers</li>
                <li class="active"><a href="{{url('keeper/allocate')}}">Allocate Resource</a></li>
                <li ><a href="{{url('keeper/view/allocate')}}">view Resource Allocation</a></li>
            @endif
        </ol>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-2 col-sm-12 ">
            <form class="form" method="POST" action='{{url("/Admin/allocate/save")}}'>
                {{ csrf_field() }}
                    <div class="form-group ">
                        <label for="employee" class="control-label">Employee name</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="employee">
                                <option value="">--select -</option>
                                @foreach($employees as $employee)
                                    <option value="{{$employee->id}}">{{$employee->name}}</option>
                                @endforeach


                            </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="cat" class="control-label">tool category</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="category" name="cat">
                                <option value="">--select -</option>
                                @foreach($ctools as $ctool)
                                    <option value="{{$ctool->id}}">{{$ctool->category}}</option>
                                @endforeach


                            </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="tool" class="control-label">Tool name</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="tool" name="tool">
                                <option value="">--select -</option>
                                {{--@foreach($tools as $tool)--}}
                                    {{--<option value="{{$tool->id}}">{{$tool->name}}</option>--}}
                                {{--@endforeach--}}


                            </select>
                        </div>
                    </div>

                <div class="form-group ">
                    <label for="name" class=" control-label">Date Allocated</label>
                    <div class="col-sm-12">
                        <input type="date" class="col-sm-12 form-control" id="date" required placeholder="Date allocated " name="date">
                    </div>
                </div>

                <div class="form-group ">
                    <label for="quantity" class=" control-label">No of tools</label>
                    <div class="col-sm-12">
                        <input type="number" class="col-sm-12 form-control" id="quantity" required placeholder="Number of tools allocated" name="quantity">
                    </div>
                </div>


                <br/><br/>


                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary text-center "><i class="fa fa-save"></i> Allocate</button>

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
@endsection