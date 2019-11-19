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
        return redirect()->route('show_invoice',['id' => $invoiceID]);
    }

    public function invoice_list(){
        $invoice = Invoice::orderBy('invoiceID', 'DESC')->get();
        return view('sales.invoice-list')->with(['invoice' => $invoice]);
    }

    public function show_invoice($id){
        $table = Invoice::find($id);
        return view('print.invoice.invoice')->with(['table' => $table]);
    }


    //All Edit
    public function show_edit($id){
        $table = Invoice::find($id);
        $cashbook =Cashbook::where('sector', 'Invoice')->where('ref', $id)->get();
        return view('sales.edit_invoice')->with(['table' => $table, 'payment' => $cashbook]);
    }


    public function edit_item(Request $request){
        if($request->qty > 0){
            $table = InvoiceItem::find($request->id);
            $table->price = $request->price;
            $table->qty = $request->qty;
            $table->save();

            return redirect()->back()->with(['message' => 'Successfully Updated']);
        }else{
            return redirect()->back()->with(['message' => 'Operation not successful. Please delete item.']);
        }

    }

    public function del_item($id){
        $table = InvoiceItem::find($id);
        $table->delete();

        return redirect()->back()->with(['message' => 'Successfully Deleted']);
    }

    public function edit_oc_discount(Request $request){

            $table = Invoice::find($request->id);
            $table->otherCost = $request->otherCost;
            $table->discount = $request->discount;
            $table->save();

            return redirect()->back()->with(['message' => 'Successfully Updated']);

    }

    public function edit_pay(Request $request){

        $table = Cashbook::find($request->id);
        $table->cashIN = $request->cashIN;
        $table->save();

        return redirect()->back()->with(['message' => 'Successfully Updated']);

    }


    public function del_pay($id){

        $table = Cashbook::find($id);
        $table->delete();

        return redirect()->back()->with(['message' => 'Successfully Delete']);

    }

    public function new_pay(Request $request){

        $cashbook = new Cashbook();
        $cashbook->cashIN = $request->cashIN;
        $cashbook->sector = 'Invoice';
        $cashbook->ref = $request->ref;
        $cashbook->save();

        return redirect()->back()->with(['message' => 'Successfully Added']);

    }


//All Edit


    public function del($id){
        DB::beginTransaction();
        try {

            //Add Payment in cashbook
            $cashbook = Cashbook::where('sector', 'Invoice')->where('ref', $id)->delete();
            //Add Payment in cashbook

            $table = Invoice::find($id);
            $table->delete();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
        return redirect()->back()->with(['message' => 'Successfully Delete']);
    }

}
