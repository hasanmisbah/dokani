<?php

namespace App\Http\Controllers\Purchase;

use App\Supplier;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class PurchaseController extends Controller
{
    public function index(){
        $supplier = Supplier::orderBy('name', 'ASC')->get();
        return view('purchase.purchase')->with(['supplier' => $supplier]);
    }



}
