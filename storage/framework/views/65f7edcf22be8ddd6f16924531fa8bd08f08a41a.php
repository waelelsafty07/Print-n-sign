
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo e($model->id); ?>">
  <i class="fas fa-trash text-white"></i>
</button>

<!-- Modal -->

<div class="modal fade" id="exampleModal<?php echo e($model->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?php echo Form::open(['url'=>route('admin.categories.destroy',$id),'method'=>'DELETE']); ?>

      <div class="modal-body">

        <div class="alert alert-danger">
            Delete <?php echo e($name); ?>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <?php echo Form::submit('Yes',['class'=>'btn btn-danger']); ?>

      </div>

      <?php echo Form::close(); ?>

    </div>
  </div>
</div>


<?php /**PATH /opt/lampp/htdocs/laravel/dashboard/resources/views/admin/categories/btn/delete.blade.php ENDPATH**/ ?>