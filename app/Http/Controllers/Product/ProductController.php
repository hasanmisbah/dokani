<?php

namespace App\Http\Controllers\Product;

use App\Http\Requests\ProductValidate;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
     public function index(){
        $table = Product::all();
        return view('product.product')->with(['table' => $table]);
    }


     public function save(ProductValidate $request){
       //  dd($request->all());

         /*$validator = Validator::make($request->all(), [
             'name' => 'required|min:4',
             'sku' => 'required|numeric|unique:product,sku',
         ]);

         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator)->withInput();

         }*/


        $table = new Product();
        $table->name = $request->name;
        $table->sku = $request->sku;
        $table->category = $request->category;
        $table->description = $request->description;
        $table->units = $request->units;
        $table->price = $request->price;
        $table->buy_price = $request->buy_price;
        $table->limits = $request->limits;
        $table->save();

        return redirect()->back()->with(['message' => 'Successfully Inserted']);

    }


    public function edit(Request $request){
        $table = Product::find($request->id);
        $table->name = $request->name;
        $table->sku = $request->sku;
        $table->category = $request->category;
        $table->description = $request->description;
        $table->units = $request->units;
        $table->price = $request->price;
        $table->buy_price = $request->buy_price;
        $table->limits = $request->limits;
        $table->save();

        return redirect()->back()->with(['message' => 'Successfully Updated']);

    }


    public function del($id){
        $table = Product::find($id);
        $table->delete();
        return redirect()->back()->with(['message' => 'Successfully Deleted']);
    }
}
