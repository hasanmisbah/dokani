@section('box')

    <div class="modal fade" id="ediModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit <span id="poductName"></span></h4>
                </div>
                <form action="{{route('edit_invoice_item')}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id">
                    <div class="modal-body">

                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">Price</span>
                            <input type="number" name="price" class="form-control" placeholder="Price" step="any" min="0" required>
                        </div>

                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">Quantity</span>
                            <input type="number" name="qty" class="form-control" placeholder="Quantity" step="any" min="0" required>
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

    <div class="modal fade" id="ediDiscount">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Discount & Other Cost</h4>
                </div>
                <form action="{{route('edit_invoice_discount')}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id">
                    <div class="modal-body">

                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">Other Cost</span>
                            <input type="number" name="otherCost" class="form-control" placeholder="Other Cost" step="any" min="0" required>
                        </div>

                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">Discount</span>
                            <input type="number" name="discount" class="form-control" placeholder="Discount" step="any" min="0" required>
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

    <div class="modal fade" id="ediPayment">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Payment</h4>
                </div>
                <form action="{{route('edit_pay')}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id">
                    <div class="modal-body">

                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">Payment Amount</span>
                            <input type="number" name="cashIN" class="form-control" placeholder="Payment Amount" step="any" min="0" required>
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


    <div class="modal fade" id="addPayment">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Payment</h4>
                </div>
                <form action="{{route('new_pay')}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <input type="hidden" name="ref" value="{{$table->invoiceID}}">
                    <div class="modal-body">

                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">Payment Amount</span>
                            <input type="number" name="cashIN" class="form-control" placeholder="Payment Amount" step="any" min="0" required>
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



@endsection