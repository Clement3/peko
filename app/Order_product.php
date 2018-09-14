<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    public function product(){
        return $this->belongsTo('App\Product');
    }
}
