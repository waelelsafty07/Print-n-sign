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

            <?php echo Form::open(['url'=>route('admin.categories.subcategory.store')]); ?>

                    <?php echo csrf_field(); ?>
            <div class="form-group mt-2">
              <?php echo Form::label('name', 'SubCategory Name'); ?>

              <?php echo Form::text('name',old('name'),['class'=>'form-control']); ?>

            </div>
            <?php echo Form::hidden('category_id', $id); ?>


            <?php echo Form::submit('Add',['class'=>'btn btn-primary mt-2','placeholder' => '..................']); ?>

            <?php echo Form::close(); ?>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel/dashboard/resources/views/admin/categories/subcategories/create.blade.php ENDPATH**/ ?>