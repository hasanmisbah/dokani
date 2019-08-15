@extends('layouts.master')
@extends('box.product.product')

@section('title')
    Product
@endsection

@section('page')
    All Products
@endsection 
 
@section('content')
    <div class="row margin-bottom">
        <div class="col-md-6">
            <button id="topModal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add new Product</button>
        </div>
        <div class="col-md-6">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Units</th>
                            <th>Price</th>
                            <th>Buy_Price</th>
                            <th>Stock</th>
                            <th>Limits</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->sku}}</td>
                                <td>{{$row->category}}</td>
                                <td>{{$row->description}}</td>
                                <td>{{$row->units}}</td>
                                <td>{{$row->price}}</td>
                                <td>{{$row->buy_price}}</td>
                                <td>{{$row->stock}}</td>
                                <td>{{$row->limits}}</td>
                                <td class="text-right">
                                    <button class="btn btn-xs btn-success ediBtn"
                                            data-id="{{$row->productID}}"
                                            data-name="{{$row->name}}"
                                            data-sku="{{$row->sku}}"
                                            data-category="{{$row->category}}"  
                                            data-description="{{$row->description}}"
                                            data-units="{{$row->units}}"
                                            data-price="{{$row->price}}"
                                            data-buy_price="{{$row->buy_price}}"
                                            data-limits="{{$row->limits}}"
                                            data-toggle="modal" data-target="#ediModal"><i class="fa fa-pencil"></i></button>
                                    <a href="{{route('product-del',['id' => $row->productID])}}" onclick="return confirm('Are you sure to delete?');" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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
    @if ($errors->any())
        <script type="text/javascript">

            $(function () {

                //$('#myModal').modal('show');
              //  $('#topModal').trigger('click');


            });

        </script>
    @endif
    <script type="text/javascript">
        $(function () {
            $('.ediBtn').click(function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var sku = $(this).data('sku');
                var category = $(this).data('category');
                var description = $(this).data('description');
                var units = $(this).data('units');
                var price = $(this).data('price');
                var buy_price = $(this).data('buy_price');
                var stock = $(this).data('stock');
                var limits = $(this).data('limits');
                
                $('#ediModal [name=id]').val(id);
                $('#ediModal [name=name]').val(name);
                $('#ediModal [name=sku]').val(sku);
                $('#ediModal [name=category]').val(category);
                $('#ediModal [name=description]').val(description);
                $('#ediModal [name=units]').val(units);
                $('#ediModal [name=price]').val(price);
                $('#ediModal [name=buy_price]').val(buy_price);
                $('#ediModal [name=stock]').val(stock);
                $('#ediModal [name=limits]').val(limits);
            });
        });



        $(function () {
            $('#example2').DataTable();
        });


    </script>
@endsection

