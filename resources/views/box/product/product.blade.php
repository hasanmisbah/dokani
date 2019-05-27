@section('box')
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add New Product</h4>
                </div>
                <form action="{{route('product-save')}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <div class="modal-body">
                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">Name</span>
                            <input type="text" name="name" class="form-control" placeholder="Name" required>
                        </div>

                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">SKU</span>
                            <input type="text" name="sku" class="form-control" placeholder="SKU">
                        </div>

                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">Category</span>
                            <input type="text" name="category" class="form-control" placeholder="Category">
                        </div>

                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">Description</span>
                            <input type="text" name="description" class="form-control" placeholder="Description">
                        </div>

                         <div class="input-group margin-bottom">
                            <span class="input-group-addon">Units</span>
                            <input type="text" name="units" class="form-control" placeholder="Units" value="pcs">
                        </div>

                         <div class="input-group margin-bottom">
                            <span class="input-group-addon">Price</span>
                            <input type="number" name="price" class="form-control" step="any" min="0" value="0" placeholder="Price" required>
                        </div>

                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">Buy Price</span>
                            <input type="number" name="buy_price" class="form-control" step="any" min="0" value="0" placeholder="Buy Price" required>
                        </div>


                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">Limits</span>
                            <input type="number" name="limits" step="any" min="0" value="0" class="form-control" placeholder="Limits">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <div class="modal fade" id="ediModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Product</h4>
                </div>
                <form action="{{route('product-edit')}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id">
     
                    <div class="modal-body">
                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">Name</span>
                            <input type="text" name="name" class="form-control" placeholder="Name" required>
                        </div>

                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">SKU</span>
                            <input type="text" name="sku" class="form-control" placeholder="SKU">
                        </div>

                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">Category</span>
                            <input type="text" name="category" class="form-control" placeholder="Category">
                        </div>

                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">Description</span>
                            <input type="text" name="description" class="form-control" placeholder="Description">
                        </div>

                         <div class="input-group margin-bottom">
                            <span class="input-group-addon">Units</span>
                            <input type="text" name="units" class="form-control" placeholder="Units" required>
                        </div>

                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">Price</span>
                            <input type="number" name="price" class="form-control" step="any" min="0" value="0" placeholder="Price" required>
                        </div>

                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">Buy Price</span>
                            <input type="number" name="buy_price" class="form-control" step="any" min="0" value="0" placeholder="Buy Price" required>
                        </div>


                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">Limits</span>
                            <input type="text" name="limits" class="form-control" placeholder="Limits">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection