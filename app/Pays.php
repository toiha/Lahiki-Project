<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    protected $table = 'pays';

    protected $fillable = ['nom'];

    public function pays()
    {
        return $this->hasMany('App\Departement');
    }
}
