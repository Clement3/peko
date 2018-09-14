<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $fillable = [
        'variety_id', 'recipe', 'picture', 'name', 'body'
    ];

    public function variety()
    {
        return $this->belongsTo('App\Variety');
    }
}
