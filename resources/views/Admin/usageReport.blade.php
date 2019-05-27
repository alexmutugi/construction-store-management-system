@extends('layouts.reportpage')


@section('content')


    <div class="row">
        <div>

            <ol class="breadcrumb">

                <li><a href="{{url('/report')}}">Tools Allocation</a></li>
                <li><a href="{{url('/available/materials/report')}}">Available Material</a></li>
                <li><a href="{{url('/material_usage/report')}}">Material Usage </a></li>
            </ol>
        </div>
    </div>

    <div class="row">
     <h3 class="text-center"><strong>material Usage</strong></h3>

         <input type="button" name="btnprint" value="Print" onclick="PrintMe('DivID')"/>

             <div class="col-sm-11">
                    <div id="DivID" >
                        <h4 class="text-center">material record usage</h4>
                        <table id="MyTable2" id="DivID" class="table-bordered table-hover" >
                        <thead>
                                <tr>
                                <th>material category</th>
                                <th>material name</th>
                                <th>Date used</th>
                                <th>Quantity Used</th>
                                    <th>Signed By</th>
                                    <th>Date Recorded</th>
                                </tr>
                        </thead>
                                <tbody>
                                <?php $i=1 ?>
                                @foreach($data as $use)
                                <tr>
                                <td>{{$use->material_category->category}}</td>
                                <td>{{$use->material->name}}</td>
                                <td>{{$use->date}}</td>
                                <td>{{$use->quantity}} unit(s)</td>
                                    <td>{{$use->user->name}}</td>
                                    <td>{{$use->created_at}}</td>

                                </tr>
                                <?php $i++ ?>
                                @endforeach

                                </tbody>
                        </table>
                    <?php echo "Date "; echo date('d-m-y h:i') ?>
                    </div>



    </div>

    </div>
    <br/>
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