@extends('layouts.app')

@section('content')
<div class="container">
  <div id="scrolltop"></div>
    <div class="row">
        <div class="col-md-16">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>{{ $post->title }}</h1>
                <h5>Geschreven door {{ $post->creator->name }} </h5></div>
                <div class="panel-body">
                  <article>
                    <div class="body">
                      @if(!empty($post->image))
				                <img src="/images/{{ $post->image }}" width="800" height="400" />
			                @endif
                      {!! $post->body !!}
                    </div>
                  </article>
                </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                @foreach($post->comment as $comment)
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      {{ $comment->name }} gaf een reactie
                      {{ $comment->created_at->diffForHumans() }}</div>
                    <div class="panel-body">
                      <article>
                        <div class="body">{{ $comment->body }}</div>
                      </article>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <form method="POST" action="{{ route('addcomment',$post->id) }}">
                  {{ csrf_field() }}

                  <div class="form-group">
                    <input name="name" id="name" class="form-control" placeholder="Naam" required>
                    <textarea name="body" id="body" class="form-control" placeholder="Laat een bericht achter!" rows="5" required></textarea>
                  </div>

                  <button type="submit" class="btn btn-default">Verstuur</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script>
$(document).ready(function (){
    $("#click").click(function (){
        $('html, body').animate({
            scrollTop: $("#scrolltop").offset().top
        }, 2000);
    });
});
</script>
  <a href="#" id="click"class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-up"></span>Naar Boven</a>
</div>

@endsection
