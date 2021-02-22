<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\HTML;
use App\News;
use App\Person;

class NewsController extends Controller
{
  public function index(Request $request)
  {
    $posts = News::orderBy('updated_at', 'desc')->paginate(10);
    
    if (count($posts) > 0) {
      $headline = $posts->shift();
    } else {
      $headline = null;
    }
    
    return  view('news.index', ['headline' => $headline, 'posts' => $posts]);
  }  
}
