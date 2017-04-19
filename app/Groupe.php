<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{

    protected $fillable = ['libelle', 'statut', 'user_id'];

    public function user(){

        return $this->belongsTo('App\User');
    }

    public function contacts()
    {
        return $this->belongsToMany('App\Contact');
    }
}
