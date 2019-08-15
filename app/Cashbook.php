<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashbook extends Model
{
    protected $table = 'cashbook';
    protected $primaryKey = 'cashbookID';
    protected $fillable = [
        'cashIN', 'cashOUT', 'trType', 'sector', 'ref', 'description'
    ];


}
