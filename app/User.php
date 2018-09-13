<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password', 'is_active', 'phone', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Récupère le role de l'utilisateur
     */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    /**
     * Récupère l'addresse de l'utilisateur
     */
    public function address()
    {
        return $this->hasOne('App\Address');
    }

    /**
     * Récupère les commandes de l'utilisateur
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function car()
    {
        return $this->hasMany('App\Car');
    }

    /**
     * Affiche le prénom et le nom de famille
     */
    public function fullname()
    {
        return "{$this->firstname} {$this->lastname}";
    }
}
