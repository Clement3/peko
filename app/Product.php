<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'variety_id', 'price_filter_id', 'title', 'slug', 'price', 'body', 'is_active', 'picture', 'created_at', ' updated_at' 
    ];  //
}
