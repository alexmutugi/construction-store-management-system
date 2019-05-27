@extends('layouts.boot')


@section('content')
    <div class="row">
        <h3 class="text-center"> New Asset</h3><br/>

     <div class="row">
         <div class="col-sm-3">
             <ul class="list-group">
                 <li class="list-group-item active">Asset category</li>
                 <li class="list-group-item">Tools</li>
                 <li class="list-group-item">Materials</li>
             </ul>

         </div>


         <div class="col-sm-9">
             <form class="col-sm-8 col-sm-offset-2" method="POST" action='{{url("/save/material")}}'>
                 {{ csrf_field() }}

                 <div class="form-group col-sm-12">
                     <label for="name" class="col-sm-12 control-label">Material Name</label>
                     <div class="col-sm-12">
                         <input type="text" class="col-sm-12 form-control" id="name" placeholder="Enter material name" name="name">
                     </div>
                 </div>

                 <div class="form-group col-sm-12">
                     <label for="name" class="col-sm-12 control-label">Date received</label>
                     <div class="col-sm-12">
                         <input type="date" class="col-sm-12 form-control" id="name" placeholder="Enter the date material was received" name="date">
                     </div>
                 </div>
                 <div class="form-group col-sm-12">
                     <label for="name" class="col-sm-12 control-label">Supplier's Name</label>
                     <div class="col-sm-12">
                         <input type="text" class="col-sm-12 form-control" id="name" placeholder="Enter supplier's name" name="supplier">
                     </div>
                 </div>
                 <div class="form-group col-sm-12">
                     <label for="name" class="col-sm-12 control-label">Total ammount received</label>
                     <div class="col-sm-12">
                         <input type="text" class="col-sm-12 form-control" id="name" placeholder="Enter ammount received" name="amount">
                     </div>
                 </div>
                 <div class="form-group col-sm-12">
                     <label for="name" class="col-sm-12 control-label">Car number plate</label>
                     <div class="col-sm-12">
                         <input type="text" class="col-sm-12 form-control" id="name" placeholder="Enter the car number plate" name="car_number">
                     </div>
                 </div>


                 <div class="form-group">
                     <div class="col-sm-offset-2 col-sm-8">
                         <button type="submit" class="btn btn-default">save</button>
                     </div>
                 </div>
             </form>
         </div>
     </div>
    </div>
    <div class="row" style="margin-top: 20px;">
        <h3 class="text-center">Materials available</h3>
        <div class="table-responsive col-sm-12">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>name</th>
                    <th>date</th>
                    <th>supplier</th>
                    <th>amount</th>
                    <th>car number</th>
                </tr>
                </thead>

                @if(count($materials)>0)

                    <tbody>
                    @foreach($materials as $material)
                        <tr>
                            <td>{{$material->name}}</td>
                            <td>{{$material->date}}</td>
                            <td>{{$material->supplier}}</td>
                            <td>{{$material->amount}}</td>
                            <td>{{$material->car_number}}</td>

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