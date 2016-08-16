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
			<p class="faded">
				{{ $article->category->name }} | 
				@if ($article->belongsToLoggedinUser($article->user_id))
						@if ($article->published_at < Carbon\Carbon::now())
							Published 
						@else
							Will publish 
						@endif
						 <b>{{ $article->published_at->diffForHumans() }}</b> |
						Article by <b>You</b>

					<div class="buttons-bar">
						{{ Form::open(['method' => 'get', 'style' => 'display: inline' , 'route' => ['articles.edit', $article->id]]) }}
						    {{ Form::button('<span class="glyphicon glyphicon-pencil"></span> Edit', ['type' => 'submit', 'class' => 'btn btn-success', 'title' => 'Edit this Article']) }}
						{{ Form::close() }}
						{{ Form::open(['method' => 'delete', 'style' => 'display: inline' , 'route' => ['articles.destroy', $article->id]]) }}
						    {{ Form::button('<span class="glyphicon glyphicon-remove"></span> Remove', ['type' => 'submit', 'class' => 'btn btn-danger', 'title' => 'Remove this Article']) }}
						{{ Form::close() }}
					</div>
				@else
					<p class="faded">
						Will publish <b>{{ $article->published_at->diffForHumans() }}</b> |
						Article by <b>{{ App\User::find($article->user_id)->name }}</b>
					</p>
				@endif
			</p>
		</div>
	</div>

@stop