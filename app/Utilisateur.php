<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $table = 'utilisateur';

    protected $fillable = ['ville_id','nom','prenom','email','login',
    	'password','avatar','adresse','tel_fixe','tel_portable','is_accueilleur', 'apropos', 'nb_vues','etat'];

      	    
    public function ville()
    {
        return $this->belongsTo('App\Ville');
    }

   

    public function universite()
    {
        return $this->belongsTo('App\Universite');
    }

    public function lycee()
    {
        return $this->belongsTo('App\Lycee');
    }

    public function accueillants()
    {
        // AS !; --
         return $this->hasMany('App\Rencontre', 'acceuillant_id');
    }

    public function accueillis()
    {
         return $this->hasMany('App\Rencontre', 'accueilli_id');
    }

    public function temoignages()
    {
         return $this->hasMany('App\Temoignage');
    }

    public function commentaires()
    {
         return $this->hasMany('App\Commentaire');
    }

    public function rencontres()
    {
        
        return $this->accueillants()->union($this->accueillis()->toBase());       

    }
}
