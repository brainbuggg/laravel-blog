@extends('layouts/backend')

@section('title','Creating New Article')

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Create New Article</h3>
		</div>
		<div class="panel-body">

		@include('errors.list')

		{!!  Form::open(['url' => 'articles']) !!}

			@include('articles._form', ['submitButtonText' => 'Create Article'])

		{{  Form::close() }}

		</div>
	</div>
@endsection