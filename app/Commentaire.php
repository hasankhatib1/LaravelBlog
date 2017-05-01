<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
	public $table = "commentaires" ;

     public function article() // = chaque commentaire apartient à un article
    {
    	return $this->belongsTo('App\Article') ;
    }
}
