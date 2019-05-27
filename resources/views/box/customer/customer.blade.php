@section('box')
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add New Customer</h4>
                </div>
                <form action="{{route('customer-save')}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <div class="modal-body">
                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">S/N</span>
                            <input type="text" name="sn" class="form-control" placeholder="Serial Number">
                        </div>

                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">Name</span>
                            <input type="text" name="name" class="form-control" placeholder="Customer Name" required>
                        </div>

                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">Contact</span>
                            <input type="text" name="contact" class="form-control" placeholder="Contact">
                        </div>

                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">Email</span>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>

                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">Address</span>
                            <input type="text" name="address" class="form-control" placeholder="Address">
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
                    <h4 class="modal-title">Edit Customer</h4>
                </div>
                <form action="{{route('customer-edit')}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">S/N</span>
                            <input type="text" name="sn" class="form-control" placeholder="Serial Number">
                        </div>

                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">Name</span>
                            <input type="text" name="name" class="form-control" placeholder="Customer Name" required>
                        </div>

                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">Contact</span>
                            <input type="text" name="contact" class="form-control" placeholder="Contact">
                        </div>

                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">Email</span>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>

                        <div class="input-group margin-bottom">
                            <span class="input-group-addon">Address</span>
                            <input type="text" name="address" class="form-control" placeholder="Address">
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