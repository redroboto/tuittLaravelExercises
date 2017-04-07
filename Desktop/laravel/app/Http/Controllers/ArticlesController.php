<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Article;
use Session;

class ArticlesController extends Controller
{
    function showArticles(){
    	$articles = Article::all();
    	return view('article/display', compact('articles'));
    }
    function showArticle($id){
    	$article = Article::find($id);
    	return view('article/display_article', compact('article'));
    }
    function createArticle(){
    	return view('article/create');
    }
    //stores items in input fields inside request object
    function saveArticle(Request $request){

    	//create new article
    	$new_article = new Article();
    	//store data from form fields in new article object
    	$new_article->title = $request->title;
    	$new_article->content = $request->content;
    	//save new article object in database
    	$new_article->save();

    	//gets remaining data from database
    	//$articles = Article::all();

    	//create flash message
    	Session::flash('message','Article Successfully Created');

    	return redirect('articles');
    }

    function deleteArticle($id){
    	
    	//stores id of article selected for deletion 
    	$article_to_be_deleted = Article::find($id);
    	//deletes from database
    	$article_to_be_deleted->delete();
    	//gets remaining data from database
    	//$articles = Article::all();

    	Session::flash('message','Article Successfully Deleted');

    	return redirect('articles');
    }

    function showEditArticle($id){
    	$article_to_be_edited = Article::find($id);

    	return view('article/edit',compact('article_to_be_edited'));
    }

    function editArticle(Request $request, $id){
    	$article_to_be_edited = Article::find($id);

    	$article_to_be_edited->title = $request->title;
    	$article_to_be_edited->content  = $request->content;
    	$article_to_be_edited -> save();

    	//$articles = Article::all();

    	Session::flash('message','Article Successfully Edited');

    	return redirect('articles');
    }


}
