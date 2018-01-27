<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
  public function index(Post $post) {
    $posts = Post::latest()->paginate(5);
    return view('blog.index')->with(['posts'=>$posts]);
  }

  public function show(Post $post) {
    return view('blog.show',compact('post'));
  }
}
