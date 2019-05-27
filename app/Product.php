<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'productID';
    protected $fillable = [
        'name', 'sku', 'category', 'description', 'units ', ' price ', ' buy_price', 'stock', 'limits'
    ];

    public function getSkuAttribute($value) //When View column
    {
        return strtoupper($value);
    }

    /*public function setSkuAttribute($value) //When Insert column
    {
        $this->attributes['sku'] = strtolower($value);
    }*/


}
