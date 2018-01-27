@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-16">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <p>
                    Hello! Mijn naam is Charlotte maar mijn vrienden noemen mij ook wel Charlie.
                    Leuk dat je komt kijken op mijn blog. Ik zit momenteel in mijn 3e jaar van de studie
                    Communicatie & Multimedia Design op het NHL in Leeuwarden. Sinds begin febrauri tot eind
                    juni loop ik stage als backend developer bij MintTwits in Londen.
                    Met behulp van deze website (die ik overigens zelf heb gemaakt)
                    deel ik graag met jullie al mijn Londense avonturen.
                  </p>
                  <p>Hou deze pagina dus goed in de gaten :-)</p>
                </div>

                <div class="panel-body">
                  @foreach ($posts as $post)
                    <article>
                      <h3><a href="/{{ $post->id }}">{{ $post->title }}</a></h3>
                      <h5> {{ $post->created_at->format('d F Y') }} </h5>
                      <div class="body"> {{ substr(strip_tags($post->body), 0, 800) }}{{ strlen(strip_tags($post->body)) > 800 ? "..." : ""}}</div>
                      @if (strlen(strip_tags($post->body)) > 800)
                        <a href="{{ action('BlogController@show', $post) }}" class="read-more">Lees verder..</a>
                      @endif
                      <hr>
                    </article>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				{!! $posts->links() !!}
			</div>
		</div>
</div>
@endsection
