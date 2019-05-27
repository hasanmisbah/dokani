<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiptItem extends Model
{
    protected $table = 'receipt_item';
    protected $primaryKey = 'receiptItemID';
    protected $fillable = [
        'receiptID', 'productID', 'price', 'qty', 'units'
    ];
}
