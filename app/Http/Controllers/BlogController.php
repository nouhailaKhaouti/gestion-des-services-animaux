<?php

namespace App\Http\Controllers;
use App\Models\article;
use Illuminate\Http\Request;
use App\Models\Comments_article;
class BlogController extends Controller
{
    public function index()
    {
      $articles = article::all();
      return view('admin.article', compact('articles'));
    }
    public function show($slug)
    {
      $article = article::where('slug', $slug)->first();
      $comments = Comments_article::where('on_article', 'LIKE', '%' . $article->id . '%');
      return view('admin.show_article',compact('article','comments'));
    }
}
