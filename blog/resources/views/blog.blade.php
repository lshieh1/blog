@extends('layouts.app')

@section('content')

	<h1>this is the single blog page</h1>
	<p>{{$singleBlog->name}}</p>
	<a href="/blogs/{{$singleBlog->id}}/edit"><button class="btn btn-secondary">Edit this post</button></a>
	<br><br>

		<ul>
			@foreach ($comments as $comment)
				<li>{{$comment->body}}</li>
			@endforeach
		</ul>
	
	
	<form action="/blogs/{{$singleBlog->id}}" method="POST">
		{{ csrf_field() }}
		<input type="hidden" name="post_id" value={{$singleBlog->id}} >
		<input type="text" name="body">
		<input type="submit" value="leave a comment">
	</form>

@endsection	