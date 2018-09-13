<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Récupère l'utilisateur du produit
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
