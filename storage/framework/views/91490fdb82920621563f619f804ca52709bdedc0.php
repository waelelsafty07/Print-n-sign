<?php $__env->startSection('content'); ?>
<div class="col-12 container">
	
	<div class="col-12 p-3">
		<?php echo e($notifications->links()); ?>

	</div>

	<div class="col-12 p-3 notifications-container" >
		<?php if (isset($component)) { $__componentOriginalbdf04e36eb6b1458ab9aca210e828622d01957c5 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Notifications::class, ['notifications' => $notifications]); ?>
<?php $component->withName('notifications'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalbdf04e36eb6b1458ab9aca210e828622d01957c5)): ?>
<?php $component = $__componentOriginalbdf04e36eb6b1458ab9aca210e828622d01957c5; ?>
<?php unset($__componentOriginalbdf04e36eb6b1458ab9aca210e828622d01957c5); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel/dashboard/resources/views/admin/notifications/index.blade.php ENDPATH**/ ?>