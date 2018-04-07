@extends('layouts.app')

@section('content')

	<h1>this is the single blog page</h1>
	<p>{{$singleBlog->name}}</p>
	<a href="/blogs/{{$singleBlog->id}}/edit"><button class="btn btn-secondary">Edit this post</button></a>
@endsection