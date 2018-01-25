@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-16">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Show</h1></div>
                <div class="panel-body">
                  <form method="post" action="{{action('PostController@update', $id)}}">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="row">
                      <div class="col-md-4"></div>
                      <div class="form-group col-md-4">
                        <label for="name">Title:</label>
                        <input type="text" class="form-control" name="name" value="{{$post->title}}">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                          <label for="price">Body:</label>
                          <input type="text" class="form-control" name="price" value="{{$post->body}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4"></div>
                      <div class="form-group col-md-4">
                        <button type="submit" class="btn btn-success">Sla op!</button>
                      </div>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>

@endsection
