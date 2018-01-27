@extends('layouts.app')

@section('content')

  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif

<div class="container">
    <div class="row">
        <div class="col-md-16">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h1>Alle berichten</h1>
                </div>
                <div class="panel-body">
                  <div class="pull-left">
                    <a class="btn btn-success" href="{{ url('/posts/create') }}">Nieuw bericht</a>
                  </div>

                  <table class="table table-bordered">
                    <tr>
                      <th>Titel</th>
                      <th>Body</th>
                    </tr>

                    @foreach ($posts as $post)
                      <tr>
                        <td>{{ $post->title }}</td>
                        <td>{!! $post->body !!}</td>
                        <td>
                          <a href="{{ url('/posts/{post}') }}" class="btn btn-md btn-info">Laat zien</a>
                          <a href="{{ url('posts/edit', $post->id) }}" class="btn btn-md btn-warning">Bewerk</a>
                          <form action="{{ action ('PostController@destroy', $post->id)}}" method="post">
                             {{csrf_field()}}
                             <input name="_method" type="hidden" value="DELETE">
                             <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection
