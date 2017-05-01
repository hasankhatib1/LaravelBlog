<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $table = "articles" ;

    public function commentaires() // = chaque article a plusieurs commentaires
    {
    	return $this->hasMany('App\Commentaire', 'id_article') ;
    }

    public function user() // = chaque article apartient à un user
    {
    	return $this->belongsTo('App\User') ;
    }

}
