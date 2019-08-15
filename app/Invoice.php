<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoice';
    protected $primaryKey = 'invoiceID';
    protected $fillable = [
        'sn', 'customerID', 'discount', 'otherCost'
    ];

    public function getCreatedAtAttribute($value)
    {
        return date("d/m/Y", strtotime($value));
    }

    public function customer(){
        return $this->belongsTo('App\Customer', 'customerID');
    }

    public function item(){
        return $this->hasMany('App\InvoiceItem', 'invoiceID');
    }

    public function payment($id){
        $table = Cashbook::where('sector', 'Invoice')->where('ref', $id)->sum('cashIN');
        return $table;
    }




}
