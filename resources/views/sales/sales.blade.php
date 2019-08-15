@extends('layouts.master')

@section('title')
    New Sales
@endsection


@section('page')
    New Sales
@endsection


@section('content')

    <form action="{{route('new_invoice')}}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}

        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <div class="input-group-addon">
                        Customer
                    </div>
                    <select name="customerID" class="form-control select2" style="width: 100%;">
                        @foreach($customer as $row)
                            <option value="{{$row->customerID}}">{{$row->name}} ({{$row->contact}})</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-barcode"></i>
                    </div>
                    <input id="sku" type="text" class="form-control" name="sku" placeholder="SKU" autocomplete="off">
                </div>
                <div class="show_li_div">
                    <ul id="prod_li">
                        <li>ddd</li>
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
                    <input id="payable" type="number" step="any" min="0" class="form-control" name="cashIN" placeholder="Paid Amount" value="0" required>
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
            $('.show_li_div').hide();
        });

        $(function () {

            $('#sku').on('keypress keyup keydown', function () {
                var sku = $(this).val();

                var data = '';
                if (sku.length > 0){
                    $.ajax({
                        url: "{{route('search_sku')}}",
                        type: 'GET',
                        //dataType: 'json',
                        data: {search:sku},
                        success: function(result){
                            $.each(result, function( i, prod ) {
                                data += '<li class="set_to_list" data-id="'+prod.productID+'">('+prod.sku+') <b>'+prod.name+'</b> ('+prod.price+')</li>';
                            });
                            $('.show_li_div').show();
                            $('#prod_li').html(data);
                            set_product();
                        }
                    });
                }
                $('.show_li_div').hide();
                //alert();
            });
        });

        function set_product() {
            $('.set_to_list').click(function () {
                var id = $(this).data('id');

                $.get("{{route('temp_save')}}", {'id':id}, function(result){

                    if (result == 1)
                        get_product();
                });
            });
        }

        function get_product(){
            var tbl_data = '';
            var total_amount = 0;

            $.getJSON("{{route('temp_get')}}", function(result){
                $.each( result[0], function( i, row ) {
                    var urls = "{{route('temp_del')}}";
                    tbl_data +=  '<tr>'
                        +'<td>'+row[1]+'</td>'
                        +'<td><input class="qty_up" data-id="'+i+'" type="number" step="any" min="0" value="'+row[3]+'" placeholder="Quantity"> '+row[4]+'</td>'
                        +'<td><input class="price_up"  data-id="'+i+'"  type="number" step="any" min="0" value="'+row[2]+'" placeholder="Price"> tk</td>'
                        +'<td>'+row[3]*row[2]+' tk</td>'
                        +'<td><button type="button" class="btn btn-danger del_products" data-url="'+urls+'?id='+i+'">x</button></td>'
                        +'</tr>';
                    total_amount += (row[3]*row[2]);
                });

                $('#show_products_tbl').html(tbl_data);
                $('#total_amount').html(total_amount+' tk');
                $('#total_amount').data('amount', total_amount);
                $('#sku').val('');
                del_product();
                update_qty_price();
                input_amount_change();

            });
        }

        function del_product(){
            $('.del_products').click(function () {
                var url = $(this).data('url');
                $.get(url,  function(result){

                    if (result == 1)
                        alert('Delete Successfully');
                    get_product();
                });
            });
        }

        function update_qty_price(){
            $('.qty_up').change(function(){
                var id = $(this).data('id');
                var qty = $(this).val();

                $.get("{{route('update_tmp_qty')}}", {'id':id, 'qty':qty}, function(result){

                    if (result == 1)
                        get_product();
                });
            });

            $('.price_up').change(function(){
                var id = $(this).data('id');
                var price = $(this).val();

                $.get("{{route('update_tmp_price')}}", {'id':id, 'price':price}, function(result){

                    if (result == 1)
                        get_product();
                });
            });
        }


        function input_amount_change() {
            var other_costs = $('#other_in').val();
            var discounts = $('#discount_in').val();
            var totals = $('#total_amount').data('amount');
            var payables = $('#payable').val();
            var all_totals = (Number(totals) + Number(other_costs)) - discounts;
            var remains = all_totals - payables;

            $('#other_cost').html(other_costs+' tk');
            $('#discount').html(discounts+ ' tk');
            $('#all_total').html(all_totals+ ' tk');
            $('#remain_amount').html(remains+ ' tk');

            $('#other_in, #discount_in, #payable').on('keyup keypress keydown change', function(e){
                var other_cost = $('#other_in').val();
                var discount = $('#discount_in').val();
                var payable = $('#payable').val();
                var total = $('#total_amount').data('amount');

                var all_total = (Number(total) + Number(other_cost)) - discount;
                var remain = all_total - payable;

                $('#other_cost').html(other_cost+' tk');
                $('#discount').html(discount+ ' tk');
                $('#all_total').html(all_total+ ' tk');
                $('#remain_amount').html(remain+ ' tk');
            });

        }

        $(function () {
            $('#payable').dblclick(function(e){

                var other_costs = $('#other_in').val();
                var discounts = $('#discount_in').val();
                var totals = $('#total_amount').data('amount');

                var all_totals = (Number(totals) + Number(other_costs)) - discounts;

                $(this).val(all_totals);

                input_amount_change();

            });
        });


    </script>
@endsection
