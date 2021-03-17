@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
	<a href="{{ route('posts.create') }}" class="btn btn-success">Add Posts</a>
</div>
<div class="card card-default card-body">
	<div class="card-header">Posts</div>
	<div class="card-body">
		@if($posts->count() > 0)
		<table class="table">
			<thead>
				<th>Image</th>
				<th>Title</th>
				<th></th>
				<th></th>
			</thead>
			<tbody>
				@foreach($posts as $post)
				<tr>
					<td>
						<img src="{{asset('images')}}/{{$post->image}}" alt="Image" height="60px" width="80px" />
					</td>
					<td>
					{{$post->title}}	
					</td>
					@if(!$post->trashed())
					<td>
						<a href="" class="btn btn-info btn-sm">Edit</a>
					</td>
					@endif
					<td>
						<form action="{{route('posts.destroy',$post->id)}}" method="POST">
							@csrf
							@method('delete')
							<button type="submit" class="btn btn-danger btn-sm">{{$post->trashed() ? 'delete' : 'Trash'}}</button>
						</form>
					</td>
				</tr>

				@endforeach
			</tbody>
		</table>
		@else
		<h3 class="text-center">No Post Yet</h3>
		@endif
	</div>
	
</div>

@endsection