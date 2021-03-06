@extends('layouts.app')

@section('content')
<div class="card card-default">
	<div class="card-header">Create Post</div>
</div>
<div class="card-body">
	<form action="{{ route('posts.store') }}" method="Post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
		<label for="title">Title</label>
		<input type="text" class="form-control" name="title" id="title">
		</div>
		<div class="form-group">
		<label for="description">Description</label>
		<textarea name="description" id="description" cols="5" rows="5" class="form-control"></textarea>
		</div>
		<div class="form-group">
		<label for="content">Content</label>
		<input type="hidden" id="content" name="content">
		<trix-editor input="content"></trix-editor>
		</div>
		<div class="form-group">
		<label for="published_at">Published at</label>
		<input type="text" class="form-control" name="published_at" id="published_at">
		</div>
		<div class="form-group">
		<label for="image">Image</label>
		<input type="file" class="form-control" name="image" id="image">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success">Create Post</button>
		</div>
	</form>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
	flatpickr('#published_at', {
		enableTime:true
	})
</script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

