<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
	// 	

    protected $table = 'actualite';

    protected $fillable = ['titre','resume', 'contenu', 'date_publication', 'date_expiration', 'is_accueil', 'utilisateur_id'];

    
    public function utilisateur()
    {
        return $this->belongsTo('App\Utilisateur');
    }
    
    public function commentaires()
    {
        return $this->hasMany('App\Commentaire');
    }

   


}
