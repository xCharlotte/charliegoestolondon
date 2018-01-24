<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentController extends Controller
{

  public function store(Post $post, Request $request) {

    request()->validate([
      'name' => 'required|max:50',
      'body' => 'required|max:120',
    ]);

    $post->storeComment([
      'name'=>$request->get('name'),
      'body'=>$request->get('body')
    ]);

    return redirect('/'.$post->id);
  }
}
