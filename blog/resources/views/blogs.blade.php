@extends('layouts.app')

@section('content')

<div class="panel-body">
	<br>
	<br>
	@include('common.errors')
	
	<form action="/blogs" method="POST" class="form-horizontal">
			<!--csrf in here at some point -->
			{{ csrf_field() }}
		<div class="form-group">
			<label for="task" class="col-sm-3 control-label">Create Blog</label>
			<div class="col-sm-6">
				<textarea type="text" name="name" id="blog-name" class="form-control"></textarea>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-6">
				<button type="submit" class="btn btn-default">
					<button class="btn btn-primary"><i class="fa fa-plus">Add Blog</i></button>
				</button>
			</div>
		</div>
	</form>
</div>

	<!-- Current Tasks -->
@if (count($blogs) > 0)
	<div class="panel panel-default">
			<div class="panel-heading">
				Current Posts
			</div>

			<div class="panel-body">
				<table class="table table-striped task-table">

					<!-- Table Headings -->
				<thead>
					<th>Blogs</th>
					<th>&nbsp</th>
				</thead>

				    <!-- Table Body -->
				<tbody>
						@foreach ($blogs as $blog)
							<tr>
								<td class="table-text">
									<div>{{ $blog->name }}</div>
								</td>

								<td>
									<!-- delete button -->
									<form action="/blogs/{{$blog->id}}" method="POST">
										{{csrf_field()}}
										{{method_field('DELETE')}}
										<button>Delete Blog</button>
									</form>
								</td>
							</tr>
						@endforeach
				</tbody>
				</table>
			</div>
		</div>
@endif

@endsection