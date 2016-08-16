@extends('layouts/backend')

@section('title','Categories: BrainBlog')

@section('content')

	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">
					Categories <span class="badge">{{ $categories->count() }}</span>
					&nbsp;&nbsp;<a href="{{ url('categories\create') }}" title="Create New Category">+ Add New</a>
				</h3>
			</div>
			<div class="panel-body no-padding">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Category</th>
							<th>Slug</th>
							<th>Articles in Cat</th>
							<th>Created At</th>
							<th>Updated at</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($categories as $category)
							<tr>
								<td>{{ $category->id }}</td>
								<td>{{ $category->name }}</td>
								<td>{{ $category->slug }}</td>
								<td><span class="badge">{{ 0 }}</span></td>
								<td>{{ $category->created_at->diffForHumans() }}</td>
								<td>{{ $category->updated_at->diffForHumans() }}</td>
								<td>
									{{ Form::open(['method' => 'get', 'route' => ['categories.edit', $category->id]]) }}
									    {{ Form::button('<span class="glyphicn glyphicon-pencil"><span>', ['type' => 'submit', 'class' => 'btn btn-primary btn-xs']) }}
									{{ Form::close() }}
								</td>
								<td>
									{{ Form::open(['method' => 'delete', 'route' => ['categories.destroy', $category->id]]) }}
									    {{ Form::button('<span class="glyphicon glyphicon-remove"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) }}
									{{ Form::close() }}
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">
					+ Add New Category
				</h3>
			</div>
			<div class="panel-body text-center">

			{{ Form::open(['url' => 'categories', 'class' => 'form-inline']) }}

				<div class="form-group">
			    	{{ Form::text('name', null, ['placeholder' => 'Category Name', 'class' => 'form-control']) }}
			  	</div>
			  	<div class="form-group">
			    	{{ Form::text('slug', null, ['placeholder' => 'Category Slug', 'class' => 'form-control']) }}
			  	</div>
			  	{{ Form::submit('Create', ['class' => 'btn btn-primary btn-sm']) }}

			{{ Form::close() }}

			</div>
		</div>
	</div>


@endsection