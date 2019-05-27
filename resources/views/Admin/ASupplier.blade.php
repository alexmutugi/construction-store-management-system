@extends('layouts.boot')


@section('content')
    <div class="row">
        <h3 class="text-center">Supplier: {{$selected->name}}</h3>
        <div class="col-12">
            <div class="col-md-3">
                <ul class="list-group ">
                    <li class="list-group-item active alert-info">Suppliers </li>
                    @foreach($suppliers as $supplier)
                        <a href='{{url("/view/supplier/{$supplier->id}")}}'>
                            <li class="list-group-item ">{{$supplier->name}} </li>
                        </a>
                        @endforeach
                </ul>

            </div>
            <div class="col-md-9 ">
                <form class="form-horizontal" ACTION='{{url("/update/supplier/{$id}")}}' method="post">

                <div class="form-group ">
                    <label for="name" class=" control-label">Supplier's Name</label>
                    <div class="col-sm-12">
                        <input type="text" class="col-sm-12 form-control" id="name" required placeholder="Enter supplier's name" value="{{$selected->name}}" name="name">
                    </div>
                </div>
                <div class="form-group ">
                    <label for="email" class=" control-label">supplier email</label>
                    <div class="col-sm-12">
                        <input type="email" class="col-sm-12 form-control" id="email" required placeholder="enter supplier's email"  value="{{$selected->email}}" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="control-label">phone</label>
                    <div class="col-sm-12">
                        <input type="number" class="col-sm-12 form-control" id="phone" required placeholder="Enter the phone number"  value="{{$selected->phone}}" name="phone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="control-label">Date recorded in System</label>
                    <div class="col-sm-12">
                        <input type="text" class="col-sm-12 form-control" id="phone"  readonly placeholder="Enter the phone number"  value="{{$selected->created_at}}" name="phone">
                    </div>
                </div>
                <button class="btn btn-info" type="submit" value="Update"> Update</button>
                <div class="col-sm-12">
            </form>


            <h4 class="text-center">materials supplied</h4>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <th>ITEM SUPPLIED</th>
                        <th>QUANTITY SUPPLIED</th>
                        <th>DATE SUPPLIED</th>
                        </thead>

                        <tbody>
                        @if(count($msupplier)>0)
                            @foreach($msupplier as $msup)
                                <tr>
                                    <td>{{$msup->material->name}}</td>
                                    <td>{{$msup->quantity}}</td>
                                    <td>{{$msup->date}}</td>
                                </tr>
                            @endforeach
                        @else{
                        <tr class="text-warning">No Material Record found</tr>
                        @endif
                        </tbody>
                    </table>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <th>ITEM SUPPLIED</th>
                        <th>QUANTITY SUPPLIED</th>
                        <th>DATE SUPPLIED</th>
                        </thead>

                        <tbody>
                        <h4 class="text-center">Tools supplied</h4>
                        @if(count($msupplier)>0)
                            @foreach($tsupplier as $tsup)
                                <tr>
                                    <td>{{$tsup->tool->name}}</td>
                                    <td>{{$tsup->quantity}}</td>
                                    <td>{{$tsup->date}}</td>
                                </tr>
                            @endforeach
                        @else{
                        <tr class="text-warning">No Tool Record found</tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>


    @endsection