<a href="{{ route('employees.edit',$id) }}" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-warning edit">
    <i class="fas fa-edit"></i>
</a>

<button type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-danger{{$id}}"><i class="fas fa-trash"></i></button>