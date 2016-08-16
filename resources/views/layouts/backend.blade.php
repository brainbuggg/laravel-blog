<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	{{ Html::style('css/bootstrap.min.css') }}
	{{ Html::style('css/select2.min.css') }}
	{{ Html::style('css/design.css') }}

	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</head>
<body>

	<header>
		@include('organs/header')
	</header>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-2 column">
					@include('organs/sidebar')
				</div>
				<div class="col-md-10 column">

					{{-- FLASH MESSAGE BLOCK
					@if (Session::has('flash_message'))
						<div class="flash_message">
							<div class="alert alert-success" role="alert"
								@if (Session::has('alert_dismiss'))
									id="alert-dismiss"
								@endif
							>
								{!! Session::get('flash_message') !!}
							</div>
						</div>
					@endif --}}

					@include('flash::message')

					@yield('content')

				</div>
			</div>
		</div>
	</section>

	<footer>
		@yield('footer')
		@include('organs/footer')
	</footer>
	{{ Html::style('css/fonts.css') }}
	{{ Html::script('js/jquery.min.js') }}
	{{ Html::script('js/bootstrap.js') }}
	{{ Html::script('js/select2.min.js') }}
	{{ Html::script('js/dynamize.js') }}
</body>
</html>