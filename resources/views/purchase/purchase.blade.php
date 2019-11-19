@extends('layouts.master')

@section('title')
    New Purchase
@endsection


@section('page')
    New Purchase
@endsection


@section('content')

    <form action="" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}

        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <div class="input-group-addon">
                        Supplier
                    </div>
                    <select name="supplierID" class="form-control select2" style="width: 100%;">
                        @foreach($supplier as $row)
                            <option value="{{$row->supplierID}}">{{$row->name}} ({{$row->contact}})</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-barcode"></i>
                    </div>
                    <input id="skup" type="text" class="form-control" name="skup" placeholder="SKU" autocomplete="off">
                </div>
                <div class="show_li_div_prod">
                    <ul id="prod_li_prod">
                        <li>dddd</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="show_products_tbl">

                    </tbody>

                    <tfoot>
                    <tr>
                        <th class="text-right" colspan="3">Sub Total: </th>
                        <th data-amount="0" id="total_amount"></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th class="text-right" colspan="3">Other Cost: </th>
                        <th id="other_cost"></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th class="text-right" colspan="3">Discount: </th>
                        <th id="discount"></th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>

            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"><h4>Total: <span id="all_total"></span></h4></div>
            <div class="col-md-4"><h4>Due: <span id="remain_amount"></span></h4></div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group-addon">
                        Other Cost
                    </div>
                    <input id="other_in" type="number" step="any" min="0" class="form-control" name="otherCost" placeholder="Other Cost" value="0" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group-addon">
                        Discount
                    </div>
                    <input id="discount_in" type="number" step="any" min="0" class="form-control" name="discount" placeholder="Discount" value="0" required>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <div class="input-group">
                    <div class="input-group-addon">
                        Paid Amount
                    </div>
                    <input id="payable" type="number" step="any" min="0" class="form-control" name="cashOUT" placeholder="Paid Amount" value="0" required>
                </div><br>
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </div>
    </form>

@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('public/bower_components/select2/dist/css/select2.min.css')}}">

    <style rel="stylesheet" type="text/css">

        .show_li_div{
            width: 100%;
            position: relative;
            padding-left: 50px;
            display: none;
            z-index: 9000;

        }

        .show_li_div ul{
            position: absolute;
            list-style-type: none;
            margin: 0px;
            padding: 5px;
            background-color: white;
            box-shadow: 1px 2px 2px rgba(0,0,0,0.2);
            left: 0px;
            right: 0px;
        }

        .show_li_div ul li{
            display: block;
            cursor: pointer;
        }

        .show_li_div ul li:hover{
            background-color: #EEEEEE;
        }

    </style>

@endsection

@section('script')
    <script src="{{asset('public/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script>
        
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();

            get_product();
        });

        $(window).click(function () {
            $('.show_li_div_prod').hide();
        });

        $(function () {

            $('#skup').on('keypress keyup keydown', function () {
                var skup = $(this).val();

                var datap = '';
                if (skup.length > 0){
                    $.ajax({
                        url: "{{route('search_sku')}}",
                        type: 'GET',
                        dataType: 'json',
                        data: {search:skup},
                        success: function(result){
                            $.each(result, function( ip, prodp ) {
                                datap += '<li class="set_to_list_prod" data-id="'+prodp.productID+'">('+prodp.sku+') <b>'+prodp.name+'</b> ('+prodp.price+')</li>';
                            });
                            $('.show_li_div_prod').show();
                            $('#prod_li_prod').html(datap);
                            set_product();
                        }
                    });
                }
                $('.show_li_div_prod').hide();
               // alert();
                
            });
        });

    </script>

@endsection