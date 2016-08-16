@extends('layouts/backend')

@section('title', 'Editing '.$article->title)

@section('content')

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Editing Article</h3>
		</div>
		<div class="panel-body">

		@include('errors.list')

		{!!  Form::model($article, ['method' => 'patch', 'url' => 'articles/'. $article->id]) !!}

			@include('articles._form', ['submitButtonText' => 'Edit Article'])

		{{  Form::close() }}

		</div>
	</div>

@stop