@extends('layouts.boot')


@section('content')
    <div class="row">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal">
            new supplier
        </button>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close btn-sm " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h5 class="modal-title small text-center font-weight-bold" id="myModalLabel">New supplier</h5>
                        </div>

                        <form  method="POST" action='{{url("/Admin/save/supplier")}}'>
                            {{ csrf_field() }}

                            <div class="modal-body">
                                <div class="form-group ">
                                    <label for="name" class=" control-label">Supplier's Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="col-sm-12 form-control" id="name" required placeholder="Enter supplier's name" name="name">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="email" class=" control-label">supplier email</label>
                                    <div class="col-sm-12">
                                        <input type="email" class="col-sm-12 form-control" id="email" required placeholder="enter supplier's email" name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="control-label">phone</label>
                                    <div class="col-sm-12">
                                        <input type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  class="col-sm-12 form-control" id="phone" required placeholder="Enter the phone number" name="phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="location" class="control-label">location</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="col-sm-12 form-control" id="text" required placeholder="Enter suplier location "  value="" name="location">
                                    </div>


                                </div>
                                <div class="form-group">
                                    <label for="product suplied" class="control-label">product suplied</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="col-sm-12 form-control" id="text" required placeholder="Enter suplier product "  value="" name="product">
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
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-10 col-md-offset-1">

                <h3 class="text-center text-uppercase">Suppliers</h3>

                <div class="table-responsive col-sm-12">
                    <table class="table table-bordered table-hover table-condensed table-responsive-sm">
                        <thead>
                        <tr>
                            <th>name</th>
                            <th>Supplier Email</th>
                            <th>Phone number</th>
                            <th>Date registered</th>
                            @if(Auth::User()->id <=2)
                            <th></th>
                                @endif
                        </tr>
                        </thead>

                        @if(count($suppliers)==0)
                            <tr class="text-danger"> no record found
                            </tr>
                            @else
                            <tbody>
                            @foreach($suppliers as $supplier)
                                <tr>
                                    <td>{{$supplier->name}}</td>
                                    <td>{{$supplier->email}}</td>
                                    <td>{{$supplier->phone}}</td>
                                    <td>{{$supplier->created_at}}</td>
                                    @if(Auth::User()->id <=2)
                                    <td><a href='{{url("/view/supplier/{$supplier->id}")}}'><i class="fa fa-eye"></i> more</a> </td>
                                        @endif

                                </tr>

                            </tbody>
                            @endforeach
                            @endif
                    </table>
                </div>

            </div>

        </div>

@endsection
