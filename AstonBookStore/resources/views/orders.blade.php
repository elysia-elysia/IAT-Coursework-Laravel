@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
@endsection

@section('content')

    <div class="row justify-content-center">
        {{--            <div class="col-md-8 ">--}}
        <div class="card">
            <div class="card-header">Previous Orders</div>
            <!-- display the errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul> @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li> @endforeach
                    </ul>
                </div><br/> @endif
        <!-- display the success status -->
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div><br/> @endif
            <div class="card-body">
                <table class="table table-striped" id="orders">
                    <thead>
                    <tr>
                        <th>Order Number</th>
                        @if(Auth::check() && (Auth::user()->role == 1))
                            <th>Customer</th>
                        @endif
                        <th>Order Quantity</th>
                        <th>Order Price</th>
                        <th>Order Date/Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order['id']}}</td>
                            @if(Auth::check() && (Auth::user()->role == 1))
                                <td>{{$order['userid']}}</td>
                            @endif
                            <td>{{$order['orderquantity']}} {{$order['orderquantity'] > 1 ? 'books' : 'book'}}</td>
                            <td>£{{$order['orderprice']}}</td>
                            <td>{{$order['created_at']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{--        </div>--}}

@endsection
@section('scripts')
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            // Setup - add a text input to each column
            $('#orders thead tr').clone(true).appendTo('#orders thead');
            $('#orders thead tr:eq(1) th').each(function (i) {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');

                $('input', this).on('keyup change', function () {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            });
            $('#orders').dataTable();
        });
    </script>
@endsection
