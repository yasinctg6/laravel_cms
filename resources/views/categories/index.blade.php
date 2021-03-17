@extends('layouts.app')


@section('content')
<div class="d-flex justify-content-end mb-2">
	<a href="{{ route('categories.create') }}" class="btn btn-success">Add Category</a>
</div>
<div class="card card-default">
	<div class="card-header">Categories</div>
    <div class="card-body">
        @if($categories->count() > 0)
        <table class="table">
            <thead>
                <th>Names</th>
                <th></th>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>
                        <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-info btn-small">Edit</a>
                        <div class="btn btn-danger btn-small" onclick="handleDelete( {{$category->id}} )">Delete</div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
        <h3 class="text-center">No Category Created</h3>
        @endif
        <!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="" method="post" id="deleteCategoryForm">
    	@csrf
    	@method('DELETE')
    	
    	<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Categories</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="text-center text-bold">Are you sure you want to delete this category</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Go Back</button>
        <button type="submit" class="btn btn-danger">Yes, Delete</button>
      </div>
    </form>
    </div>
  </div>
</div>
    </div>
</div>
@endsection
@section('scripts')
<script>
	function handleDelete(id) {
		var form= document.getElementById('deleteCategoryForm')
		form.action= '/categories/' + id
		$('#deleteModal').modal('show')
	}
</script>
@endsection
