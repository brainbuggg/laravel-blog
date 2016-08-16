 <div class="form-group">
 	<div class="input-group input-group-lg">
 		<span class="input-group-addon" id="sizing-addon1">
 			<span class="glyphicon glyphicon-font"></span>
 		</span>
 		{{ Form::text('name', null, ['required', 'placeholder' => 'Enter Category Name', 'class' => 'form-control', 'autofocus']) }}
 	</div>
</div>

 <div class="form-group">
 	<div class="input-group input-group-lg">
 		<span class="input-group-addon" id="sizing-addon1">
 			<span class="glyphicon glyphicon-font"></span>
 		</span>
 		{{ Form::text('slug', null, ['required', 'placeholder' => 'Enter Category Slug', 'class' => 'form-control']) }}
 	</div>
</div>

{{ Form::submit($submitButtonText, ['class' => 'btn btn-primary btn-block btn-lg']) }}
<a href="{{ url('/categories') }}">
{{ Form::button('Cancel', ['class' => 'btn btn-danger btn-block btn-sm']) }}
</a>