<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    // 	

    protected $table = 'commentaire';

    protected $fillable = ['contenu', 'jaime', 'utilisateur_id'];
    
    public function utilisateur()
    {
        return $this->belongsTo('App\Utilisateur');
    }
    
    public function actualite()
    {
        return $this->belongsTo('App\Actualite');
    }
}
