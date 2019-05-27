<?php

namespace App\Http\Controllers\Customer;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index(){
        $table = Customer::all();
        return view('customer.customer')->with(['table' => $table]);
    }


    public function save(Request $request){
        $table = new Customer();
        $table->sn = $request->sn;
        $table->name = $request->name;
        $table->contact = $request->contact;
        $table->email = $request->email;
        $table->address = $request->address;
        $table->save();

        return redirect()->back()->with(['message' => 'Successfully Inserted']);

    }

    public function edit(Request $request){
        $table = Customer::find($request->id);
        $table->sn = $request->sn;
        $table->name = $request->name;
        $table->contact = $request->contact;
        $table->email = $request->email;
        $table->address = $request->address;
        $table->save();

        return redirect()->back()->with(['message' => 'Successfully Updated']);

    }

    public function del($id){
        $table = Customer::find($id);
        $table->delete();
        return redirect()->back()->with(['message' => 'Successfully Deleted']);
    }


}
