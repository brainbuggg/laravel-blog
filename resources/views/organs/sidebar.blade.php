<ul class="nav nav-pills nav-stacked">
	<li>
		<a href="{{ url('/articles') }}">
			ARTICLES <span class="badge">{{ App\Article::count()}}
		</a>
	</li>
	<li><a href="{{ url('/articles/create') }}">COMPOSE</a></li>
	<li>
		<a href="{{ url('/categories') }}">
			CATEGORIES  <span class="badge">{{ App\Category::count() }}</span>
		</a>
	</li>
	<li>
		<a href="{{ url('/tags') }}">
			TAGS  <span class="badge">{{ App\Tag::count() }}</span>
		</a>
	</li>
</ul>