@extends('layouts.master')

@section('title')
    Invoice List
@endsection


@section('page')
    Invoice List
@endsection


@section('content')
    <div class="row margin-bottom">
        <div class="col-md-6">
            <a href="{{route('sales')}}" class="btn btn-primary">Add new Sales</a>
        </div>
        <div class="col-md-6">
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table id="invoice" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Contact</th>
                            <th>Total</th>
                            <th>Due</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoice as $row)
                            @php
                                $total_amount = 0;
                                $items = $row->item()->get();

                                foreach ($items as $rows){
                                    $total_amount += ($rows->price * $rows->qty);
                                }

                                    $grand_total = ($total_amount + $row->otherCost) - $row->discount;

                            @endphp
                            <tr>
                                <td>{{$row->invoiceID}}</td>
                                <td>{{$row->created_at}}</td>
                                <td>{{$row->customer['name']}}</td>
                                <td>{{$row->customer['contact']}}</td>
                                <td>{{$grand_total}}</td>
                                <td>{{$grand_total - $row->payment($row->invoiceID)}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-warning view" href="{{route('show_invoice',['id' => $row->invoiceID])}}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-xs btn-success ediBtn" href="{{route('edit_invoice',['id' => $row->invoiceID])}}"><i class="fa fa-pencil"></i></a>
                                    <a href="{{route('del_invoice',['id' => $row->invoiceID])}}" onclick="return confirm('Are you sure to delete?');" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

        $(function(){
            $('#invoice').DataTable();
        });
    </script>
@endsection

@section('style')


@endsection
