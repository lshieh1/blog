@extends('layouts.app')

@section('content')

<form action="/blogs/{{$blog->id}}" method="POST">
	{{ csrf_field() }}
	{{-- {{ method_field('PATCH') }} --}}
	<div class="form-group">
		<input name="_method" type="hidden" value="PUT">
	    <label for="exampleInputEmail1">Edit this</label>
	    <input type="text" name="name" class="form-control" placeholder="{{$blog->name}}">
	    <small id="emailHelp" class="form-text text-muted">Changes can be made again</small>
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection