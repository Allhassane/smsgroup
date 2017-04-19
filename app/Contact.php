<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $fillable = ['name', 'mobile', 'statut', 'user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function groupes()
    {
        return $this->belongsToMany('App\Groupe');
    }
}
