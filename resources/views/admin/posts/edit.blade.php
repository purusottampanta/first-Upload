@extends('layouts.app')

@section('content')
	<div class="col-md-5 col-md-offset-1">
		<form action="{{ route('posts.update', $post->id) }}" method="POST">

		{!! method_field('patch') !!}

		@include('admin.posts.form')
			
		</form>
	</div>

@endsection