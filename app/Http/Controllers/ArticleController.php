<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        return view('ajoutArticle',[
            'categories'=> Categorie::all()
        ]);
    }public function insert(Request $req){
        $art=new Article();
        $art->titre=$req->input('titre');
        $art->categorie=$req->input('categorie');
        $art->contenue=$req->input('contenu');
        $art->resume=$req->input('resume');
        info($art);
        $art->save();
        return $this->index();
    }
    public function liste(){
        return view('listeArticle',[
            'listes'=> Article::all()
        ]);
    }
    public function fiche($id){
        return view('ficheArticle',[
            'article'=>Article::find($id)
        ]);
    }
}
