<!-- use view master with extends -->
@extends('master')
	<!-- display content in section -->
	@section('content')
		<!-- title the details page -->
		<h2>Update Post</h2>
			<!-- begin form -->
			<form  class="" action="/blog/{{ $blog->id }}" method="post">
				<!-- input title with error notification -->
				{{ ($errors->has('title')) ? $errors->first('title') : '' }} <br>
				<input type="text" name="title" value="{{ $blog->title }}"> <br>
				<!-- textarea description with error notification -->
				{{ ($errors->has('description')) ? $errors->first('description') : '' }} <br>
				<textarea name="description" id="description" cols="40" rows="10">{{ $blog->description }}</textarea> <br>	
				<!-- input for hidden method put -->
				<input type="hidden" name="_method" value="put">
				<!-- input for hidden token -->
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<!-- submit the form input -->
				<input type="submit" name="name" value="update">
			<!-- end form -->
			</form>
		<!-- end view create -->
		@stop