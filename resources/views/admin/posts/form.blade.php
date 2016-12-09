{{ csrf_field() }}
			
<div class="form-group">
	<label for="title" class="control-label">Title</label>
	{{-- <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{  Request::old('title') }}"> --}}
	<input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ $post->title or old('title') }}">
	@if($errors->has('title'))
		<p class="help-text text-danger">{{ $errors->first('title') }}</p>
	@endif
</div>

<div class="form-group">
	<label for="body" class="control-label">Post Body</label>
	<textarea class="form-control" id="body" name="body" placeholder="Body" rows="10">{{ $post->body or old('body') }}</textarea>
	@if($errors->has('body'))
		<p class="help-text text-danger">{{ $errors->first('body') }}</p>
	@endif
</div>

<input type="submit" value="Submit" class="btn btn-default">
