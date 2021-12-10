
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$model->id}}">
  <i class="fas fa-trash text-white"></i>
</button>

<!-- Modal -->

<div class="modal fade" id="exampleModal{{$model->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      {!! Form::open(['url'=>route('admin.categories.subcategory.destroy',$id),'method'=>'DELETE']) !!}
      <div class="modal-body">

        <div class="alert alert-danger">
            Delete {{$name}}
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        {!! Form::submit('Yes',['class'=>'btn btn-danger']) !!}
      </div>

      {!! Form::close() !!}
    </div>
  </div>
</div>


