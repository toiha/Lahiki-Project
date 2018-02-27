<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rencontre extends Model {

    protected $table = 'rencontre';

    protected $fillable = ['date_rencontre','lieu_rencontre','ville_id','accueilli_id','acceuillant_id','gps_x','gps_x','commentaire','is_accueilli','note'];

    public function temoignages()
    {
         return $this->hasMany('App\Temoignage');
    }

     public function accueillant()
    {
         return $this->belongsTo('App\Utilisateur', 'acceuillant_id');
    }

    public function accueilli()
    {
         return $this->belongsTo('App\Utilisateur', 'accueilli_id');
    }

    public function ville()
    {
        return $this->belongsTo('App\Ville');
    }
}
