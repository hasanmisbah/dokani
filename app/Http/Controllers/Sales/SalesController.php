<?php

namespace App\Http\Controllers\Sales;

use App\Customer;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class SalesController extends Controller
{
    public function index(){
        $customer = Customer::orderBy('name', 'ASC')->get();
        return view('sales.sales')->with(['customer' => $customer]);
    }

    public function search_product(Request $request){
        $table = Product::where('sku', 'like',  $request->search.'%')->limit(10)->get();

        return response()->json($table);
    }

    public function save_temp(Request $request){
        $table = Product::find($request->id);

        $id = $table->productID;
        $name = $table->name;
        $price = $table->price;
        $units = $table->units;
        $qty = 1;

        if ($request->session()->has('temp_item')) {
            $old_data = session('temp_item');

            foreach ($old_data as $val){

                foreach ($val as $k => $row){
                    if($k == $id){
                        $qty = $row[3] + 1;
                        $queues[$k] = [$id, $name, $price, $qty, $units];
                    }else{
                        $queues[$k] = [$k, $row[1], $row[2], $row[3], $row[4]];
                    }
                }

                $queues[$id] = [$id, $name, $price, $qty, $units];

                $data[] = $queues;
            }

            $request->session()->put('temp_item', $data);
        }else{
            $data = [];
            $queues[$id] = [$id, $name, $price, $qty, $units];
            $data[] = $queues;

            $request->session()->put('temp_item', $data);
        }

        return 1;
    }


    public function get_temp_data(){
        $value = session('temp_item');

        return response()->json($value);
    }


    public function temp_del(Request $request){
        $data = session('temp_item')[0];

        if(Arr::has($data, $request->id))
            Arr::forget($data, $request->id);

        $new_arr[] = $data;

        $request->session()->put('temp_item', $new_arr);

        return 1;
    }


    public function update_tmp_qty(Request $request){
        $data = session('temp_item')[0];

        if(Arr::has($data, $request->id))

            Arr::set($data, "{$request->id}.3", $request->qty);
        $new_arr[] = $data;

        $request->session()->put('temp_item', $new_arr);

        return 1;
    }

    public function update_tmp_price(Request $request){
        $data = session('temp_item')[0];

        if(Arr::has($data, $request->id))

            Arr::set($data, "{$request->id}.2", $request->price);
            $new_arr[] = $data;

        $request->session()->put('temp_item', $new_arr);

        return 1;
    }


}
