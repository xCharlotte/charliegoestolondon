<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Image;
use \Input as Input;

class PostController extends Controller
{

  public function _construct() {
    $this->middleware('auth');
  }

  public function index(Post $post) {
    $posts = Post::latest()->paginate(5);
    return view('posts.index')->with(['posts'=>$posts]);
  }

  public function show(Post $post) {
    return view('posts.show',compact('post'));
  }

  public function create() {
    return view('posts.create');
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

    return view('posts.show',compact('post'));
  }

  public function edit($id) {
    $post = Post::find($id);
    return view('posts.edit',compact('post'));
  }

  public function update(Request $request, $id) {
    $this->validate($request, [
      'title' => 'required',
      'body' => 'required',
    ]);

    $post = Post::find($id)->update($request->all());
    return redirect()->route('posts.index')->with('success','het is successvol opgeslagen');
  }

  public function destroy($id) {
    $post = Post::find($id)->delete();
    return redirect('/posts')->with('success','het is successvol verwijderd');
  }
}
