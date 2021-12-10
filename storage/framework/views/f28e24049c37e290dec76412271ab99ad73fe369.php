<?php $__env->startSection('content'); ?>
<div class="col-12 py-3">
	<div class="container">
		<div class="p-3 main-box mx-auto" style="width:600px;max-width: 100%;">
			<div class="d-flex align-items-center justify-content-center py-4">
			 	<div class="col-12 d-inline-block mx-auto" style="width:120px">
			 		<img src="<?php echo e(auth()->user()->getUserAvatar()); ?>" style="width:120px;max-width: 100%;border-radius: 50%;">
			 		<div class="col-12 font-3 text-center py-2">
			 			<?php echo e(auth()->user()->name); ?>

			 		</div>
			 	</div>
			 	
			</div>
			<div class="col-12 p-0">
				<table class="table table-bordered table-striped rounded table-hover">
					<tbody>
						<tr>
							<td>Emaill</td>
							<td><?php echo e(auth()->user()->email); ?></td>
						</tr>
						<tr>
							<td>Number Phone</td>
							<td>
								<?php if(auth()->user()->phone==null): ?>
									Not Found
								<?php else: ?>
									<?php echo e(auth()->user()->phone); ?>

								<?php endif; ?>
							</td>
						</tr>
						<tr>
							<td>Power</td>
							<td><?php echo e(auth()->user()->power); ?></td>
						</tr>
						<tr>
							<td>Activated</td>
							<td>
								<?php if(!auth()->user()->blocked): ?>
									<span class="fas fa-check-circle text-success"></span>
								<?php else: ?>
									<span class="fas fa-times-circle text-danger"></span>
								<?php endif; ?>

						</td>
						<tr>
							<td>Bio</td>
							<td>
								<?php echo e(auth()->user()->bio); ?>

							</td>
						</tr>
						
						<tr>
							<td>Control</td>
							<td><a href="<?php echo e(route('admin.profile.edit')); ?>" class="btn btn-light btn-sm border"><span class="fal fa-wrench"></span> Edite</a></td>
						</tr>

						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel/dashboard/resources/views/admin/profile/index.blade.php ENDPATH**/ ?>