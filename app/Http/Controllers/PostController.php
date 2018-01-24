<?php

namespace charliegoestolondon\Http\Controllers;

use Illuminate\Http\Request;
use charliegoestolondon\Post;
use charliegoestolondon\User;
use Image;
use \Input as Input;

class PostController extends Controller
{

  public function _construct() {
    $this->middleware('auth', ['only' => 'create', 'edit', 'store', 'destroy']);
  }

  public function index(Post $post) {
    $posts = $post::latest()->get();
    return view('post.index')->with(['posts'=>$posts]);
  }

  public function show(Post $post) {
    return view('post.show')->with(['posts'=>$post]);
  }

  public function create() {
    return view('post.create');
  }

  public function store (Request $request) {
    $post = Post::create([
      'user_id' =>auth()->id(),
      'title'   => $request->title,
      'body'    => $request->body
    ]);

    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $filename = time() . '.' . $image->getClientOriginalName();
      $location = public_path('images/' . $filename);
      Image::make($image)->resize(800, 400)->save($location);

      $post->image = $filename; # Set it in the database
    }

    $post->save();

    return view('post.show')->with(['posts'=>$post]);
  }
}
