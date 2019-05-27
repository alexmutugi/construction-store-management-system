@extends('layouts.reportpage')


@section('content')


    <div class="row">
        <h3 class="text-center"><strong>Tools Allocation record</strong></h3>

        <input type="button" name="btnprint" value="Print" onclick="PrintMe('DivID')"/>

        <div class="col-sm-11">
            <div id="DivID" >
                <table id="MyTable1" id="DivID" class="table-bordered table-hover" >
                    <thead>
                    <tr>
                        <th></th>
                        <th>Tool category</th>
                        <th>Tool name</th>
                        <th>employee name</th>
                        <th>employee phone number</th>
                        <th>No of tool allocated</th>
                        <th>status</th>
                        <th>Date allocated</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1 ?>
                    @foreach($data as $tool)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$tool->tool_category->category}}</td>
                            <td>{{$tool->tool->name}}</td>
                            <td>{{$tool->employee->name}}</td>
                            <td>{{$tool->employee->phone}}</td>
                            <td>{{$tool->quantity}}</td>
                            <td>{{$tool->status}}</td>
                            <td>{{$tool->date}}</td>

                        </tr>
                        <?php $i++ ?>
                    @endforeach

                    </tbody>
                </table>
                <?php echo "on"; echo date('d-m-y h:m:i') ?>
            </div>



        </div>

    </div>
    <br/>


    {{--<div class="row">--}}
    {{--<h3 class="text-center"><strong>material Usage</strong></h3>--}}

    {{--<input type="button" name="btnprint" value="Print" onclick="PrintMe('DivID')"/>--}}

    {{--<div class="col-sm-11">--}}
    {{--<div id="DivID" >--}}
    {{--<table id="MyTable2" id="DivID" class="table-bordered table-hover" >--}}
    {{--<thead>--}}
    {{--<tr>--}}
    {{--<th>material category</th>--}}
    {{--<th>material name</th>--}}
    {{--<th>Date used</th>--}}
    {{--<th>Quantity Available</th>--}}
    {{--</tr>--}}
    {{--</thead>--}}
    {{--<tbody>--}}
    {{--<?php $i=1 ?>--}}
    {{--@foreach($data as $use)--}}
    {{--<tr>--}}
    {{--<td>{{$i}}</td>--}}
    {{--<td>{{$use->material_category->category}}</td>--}}
    {{--<td>{{$use->name}}</td>--}}
    {{--<td>{{$use->date}}</td>--}}
    {{--<td>{{$use->quantity}}</td>--}}

    {{--</tr>--}}
    {{--<?php $i++ ?>--}}
    {{--@endforeach--}}

    {{--</tbody>--}}
    {{--</table>--}}
    {{--<?php echo "on"; echo date('d-m-y h:m:i') ?>--}}
    {{--</div>--}}



    {{--</div>--}}

    {{--</div>--}}
    {{--<br/>--}}


@endsection

@section('script')
    <!-- FOR DataTable -->
    <script>
        {
            $(document).ready(function()
            {
                $('#MyTable').DataTable();
            });
        }
    </script>
    <script>
        {
            $(document).ready(function()
            {
                $('#MyTable1').DataTable();
            });
        }
    </script>
    <script>
        {
            $(document).ready(function()
            {
                $('#MyTable2').DataTable();
            });
        }
    </script>
    <script>
        {
            $(document).ready(function()
            {
                $('#MyTable3').DataTable();
            });
        }
    </script>
@endsection