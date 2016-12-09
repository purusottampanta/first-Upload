@extends('layouts.app')

@section('content')
	
	<div class="col-md-offset-1">
		<table class="table table-responsive table-bordered">
			<tr>
				<th>Id</th>
				<th>Posted By</th>
				<th>Title</th>
				<th>Body</th>
				<th>Operations</th>
			</tr>
			@foreach($posts as $post)
				<tr>
					<td>{{ $post->id }}</td>
					<td>{{ $post->user->name }}</td>
					<td>{{ $post->title }}</td>
					<td>{{ $post->body }}</td>
					<td>
						<a href="{{ route('posts.edit', $post->id) }}">edit</a>
						<form action="{{ route('posts.destroy', $post->id) }}" method="POST">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}

							<button type="submit" id="delete-task-{{ $post->id }}" class="btn btn-danger">
								<i class="fa fa-trash fa-btn"></i>
							</button>
						</form> 
					</td>
				</tr>
			@endforeach
		</table>
	</div>

@endsection