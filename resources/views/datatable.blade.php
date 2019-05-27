<html lang="en">
<head>

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

    <title>Datatable</title>


    <link href="{{ asset('dt/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dt/search.css') }}" rel="stylesheet">
    <link href="{{ asset('dt/buttonsdataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dt/dataTables.min.css') }}" rel="stylesheet">

</head>
<body>
<input type="button" name="btnprint" value="Print" onclick="PrintMe('DivID')"/>

<div class="container" id="DivID">
        <table id="MyTable" class="table-bordered table-hover" >
            <thead>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
                <th>Column 3</th>
                <th>Column 4</th>
                <th>Column 5</th>
                <th>Column 6</th>
                <th>Column 7</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $dat)
                <tr>
                    <td>{{$dat->id}}</td>
                    <td>{{$dat->date}}</td>
                    <td>{{$dat->quantity}}</td>
                    <td>{{$dat->unit}}</td>
                    <td>{{$dat->updated_at}}</td>
                    <td>{{$dat->material->name}}</td>
                    <td>{{$dat->material_category->category}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    <?php echo "on"; echo date('d-m-y h:m:i') ?>



</div>

{{--<script type="text/javascript" charset="utf8" src="{{ asset('/datatable/dataTables.min.js') }}"></script>--}}
<script type="text/javascript" charset="utf8" src="{{ asset('dt/jquery.min.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('dt/bootstrap.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('dt/search.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('dt/dataTables.buttons.min.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('dt/dataTables.min.js') }}"></script>

<script language="javascript">
    function PrintMe(DivID) {
        var disp_setting="toolbar=yes,location=no,";
        disp_setting+="directories=yes,menubar=yes,";
        disp_setting+="scrollbars=yes,width=650, height=600, left=100, top=25";
        var content_vlue = document.getElementById(DivID).innerHTML;
        var docprint=window.open("","",disp_setting);
        docprint.document.open();
        docprint.document.write('<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">');
        docprint.document.write('<head><title>Material Supplied</title>');
        docprint.document.write('<style type="text/css">body{ margin:10px; ');
        docprint.document.write('a{color:#000;text-decoration:none;}');
        docprint.document.write('a{color:#000;text-decoration:none;} </style>');
        docprint.document.write('</head><body onLoad="self.print()"><center>');
        docprint.document.write(content_vlue);
        docprint.document.write('</center></body></html>');
        docprint.document.close();
        docprint.focus();
    }
</script>

<!-- FOR DataTable -->
<script>
    {
        $(document).ready(function()
        {
            $('#MyTable').DataTable();
        });
    }
</script>


</body>
</html>