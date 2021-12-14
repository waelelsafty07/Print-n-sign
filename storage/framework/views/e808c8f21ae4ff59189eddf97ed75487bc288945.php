<?php $__env->startSection('content'); ?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?php echo e($page_title); ?></h3>
          </div>
          
          <!-- /.card-header -->
          <div class="card-body">

            <?php echo $dataTable->table([
              'class'=>' table table-striped table-hover  table-bordered',
            ],
            true
            ); ?>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<div class="modal fade" id="ModelDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger empty d-none">
          Please Check Your Select
        </div>
        <div class="alert alert-danger not-empty d-none">
          Are you Sure To Delete <span class="record_count"></span> Records
        </div>
      </div>
      <div class="modal-footer">
      <div class="empty d-none">
        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
      </div>
        <div class="not-empty d-none">
          <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">No</button>
          <input type="submit" class="btn btn-danger" id="del_all" name="del_all" value="Yes">
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<!-- <link rel="stylesheet" href="<?php echo e(asset('/js/datatables/jquery.dataTables.min.js')); ?>"></link> -->


  <script
  src="https://code.jquery.com/jquery-1.9.1.min.js"
  integrity="sha256-wS9gmOZBqsqWxgIVgA8Y9WcQOa7PgSIX+rPA0VL2rbQ="
  crossorigin="anonymous"></script>
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css"> -->

<?php echo $dataTable->scripts(); ?>


<script src="<?php echo e(asset('/js/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('/js/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="<?php echo e(asset('/vendor/datatables/buttons.server-side.js')); ?>"></script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel/dashboard/resources/views/admin/contacts/index.blade.php ENDPATH**/ ?>