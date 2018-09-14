<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'created_at', 'update_at'
    ];
}
