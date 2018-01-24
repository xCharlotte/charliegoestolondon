<?php

namespace charliegoestolondon\Http\Controllers;

use Illuminate\Http\Request;
use charliegoestolondon\Post;
use charliegoestolondon\Comment;

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

    return redirect('/blog/'.$post->id);
  }
}
