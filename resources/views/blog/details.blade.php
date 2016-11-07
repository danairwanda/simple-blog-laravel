<!-- use view master with extends -->
@extends('master')
	<!-- display content in section -->
	@section('content')
		<!-- show the title data -->
		<h2>{{ $blog->title}}</h2>
		<!-- show the description data -->
		<p>{{ $blog->description }}</p>
	<!-- end view detail -->
	@stop