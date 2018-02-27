<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{

    protected $table = 'departement';
    
    protected $fillable = ['nom','pays_id'];

    
    public function pays()
    {
        return $this->belongsTo('App\Pays');
    }

    public function villes()
    {
        return $this->hasMany('App\Ville');
    }
}
