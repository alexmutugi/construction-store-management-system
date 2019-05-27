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
     <h3 class="text-center"><strong>Material Available in store</strong></h3>

        <input type="button" name="btnprint" value="Print" onclick="PrintMe('DivID')"/>

            <div class="col-sm-11">
                <div id="DivID" >
                    <h4 class="text-center">Available material</h4>
                    <table id="MyTable" id="DivID" class="table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th>material category</th>
                                <th>material name</th>
                                <th>Available stock</th>
                            </tr>
                        </thead>
                    <tbody>
                    <?php $i=1 ?>
                    @foreach($data as $dat)
                    <tr>
                    <td>{{$dat->material_category->category}}</td>
                    <td>{{$dat->name}}</td>
                    <td>{{$dat->current}}</td>
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