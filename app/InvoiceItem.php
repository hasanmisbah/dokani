<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $table = 'invoice_item';
    protected $primaryKey = 'invoiceItemID';
    protected $fillable = [
        'invoiceID', 'productID', 'price', 'qty', 'units'
    ];
}
