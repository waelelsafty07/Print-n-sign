<!DOCTYPE html>
<html lang="ar">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://nafezly.com/css/cust-fonts.css">
    <link rel="stylesheet" type="text/css" href="https://nafezly.com/css/fontawsome.min.css">
    <link rel="stylesheet" type="text/css" href="https://nafezly.com/css/responsive-font.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/font-fileuploader.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/jquery.fileuploader.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/jquery.fileuploader-theme-dragdrop.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/main.css')); ?>">
    <?php echo notifyCss(); ?>
    <?php echo \Livewire\Livewire::styles(); ?>

    <?php echo $__env->yieldContent('styles'); ?>
    <?php if(auth()->check()): ?>
        <?php
        if(session('seen_notifications')==null)
            session(['seen_notifications'=>0]);
        $notifications=auth()->user()->notifications()->orderBy('created_at','DESC')->limit(50)->get();
        $unreadNotifications=auth()->user()->unreadNotifications()->count();
        ?>
    <?php endif; ?>
    <title>Dashboard | <?php echo e($settings->website_name); ?></title>
    <meta name="title" content="Dashboard | <?php echo e($settings->website_name); ?>">
    <link rel="icon" type="image/png" href="<?php echo e($settings->website_icon()); ?>" />
</head>

<body style="background: #f7f7f7" class="dash">
    <?php echo $__env->yieldContent('after-body'); ?>
    <?php if (isset($component)) { $__componentOriginalf6d1e1ab7a8df2de5d0bdc28df8775f180a35b0c = $component; } ?>
<?php $component = $__env->getContainer()->make(Mckenziearts\Notify\NotifyComponent::class, []); ?>
<?php $component->withName('notify-messages'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalf6d1e1ab7a8df2de5d0bdc28df8775f180a35b0c)): ?>
<?php $component = $__componentOriginalf6d1e1ab7a8df2de5d0bdc28df8775f180a35b0c; ?>
<?php unset($__componentOriginalf6d1e1ab7a8df2de5d0bdc28df8775f180a35b0c); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <div class="col-12 justify-content-end d-flex">
        <?php if($errors->any()): ?>
        <div class="col-12" style="position: absolute;top: 80px;right: 10px;">
            <?php echo implode('', $errors->all('<div class="alert-click-hide alert alert-danger alert alert-danger col-9 col-xl-3 rounded-0 mb-1" style="position: fixed!important;z-index: 11;opacity:.9;right:25px;cursor:pointer;" onclick="$(this).fadeOut();">:message</div>')); ?>

        </div>
        <?php endif; ?>
    </div>

    <div class="modal fade" data-bs-backdrop="static" id="open-image-selector-modal" data-bs-keyboard="false" tabindex="-1"  aria-hidden="true">
      <div class="modal-dialog modal-xl  modal-fullscreen-sm-down ">
        <div class="modal-content overflow-hidden">
        <div class="col-12 px-0 d-flex row">

            <div class="col-10 px-3 py-3">
                <span class="fal fa-info-circle"></span>   Choose from files
            </div>
            <div class="col-2 px-3 align-items-center d-flex justify-content-end">
                <span class="far fa-times font-2 cursor-pointer mx-2" data-bs-dismiss="modal"></span>
            </div>

            <div class="col-12 divider" style="min-height: 2px;"></div>

        </div>
          <div class="modal-body p-0">
            <div class="col-12">
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('files-viewer', [])->html();
} elseif ($_instance->childHasBeenRendered('4rIENlA')) {
    $componentId = $_instance->getRenderedChildComponentId('4rIENlA');
    $componentTag = $_instance->getRenderedChildComponentTagName('4rIENlA');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('4rIENlA');
} else {
    $response = \Livewire\Livewire::mount('files-viewer', []);
    $html = $response->html();
    $_instance->logRenderedChild('4rIENlA', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
          </div>
         
        </div>
      </div>
    </div>



    <form method="POST" action="<?php echo e(route('logout')); ?>" id="logout-form"><?php echo csrf_field(); ?></form>
    <div class="col-12 d-flex">
        

        <div style="width: 280px;background: #11233b;min-height: 100vh;position: fixed;z-index: 100" class="aside active">
            <div class="col-12 px-0 d-flex" style="height: 60px;background: #1a2d4d">
                <div class="col-12 px-2 font-3  d-flex  justify-content-center pt-md-1" style="color: #fff">
                    <span class="fal fa-chart-pie font-4 pt-3 d-inline-block "></span>
                    <span class="d-inline-block px-2 pt-2">Dashboard</span> 
                    <div class="d-flex d-md-none justify-content-center align-items-center px-0   asideToggle" style="width: 60px;height: 60px;">
                        <span class="fal fa-bars font-4 cursor-pointer"></span>
                    </div>
                </div>
            </div>
        <div class="col-12 px-0 py-5 text-center justify-content-center align-items-center ">
            <a href="<?php echo e(route('admin.profile.edit')); ?>">
            <img src="<?php echo e(auth()->user()->getUserAvatar()); ?>" style="width: 55px;height: 55px;color: #fff;border-radius: 50%" class="d-inline-block">
                </a>
                <div class="col-12 px-0 mt-2" style="color: #fff">
                    WELCOME <?php echo e(auth()->user()->name); ?>

                </div> 
            </div>
            <div class="col-12 px-0">
                <div class="col-12 px-0">

                    <a href="<?php echo e(route('admin.index')); ?>" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex" >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-home font-3"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                Main
                            </div> 
                        </div>
                    </a>
                    <a href="<?php echo e(route('admin.categories.index')); ?>" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex " >
                            <div style="width: 50px" class="px-3 text-center">
                            <i class="fal fa-caret-right font-3"></i>
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                               Categories
                            </div> 
                        </div>
                    </a>
                    <a href="<?php echo e(route('admin.products.index')); ?>" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex " >
                            <div style="width: 50px" class="px-3 text-center">
                            <i class="fal fa-caret-right font-3"></i>
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                               Products
                            </div> 
                        </div>
                    </a>
                    <a href="<?php echo e(route('admin.settings.index')); ?>" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex " >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-wrench font-3"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                               Settings
                            </div> 
                        </div>
                    </a>
                    
                    <a href="#" class="col-12 px-0" onclick="document.getElementById('logout-form').submit();">
                        <div class="col-12 item px-0 d-flex " >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-sign-out-alt font-3"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                               Logout
                            </div> 
                        </div>
                    </a>
                </div>
            </div>
           
        </div>
        <div class="main-content in-active" style="overflow: hidden;">
            <div class="col-12 px-0 d-flex justify-content-between top-nav" style="height: 60px;box-shadow: 0px 0px 12px #f1f1f1;background: #fff;position: fixed;width: 100%;width: calc(100% - 280px);z-index: 1;">
                <div class="col-12 px-0 d-flex justify-content-center align-items-center btn btn-light asideToggle" style="width: 60px;height: 60px;">
                    <span class="fal fa-bars font-4"></span>
                </div> 
                <div class="col-12 px-0 d-flex justify-content-end  " style="height: 60px;">
                    <div class="btn-group" id="notificationDropdown">

                        <div class="col-12 px-0 d-flex justify-content-center align-items-center btn btn-light " style="width: 60px;height: 60px;" data-bs-toggle="dropdown" aria-expanded="false" id="dropdown-notifications">
                            <span class="fas fa-bell font-4 d-inline-block" style="color: #ff9800;transform: rotate(15deg)"></span>
                            <span style="position: absolute;min-width: 25px;min-height: 25px;
                            <?php if($unreadNotifications!=0): ?>
                            display: inline-block;
                            <?php else: ?>
                            display: none;
                            <?php endif; ?>
                            right: 0px;top: 0px;border-radius: 20px;background: #c00;color:#fff;font-size: 14px;" id="dropdown-notifications-icon"><?php echo e($unreadNotifications); ?></span>

                        </div>
                        <div class="dropdown-menu py-0 rounded-0 border-0 shadow " style="cursor: auto!important;z-index: 20000;width: 350px;height: 450px;">
                            <div class="col-12 notifications-container" style="height:406px;overflow: auto;">
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
                            <div class="col-12 d-flex border-top"> 
                                <a href="<?php echo e(route('admin.notifications.index')); ?>" class="d-block py-2 px-3 ">
                                    <div class="col-12 align-items-center">
                                        View All Notifications <span class="fal fa-bells"></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 d-flex justify-content-center align-items-center  dropdown"  style="width: 60px;height: 60px;" >
                        <div style="width: 60px;height: 60px;" data-bs-toggle="dropdown" aria-expanded="false" class="d-flex justify-content-center align-items-center cursor-pointer">
                            <img src="<?php echo e(auth()->user()->getUserAvatar()); ?>" style="padding: 10px;border-radius: 50%;width: 60px;height: 60px;">
                        </div>
                        <ul class="dropdown-menu shadow border-0" aria-labelledby="dropdownMenuButton1">
                                <li style="text-align: left"><a class="dropdown-item font-1" href="/" target="_blank"><span class="fal fa-desktop font-1"></span> View Website</a></li>
                                <li style="text-align: left"><a class="dropdown-item font-1" href="<?php echo e(route('admin.profile.index')); ?>"><span class="fal fa-user font-1"></span> Profile</a></li>
                                <li style="text-align: left"><a class="dropdown-item font-1" href="<?php echo e(route('admin.profile.edit')); ?>"><span class="fal fa-edit font-1"></span> Edite My Profile</a></li> 
                                <li style="text-align: left"><hr style="height: 1px;margin: 10px 0px 5px;"></li>
                                <li style="text-align: left"><a class="dropdown-item font-1" href="#" onclick="document.getElementById('logout-form').submit();"><span class="fal fa-sign-out-alt font-1"></span> Logout</a></li>
                        </ul>

                    </div>

                    <div class="dropdown" style="width: 60px;height: 60px;background: #2381c6">
                        <span class="d-inline-block fal fa-user"></span> 
                    </div>

                </div>
            </div>
            <div class="col-12 px-0 py-2" style="margin-top: 60px;">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>
    <input type="hidden" id="current_selected_editor">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
    <script src="<?php echo e(asset('/js/jquery.fileuploader.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/validatorjs.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/favicon_notification.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/main.js')); ?>"></script>
    <?php echo \Livewire\Livewire::scripts(); ?>

    <?php echo notifyJs(); ?>
    <?php echo $__env->make('layouts.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('scripts'); ?>
    <!-- fjkgjkjgkdjg -->
    <?php echo $__env->yieldPushContent('js'); ?>
</body>
</html><?php /**PATH /opt/lampp/htdocs/laravel/dashboard/resources/views/layouts/admin.blade.php ENDPATH**/ ?>