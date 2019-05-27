<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $table = 'receipt';
    protected $primaryKey = 'receiptID';
    protected $fillable = [
        'sn', 'supplierID', 'discount', 'otherCost'
    ];
}
