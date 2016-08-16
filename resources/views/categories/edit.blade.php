@extends('layouts/backend')

@section('title', 'Editing '.$category->name)

@section('content')

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Editing Article</h3>
		</div>
		<div class="panel-body">

		@include('errors.list')

		{!!  Form::model($category, ['method' => 'patch', 'url' => 'categories/'. $category->id]) !!}
			@include('categories/_form', ['submitButtonText' => 'Edit Category'])
		{{  Form::close() }}

		</div>
	</div>

@stop