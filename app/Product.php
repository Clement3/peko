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
        'variety_id', 'price_filter_id', 'title', 'slug', 'price', 'body', 'is_active', 'picture'
    ];

    public function priceFilter()
    {
        return $this->belongsTo('App\Price_filter');
    }

    public function variety()
    {
        return $this->belongsTo('App\Variety');
    }
}
