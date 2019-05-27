<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'supplierID';
    protected $fillable = [
        'sn', 'name', 'contact', 'email', 'address'
    ];
}
