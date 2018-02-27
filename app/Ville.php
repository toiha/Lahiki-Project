<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    protected $table = 'ville';

    protected $fillable = ['nom','departement_id'];

    
    public function departement()
    {
        return $this->belongsTo('App\Departement');
    }
    
    public function utilisateurs()
    {
        return $this->hasMany('App\Utilisateur');
    }

    public function accueillants()
    {
        return $this->hasMany('App\Utilisateur');
    }
    
    public function rencontres()
    {
        return $this->hasMany('App\Rencontre');
    }
}
