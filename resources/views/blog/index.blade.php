<!-- use view master with extends -->
@extends('master')
	<!-- show the message notification -->
	{{ Session::get('message') }}
		<!-- display content with section -->
		@section('content')
		<!-- title of page -->
		<h1>Tutorial Laravel 5.3 blog</h1>
			<!-- begin foreach, loop to get all data from database here -->
			@foreach ($blogs as $blog)
				<!-- link to home page with id via named title -->
				<h2><a href="/blog/{{ $blog->id }}">{{ $blog->title }}</a></h2>
				<!-- show the complete date  -->
				{{ date('F d, Y', strtotime($blog->created_at)) }}
				<!-- show the description data -->
				<p>{{ $blog->description }}</p>
				<!-- link to edit page with id -->
				<a href="blog/{{ $blog->id }}/edit">Edit this post</a>
				<!-- begin the form action post data -->
				<form action="blog/{{ $blog->id }}" method="post">
					<!-- input hidden delete -->
					<input type="hidden" name="_method" value="delete">
					<!-- input hidden token -->
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<!-- submit the data -->
					<input type="submit" name="delete" value="delete">
				<!-- end the form page -->
				</form>
			<!-- end foreach-->
			@endforeach
		<!-- pagination -->
		{!! $blogs->links() !!}
	<!-- stop extends -->
	@stop

	<!-- display content with section -->
	@section('sidebar2')
		<!-- title -->
		<h4>Archives</h4>
		<!-- begin foreach, loop to get all data from database here -->
		@foreach ($blogs as $blog)
			<!-- ordered list item -->
			<ol class="list-unstyled">
				<!-- list item -->
				<li>
					<!-- link to blog with id description -->
					<a href="/blog/{{ $blog->id }}">{{ $blog->description }}</a>
				</li>
			</ol>
		<!-- endforeach -->
		@endforeach
	<!-- end -->
	@stop


