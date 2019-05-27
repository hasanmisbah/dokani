@extends('layouts.master')
@section('title')
    Dashboard
@endsection

@section('page')
    Welcome To Dokani!!
@endsection

@section('content')
    <ul>
        @foreach($table as $row)
        <!--<li>{{$row->contact}}</li>-->
        @endforeach
    </ul>
@endsection

 
@section('script')
    <script type="text/javascript">

    </script>
@endsection 