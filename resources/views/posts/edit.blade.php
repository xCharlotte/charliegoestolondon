@extends('layouts.app')

<head>
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>
    tinymce.init({
      selector:'textarea',
      plugin: 'link code',
      menubar: false
    });
  </script>
</head>

@section('content')

  @if(count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Oeps! </strong> Het lijkt erop dat er iets mis ging.<br>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="container">
    <div class="row">
      <div class="col-md-16">
        <div class="panel panel-default">
          <div class="panel-heading">Bewerk de post</div>

            <div class="panel-body">

              {{-- <form method="post" action="{{action('PostController@update', $id)}}"> --}}
              <form method="post" action="/posts/edit" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PATCH">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" class="form-control" value="{{$post->title}}">
                </div>
                <div class="form-group">
                  <label for="body">Body</label>
                  <textarea name="body" rows="8"  class="form-control" value="{{$post->body}}"></textarea>
                </div>
                <div class="form-group">
                  <label for="image">Kies een afbeelding:</label>
                    <input type="file" name="image" id="image">
                </div>
                <button type="submit" class="btn btn-default">Opslaan</button>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
