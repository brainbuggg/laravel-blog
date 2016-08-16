@extends('layouts/backend')

@section('title','Articles: BrainBlog')

@section('content')

	<div class="col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">
					ON THE SITE <span class="badge">{{ $pubArticles->count() }}</span>
					&nbsp;&nbsp;<a href="{{ url('/articles/create') }}" title="Create New Article">+ Create New</a>
				</h3>
			</div>
			<div class="panel-body no-padding">
				@foreach ($pubArticles as $article)
					<div class="well">
						<article>
							<a href="{{ url('/articles/' . $article->id) }}">
								<h4>{{ $article->title }}</h4>
							</a>
							<p>{{ $article->body }}</p>
							@if ($article->tags)
								<P>
									@foreach ($article->tags as $tag)
										<span class="badge">{{ $tag->name }}</span>&nbsp;
									@endforeach
								</P>
							@endif
						</article>

						<p class="faded">
							{{ $article->category->name }} | 
							@if ($article->belongsToLoggedinUser($article->user_id))
									Added: <b>{{ $article->published_at->diffForHumans() }}</b> |
									Article by <b>You</b>
								<div class="buttons-bar">
									{{ Form::open(['method' => 'get', 'style' => 'display: inline' , 'route' => ['articles.edit', $article->id]]) }}
									    {{ Form::button('<span class="glyphicon glyphicon-pencil"></span>', ['type' => 'submit', 'class' => 'btn btn-success btn-sm', 'title' => 'Edit this Article']) }}
									{{ Form::close() }}
									{{ Form::open(['method' => 'delete', 'style' => 'display: inline' , 'route' => ['articles.destroy', $article->id]]) }}
									    {{ Form::button('<span class="glyphicon glyphicon-remove"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'Remove this Article']) }}
									{{ Form::close() }}
								</div>
							@else
									Added: <b>{{ $article->published_at->diffForHumans() }}</b> |
									Article by <b>{{ App\User::find($article->user_id)->name }}</b>
							@endif
						</p>
					</div>
				@endforeach
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">
					TO BE PUBLISHED <span class="badge">{{ $unpubArticles->count() }}</span>
					&nbsp;&nbsp;<a href="{{ url('/articles/create') }}" title="Create New Article">+ Create New</a>
				</h3>
			</div>
			<div class="panel-body no-padding">
				@foreach ($unpubArticles as $article)
					<div class="well">
						<article>
							<a href="{{ url('/articles/' . $article->id) }}">
								<h4>{{ $article->title }}</h4>
							</a>
							<p>{{ $article->body }}</p>

							@if ($article->tags)
								<P>
									@foreach ($article->tags as $tag)
										<span class="badge">{{ $tag->name }}</span>&nbsp;
									@endforeach
								</P>
							@endif
						</article>

						@if ($article->belongsToLoggedinUser($article->user_id))
							<p class="faded">
								To be published: <b>{{ $article->published_at->diffForHumans() }}</b> |
								Article by <b>You</b>
							</p>
							<div class="buttons-bar">
								{{ Form::open(['method' => 'get', 'style' => 'display: inline' , 'route' => ['articles.edit', $article->id]]) }}
								    {{ Form::button('<span class="glyphicon glyphicon-pencil"></span>', ['type' => 'submit', 'class' => 'btn btn-success btn-sm', 'title' => 'Edit this Article']) }}
								{{ Form::close() }}
								{{ Form::open(['method' => 'delete', 'style' => 'display: inline' , 'route' => ['articles.destroy', $article->id]]) }}
								    {{ Form::button('<span class="glyphicon glyphicon-remove"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'Remove this Article']) }}
								{{ Form::close() }}
							</div>
						@else
							<p class="faded">
								Will publish <b>{{ $article->published_at->diffForHumans() }}</b> |
								Article by <b>{{ App\User::find($article->user_id)->name }}</b>
							</p>
						@endif
					</div>
				@endforeach
			</div>
		</div>
	</div>

@endsection