<?php $__env->startSection('content'); ?>
<div class="col-12 py-2 px-3 row">
	<?php echo $__env->make('admin.dashboard.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel/dashboard/resources/views/admin/index.blade.php ENDPATH**/ ?>