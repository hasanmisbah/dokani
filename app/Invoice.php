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
}
