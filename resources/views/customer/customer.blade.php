@extends('layouts.master')
@extends('box.customer.customer')

@section('title')
    Customer
@endsection

@section('page')
    All Customer
@endsection 
 
@section('content')
    <div class="row margin-bottom">
        <div class="col-md-6">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add new customer</button>
        </div>
        <div class="col-md-6"></div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{$row->sn}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->contact}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->address}}</td>
                                <td class="text-right">
                                    <button class="btn btn-xs btn-success ediBtn"
                                            data-id="{{$row->customerID}}"
                                            data-sn="{{$row->sn}}"
                                            data-name="{{$row->name}}"
                                            data-contact="{{$row->contact}}"
                                            data-email="{{$row->email}}"
                                            data-address="{{$row->address}}"
                                            data-toggle="modal" data-target="#ediModal"><i class="fa fa-pencil"></i></button>
                                    <a href="{{route('customer-del',['id' => $row->customerID])}}" onclick="return confirm('Are you sure to delete?');" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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
    <script type="text/javascript">
        $(function () {
            $('.ediBtn').click(function () {
                var id = $(this).data('id');
                var sn = $(this).data('sn');
                var name = $(this).data('name');
                var contact = $(this).data('contact');
                var email = $(this).data('email');
                var address = $(this).data('address');

                $('#ediModal [name=id]').val(id);
                $('#ediModal [name=sn]').val(sn);
                $('#ediModal [name=name]').val(name);
                $('#ediModal [name=contact]').val(contact);
                $('#ediModal [name=email]').val(email);
                $('#ediModal [name=address]').val(address);
            });
        });

        $(function () {
            $('#example2').DataTable();
        });


    </script>
@endsection








