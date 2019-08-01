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
        <div class="col-md-6"></div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table id="invoice" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>invoice ID</th>
                            <th>Customer Name</th>
                            <th>Discount</th>
                            <th>Other cost</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoice as $row)
                            <tr>
                                <td>{{$row->invoiceID}}</td>
                                <td>{{$row->customerID}}</td>
                                <td>{{$row->discount}}</td>
                                <td>{{$row->otherCost}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-warning view" data-toggle="modal" data-target="#invoice" href="#"><i class="fa fa-eye"></i></a>
                                    <button class="btn btn-xs btn-success ediBtn"
                                            data-invoiceID="{{$row->invoiceID}}"
                                            data-customerID="{{$row->customerID}}"
                                            data-discount="{{$row->discount}}"
                                            data-otherCost="{{$row->otherCost}}"
                                            data-toggle="modal" data-target="#ediModal"><i class="fa fa-pencil"></i></button>
                                    <a href="" onclick="return confirm('Are you sure to delete?');" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>

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
            $('.view').on('click', function(e){
                e.preventDefault();

            });
        });
        $(function(){
            $('#invoice').DataTable();
        });
    </script>
@endsection

@section('style')

    <style type="text/css">
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            font-size: 0.8rem;
            font-family: 'Roboto', sans-serif;
        }

        .invoice-headr{
            display:flex;
            flex-direction:rows;
            justify-content: space-between;
        }
        .src-left{
            background-color: #cccccc;
            border-left:1px solid black;
        }
        .src-right{
            background-color: #cccccc;
            border-right:1px solid black;
        }

        .src-heading {
            background-color: #cccccc;
            border-top:1px solid black;
            border-right:1px solid black;
            border-left:1px solid black;
        }

        .invoice-box table tr.invoiceheading td {
            border-bottom: 1px solid #000;
            font-weight: bold;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
        }

        .invoice-box table tr.heading td  {
            border-bottom: 1px solid #000;
            border-top: 1px solid #000;
            font-weight: bold;
        }

        .invoice-box table tr.total td {
            border-bottom: 1px solid #000;
            border-top: 1px solid #000;
            font-weight: bold;
        }


        .companyheading{
            margin-bottom: 0;
            text-transform: uppercase;
        }

        .header-subheading{
            margin:0;
        }

        .customername {
            text-transform: uppercase;
        }


        .right{
            text-align: right;
        }

        .invoice-summary{
            display:flex;
            justify-content:flex-end;
            margin-top:2px;
            margin-right:0px
        }


        .opening-balance-text{
            padding-top:20px;
        }

        .disclaimer-text{
            padding-top:40px;
            font-size:0.6rem;
        }
    </style>

@endsection
