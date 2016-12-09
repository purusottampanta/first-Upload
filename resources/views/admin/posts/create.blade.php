@extends('layouts.app')

@section('content')
	<div class="col-md-5 col-md-offset-1">
		<form action="{{ url('posts') }}" method="POST">

		@include('admin.posts.form')
			
		</form>
	</div>

@endsection