@extends('layouts.master')
@extends('box.invoice.edit_invoice')

@section('title')
    Invoice Edit
@endsection


@section('page')
    Invoice Edit
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Sub Total</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @php
                            $sub_total = 0;
                            $items = $table->item()->get();
                        @endphp

                        @foreach($items as $row)
                            <tr>
                                <td>{{$row->product['name']}}</td>
                                <td>{{$row->product['description']}}</td>
                                <td>{{$row->qty}}</td>
                                <td>{{$row->price}}</td>
                                <td>{{($row->price*$row->qty)}}</td>
                                <td>
                                    <button class="btn btn-xs btn-success ediBtn" data-itemid="{{$row->invoiceItemID}}" data-price="{{$row->price}}"  data-qty="{{$row->qty}}" data-name="{{$row->product['name']}}" data-toggle="modal" data-target="#ediModal"><i class="fa fa-pencil"></i></button>
                                    <a href="{{route('del_invoice_item',['id' => $row->invoiceItemID])}}" onclick="return confirm('Are you sure to delete?');" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>

                                </td>
                            </tr>

                            @php
                                $sub_total += ($row->price*$row->qty);
                            @endphp

                        @endforeach

                        </tbody>

                        <tfoot>
                        <tr>
                            <th colspan="4">Total</th>
                            <th>{{$sub_total}}</th>
                            <th></th>
                        </tr>
                        </tfoot>

                    </table>



                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box-body">
                    <p><b>Other Cost:</b> {{$table->otherCost}}</p>
                    <p><b>Discount:</b> {{$table->discount}}</p>
                </div>
                <div class="box-footer">
                    <button type="button" class="btn btn-success ediOC" data-discount="{{$table->discount}}" data-oc="{{$table->otherCost}}" data-id="{{$table->invoiceID}}"data-toggle="modal" data-target="#ediDiscount">Edit</button>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="box">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @php
                        $pay_amount = 0;
                    @endphp
                    @foreach($payment as $row)
                        <tr>
                            <td>{{$row->created_at}}</td>
                            <td>{{$row->cashIN}}</td>
                            <td>
                                <button class="btn btn-xs btn-success ediPay" data-id="{{$row->cashbookID}}" data-pay="{{$row->cashIN}}" data-toggle="modal" data-target="#ediPayment"><i class="fa fa-pencil"></i></button>
                                <a href="{{route('del_pay',['id' => $row->cashbookID])}}" onclick="return confirm('Are you sure to delete?');" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                        @php
                            $pay_amount += $row->cashIN;
                        @endphp

                    @endforeach

                    </tbody>

                    <tfoot>
                    <tr>
                        <th>Total</th>
                        <th>{{$pay_amount}}</th>
                        <th></th>
                    </tr>
                    </tfoot>

                </table>

                <div class="text-right">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addPayment">Add Payment</button>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <b>Total:</b> {{$sub_total +  $table->otherCost - $table->discount}}
                    </div>
                    <div class="col-md-6"><b>Due:</b> {{($sub_total +  $table->otherCost - $table->discount) - $pay_amount}}</div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script>

        $(function () {
            $('.ediBtn').click(function () {
                var id = $(this).data('itemid');
                var price = $(this).data('price');
                var qty = $(this).data('qty');
                var name = $(this).data('name');


                $('#ediModal [name=id]').val(id);
                $('#ediModal [name=price]').val(price);
                $('#ediModal [name=qty]').val(qty);
                $('#ediModal #poductName').html(name);

            });


            $('.ediOC').click(function () {
                var id = $(this).data('id');
                var otherCost = $(this).data('oc');
                var discount = $(this).data('discount');


                $('#ediDiscount [name=id]').val(id);
                $('#ediDiscount [name=otherCost]').val(otherCost);
                $('#ediDiscount [name=discount]').val(discount);

            });


            $('.ediPay').click(function () {
                var id = $(this).data('id');
                var pay = $(this).data('pay');


                $('#ediPayment [name=id]').val(id);
                $('#ediPayment [name=cashIN]').val(pay);

            });
        });


    </script>
@endsection

@section('style')


@endsection
