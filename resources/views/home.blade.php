@extends('layouts.app')

@section('style')
    {{--<link href="{{ url::asset('/datatable/buttonsdataTables.min.css') }}" rel="stylesheet">--}}
    {{--<link href="{{ url::asset('/datatable/datatable.css') }}" rel="stylesheet">--}}

@endsection

@section('content')
    {{--<div class="panel panel-default">--}}
        {{--<div class="panel-heading">Dashboard</div>--}}

        {{--<div class="panel-body">--}}

            <table id="#myTable" class="table">
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
        {{--</div>--}}
    {{--</div>--}}
@endsection

@section('scripts')
    {{--<script type="text/javascript" charset="utf8" src="{{ asset('/datatable/dataTables.buttons.min.js') }}"></script>--}}
    {{--<script type="text/javascript" charset="utf8" src="{{ asset('/datatable/dataTables.min.js') }}"></script>--}}

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

@endsection
