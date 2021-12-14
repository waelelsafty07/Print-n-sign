<!-- <div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
	<div class="col-12 px-0 py-2 d-flex " style="background: #fff;">
		<div style="width: 80px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #11233b;height: 64px;border-radius: 50%;">
				<span class="fal fa-users font-5" style="color: #fff"></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<h6 class="font-1">المستخدمين</h6>
			<h6 class="font-3">0</h6>
		</div>
	</div>
</div> -->
<?php if(auth()->check()): ?>
        <?php
        if(session('seen_notifications')==null)
            session(['seen_notifications'=>0]);
        $notifications=auth()->user()->notifications()->orderBy('created_at','DESC')->limit(50)->get();
        $unreadNotifications=auth()->user()->unreadNotifications()->count();
        ?>
    <?php endif; ?>
<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3" style="    margin: 0 0 0 auto;">
	<div class="col-12 px-0 py-2 d-flex " style="background: #fff;">
		
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<h6 class="font-1" style="font-weight: bold;">Notification</h6>
			<?php if($unreadNotifications): ?>
				<h6 class="font-3"><?php echo e($unreadNotifications); ?></h6>
			<?php endif; ?>
		</div>
		<div style="width: 80px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #11233b;height: 64px;border-radius: 50%;">
				<span class="fal fa-bells font-5" style="color: #fff;"></span>
			</div>
		</div>
	</div>
</div>

<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('dashboard-statistics', [])->html();
} elseif ($_instance->childHasBeenRendered('lvKRM5Q')) {
    $componentId = $_instance->getRenderedChildComponentId('lvKRM5Q');
    $componentTag = $_instance->getRenderedChildComponentTagName('lvKRM5Q');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('lvKRM5Q');
} else {
    $response = \Livewire\Livewire::mount('dashboard-statistics', []);
    $html = $response->html();
    $_instance->logRenderedChild('lvKRM5Q', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?><?php /**PATH /opt/lampp/htdocs/laravel/dashboard/resources/views/admin/dashboard/index.blade.php ENDPATH**/ ?>