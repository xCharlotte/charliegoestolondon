<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use Image;
use \Input as Input;

class PostController extends Controller
{

  public function index(Post $post) {
    $posts = Post::latest()->paginate(5);
    return view('posts.index',compact('posts',$posts));
  }

  public function show(Post $post) {
    return view('posts.show',compact('post'));
  }

  public function create() {
    return view('posts.create');
  }

  public function store (Request $request, User $user) {

    $title = $request->title;
    $body = $request->body;
    $image = $request->image;
    $user_id = auth()->user()->id;
    $post = new Post();

    $request->validate([
         'title' => 'required|min:3',
         'body' => 'required',
     ]);

    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $filename = time() . '.' . $image->getClientOriginalName();
      $location = public_path('images/' . $filename);
      Image::make($image)->resize(800, 400)->save($location);

      $post->image = $filename; # Set it in the database
    }
    $post->save();

    return view('posts.show',compact('post'));
  }

  public function edit(Post $post) {
    $post = Post::find($post);
    return view('posts.edit',compact('post'));
  }

  public function update(Request $request, Post $post) {

    $request->validate([
         'title' => 'required|min:3',
         'body' => 'required',
     ]);

     $post->title = $request->title;
     $post->body = $request->body;
     $post->save();
     $request->session()->flash('message', 'Succesvol opgeslagen!');
     return view('posts.show');
  }

  public function destroy($id) {
    $post = Post::find($id)->delete();
    return redirect('/posts')->with('success','het is successvol verwijderd');
  }
}
