@extends('layouts.print')

@section('content')
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> AdminLTE, Inc.
                    <small class="pull-right">Date: {{date('d/m/Y')}}</small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                From
                <address>
                    <strong>Admin, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                To
                <address>
                    <strong>{{$table->customer['name']}}</strong><br>
                    {{$table->customer['address']}}<br>
                    Phone: {{$table->customer['contact']}}<br>
                    Email: {{$table->customer['email']}}
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Invoice #{{$table->invoiceID}}</b><br>
                <br>
                <b>Invoice Date:</b> {{$table->created_at}}<br>
                <b>Payment Due:</b> 2/22/2014<br>
                <b>Account:</b> 968-34567
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Description</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Sub Total</th>
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
                        </tr>

                        @php
                            $sub_total += ($row->price*$row->qty);
                        @endphp

                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
                <p class="lead">Payment Methods:</p>
                <img src="{{asset('public/dist/img/credit/visa.png')}}" alt="Visa">
                <img src="{{asset('public/dist/img/credit/mastercard.png')}}" alt="Mastercard">
                <img src="{{asset('public/dist/img/credit/american-express.png')}}" alt="American Express">
                <img src="{{asset('public/dist/img/credit/paypal2.png')}}" alt="Paypal">

                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr
                    jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                </p>
            </div>
            <!-- /.col -->
            <div class="col-xs-6">
                <p class="lead">Amount Due {{(($sub_total + $table->otherCost) - $table->discount) - $table->payment($table->invoiceID)}}</p>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>{{$sub_total}}</td>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <td>{{$table->discount}}</td>
                        </tr>
                        <tr>
                            <th>Shipping:</th>
                            <td>{{$table->otherCost}}</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>{{$sub_total + $table->otherCost - $table->discount}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
