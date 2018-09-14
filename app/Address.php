<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'firstname', 'lastname', 'address', 'complement', 'postal_code', 'city', 'is_primary', 'phone', 'created_at', 'updated_at'
    ];
}
