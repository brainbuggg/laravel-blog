 <div class="form-group">
 	<div class="input-group input-group-lg">
 		<span class="input-group-addon" id="sizing-addon1">
 			<span class="glyphicon glyphicon-font"></span>
 		</span>
 		{{ Form::text('title', null, ['required', 'placeholder' => 'Enter Title', 'class' => 'form-control', 'autofocus' => 'autofocus', 'aria-describedby' => 'sizing-addon1']) }}
 	</div>
</div>

<div class="form-group">
	{{-- {{ Form::label('body', 'Body: ') }} --}}
	{{ Form::textarea('body', null, ['required', 'placeholder' => 'Enter Body', 'class' => 'form-control']) }}
</div>

<div class="form-group">
	{!! Form::select('category_id', $categories, null, array('class' => 'form-control')); !!}
</div>

<div class="form-group">
	{{ Form::label('published_at', 'Publish on: ') }}
	{{ Form::input('date', 'published_at', date('Y-m-d'), ['placeholder' => 'Enter Date']) }}
</div>

<div class="form-group">
	{{ Form::label('tag_list', 'Tags: ') }}
	{{ Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) }}
</div>

{{ Form::submit($submitButtonText, ['class' => 'btn btn-primary btn-block btn-lg']) }}
{{ Form::input('reset', 'reset', null,  ['class' => 'btn btn-warning btn-block']) }}
<a href="{{ url('/articles') }}">
{{ Form::button('Cancel', ['class' => 'btn btn-danger btn-block btn-sm']) }}
</a>

@section('footer')
	<script>
		$('#tag_list').select2();
	</script>
@endsection