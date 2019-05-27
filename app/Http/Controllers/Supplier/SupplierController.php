<?php

namespace App\Http\Controllers\Supplier;

use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{
    public function index(){
    	$table = Supplier::all();
    	return view('supplier.supplier')->with(['table' => $table]);
    }


     public function save(Request $request){
        $table = new Supplier();
        $table->sn = $request->sn;
        $table->name = $request->name;
        $table->contact = $request->contact;
        $table->email = $request->email;
        $table->address = $request->address;
        $table->save();

        return redirect()->back()->with(['message' => 'Successfully Inserted']);

    }


    public function edit(Request $request){
        $table = Supplier::find($request->id);
        $table->sn = $request->sn;
        $table->name = $request->name;
        $table->contact = $request->contact;
        $table->email = $request->email;
        $table->address = $request->address;
        $table->save();

        return redirect()->back()->with(['message' => 'Successfully Updated']);

    }


    public function del($id){
        $table = Supplier::find($id);
        $table->delete();
        return redirect()->back()->with(['message' => 'Successfully Deleted']);
    }
}
