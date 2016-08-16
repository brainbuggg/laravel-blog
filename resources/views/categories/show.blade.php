@extends('layouts/backend')

@section('title', 'Reading: ' . $article->title)

@section('content')

	<div class="panel panel-primary">
		<div class="panel-body">
		<h3>{{ $article->title }}</h3>
			<div class="well">
				<article>
					<p>{{ $article->body }}</p>
				</article>
				@if ($article->tags)
					<P>
						@foreach ($article->tags as $tag)
							<span class="badge">{{ $tag->name }}</span>&nbsp;
						@endforeach
					</P>
				@endif
			</div>

			@if ($article->belongsToLoggedinUser($article->user_id))
				<p class="faded">
					To be published: <b>{{ $article->published_at->diffForHumans() }}</b> |
					Article by <b>You</b>
				</p>
				<div class="buttons-bar">
					<a href="{{ url('articles/'.$article->id.'/edit') }}" title="Edit This Article">
						{!! Form::button('<span class="glyphicon glyphicon-pencil"></span>', ['class' => 'btn-primary btn-xs']) !!}
					</a>
					<a href="{{ url('articles/'.$article->id.'/remove') }}" title="Remove This Article">
						{!! Form::button('<span class="glyphicon glyphicon-remove"></span>', ['class' => 'btn-danger btn-xs']) !!}
					</a>
				</div>
			@else
				<p class="faded">
					Will publish <b>{{ $article->published_at->diffForHumans() }}</b> |
					Article by <b>{{ App\User::find($article->user_id)->name }}</b>
				</p>
			@endif

		</div>
	</div>

@stop