@extends('layouts/backend')

@section('title','Creating New Category')

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Create New Category</h3>
		</div>
		<div class="panel-body">

		@include('errors.list')

		{!!  Form::open(['url' => 'categories']) !!}

			@include('categories._form', ['submitButtonText' => 'Create Category'])

		{{  Form::close() }}

		</div>
	</div>
@endsection