<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User ;
use App\Article ;
use App\Commentaire ;
use Illuminate\Support\Facades\Auth ;

class gestionArticlesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth'); // cette constrecteur interdit l'accès à toutes les pages dans cette classe sans s'indetifier
    }


    function ajoutArticle(Request $request)
    {
    	if ($request->isMethod('post')) // traiter le formulaire
    	{
    		$valid = ['titre'  => 'required|min:2|',
                      'contenu'=>'required|min:10|'] ;
            $this->validate($request, $valid) ;

    		$article = new Article() ;
    		$article['titre']=$request['titre'] ;
    		$article['contenu']=$request['contenu'] ;
    		$article['id_user']=Auth::user()->id ;
    		$article->save() ;
    		return redirect('liste') ;
    	}
    	return view('gestion.ajoutArticle') ; 
    }

    public function liste()
    {
    	$articles=Article::all() ;
    	$arr = Array ('articles' => $articles) ;
    	return view('gestion.liste', $arr) ; 
    }

    public function supprimer($id) 
    {
        $suprimArt=Article::find($id);
        $suprimArt->delete() ;
        return redirect('liste') ; // rederiction vers la page (liste)
    }


    public function modifier(Request $request, $id) 
    {
        
        if ($request->isMethod('post'))
        {
        	$valid = ['titre'  => 'required|min:2|',
                      'contenu'=>'required|min:10|'] ;
            $this->validate($request, $valid) ;
            
        	$modifArt = Article::find($id) ;
            $modifArt['titre']=$request['titre'] ;
    		$modifArt['contenu']=$request['contenu'] ;
    		$modifArt['id_user']=Auth::user()->id ;
            $modifArt->save() ;
            return redirect('liste') ; // rederiction vers la page (liste)
        }
        else
        {
            $modifArt=Article::find($id);
            $arr = Array('modifArt' => $modifArt) ;
            return view('gestion.modifier', $arr) ;
        }
    }


    public function lire(Request $request, $id)
    {
    	if ($request->isMethod('post')) // traiter le formulaire
    	{
    		$comment = new Commentaire() ;
    		$comment['comment']=$request['commentaire'] ;
    		$comment['id_article']=$id ;
    		$comment->save() ;
    	}

    	$lireArticle=Article::find($id) ;
    	$arr = Array ('lireArticle' => $lireArticle) ;
    	return view('gestion.lire', $arr) ; 
    }
}
