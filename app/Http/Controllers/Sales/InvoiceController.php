<?php

namespace App\Http\Controllers\Sales;

use App\Cashbook;
use App\Invoice;
use App\InvoiceItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index(){
        return view('sales.invoice');
    }

    public function new_invoice(Request $request){
        $data = session('temp_item')[0];

        DB::beginTransaction();
        try {
            //Create new Invoice
            $table = new Invoice();
            $table->customerID = $request->customerID;
            $table->discount = $request->discount;
            $table->otherCost = $request->otherCost;
            $table->save();
            //Create new Invoice
            $invoiceID = $table->invoiceID;

            //Add Invoice Item
            foreach ($data as $row){
                $item = new InvoiceItem();
                $item->invoiceID = $invoiceID;
                $item->productID = $row[0];
                $item->price = $row[2];
                $item->qty = $row[3];
                $item->units = $row[4];
                $item->save();
            }
            //Add Invoice Item

            //Add Payment in cashbook
            $cashbook = new Cashbook();
            $cashbook->cashIN = $request->cashIN;
            $cashbook->sector = 'Invoice';
            $cashbook->ref = $invoiceID;
            $cashbook->save();
            //Add Payment in cashbook

            $request->session()->forget('temp_item');

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

        return redirect()->back()->with(['message' => 'Successfully Invoice Created']);

    }
}
