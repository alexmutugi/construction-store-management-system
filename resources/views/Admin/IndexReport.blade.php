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
        <h3 class="text-center"><strong>Tools Allocation Report</strong></h3>

        <input type="button" name="btnprint" value="Print" onclick="PrintMe('DivID')"/>

        <div class="col-sm-11">
            <div id="DivID" >
                <h4 class="text-center">Tools allocation</h4>
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
                        <th>Allocated By</th>
                        <th>Date Recorded</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1 ?>
                    @foreach($tools as $tool)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$tool->tool_category->category}}</td>
                            <td>{{$tool->tool->name}}</td>
                            <td>{{$tool->employee->name}}</td>
                            <td>{{$tool->employee->phone}}</td>
                            <td>{{$tool->quantity}}</td>
                            <td>{{$tool->status}}</td>
                            <td>{{$tool->date}}</td>
                            <td>{{$tool->user->name}}</td>
                            <td>{{$tool->created_at}}</td>

                        </tr>
                        <?php $i++ ?>
                    @endforeach

                    </tbody>
                </table>
                <?php echo "Date " ; echo date('d-m-y h:i') ?>
            </div>



        </div>

    </div>
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