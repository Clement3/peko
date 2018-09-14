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
        'variety_id', 'price_filter_id', 'title', 'quantity',
        'slug', 'price', 'body', 'picture', 'price_kilo'
    ];

    public function priceFilter()
    {
        return $this->belongsTo('App\PriceFilter');
    }

    public function variety()
    {
        return $this->belongsTo('App\Variety');
    }

    public function selectedFilter($filter_id)
    {
        if ($this->price_filter_id === $filter_id) {
            return "selected";
        }
    }

    public function selectedVariety($variety_id)
    {
        if ($this->variety_id === $variety_id) {
            return "selected";
        }
    }
}
