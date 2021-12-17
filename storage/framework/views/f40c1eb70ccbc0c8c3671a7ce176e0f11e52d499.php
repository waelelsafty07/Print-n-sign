<!doctype html>
<html lang="ar" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($settings->website_name); ?></title>
   

  
    <?php echo $__env->make('seo.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    <!--====== Google Font ======-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

    <!--====== Vendor Css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('/front/css/vendor.css')); ?>">

    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href="<?php echo e(asset('/front/css/utility.css')); ?>">

    <!--====== App ======-->
    <link rel="stylesheet" href="<?php echo e(asset('/front/css/app.css')); ?>">

    <?php echo $settings->header_code; ?>

    <?php echo notifyCss(); ?>
    <?php echo \Livewire\Livewire::styles(); ?>

    <?php if(auth()->check()): ?>
        <?php
        if(session('seen_notifications')==null)
            session(['seen_notifications'=>0]);
        $notifications=auth()->user()->notifications()->orderBy('created_at','DESC')->limit(50)->get();
        $unreadNotifications=auth()->user()->unreadNotifications()->count();
        ?>
    <?php endif; ?>
    <?php echo $__env->yieldContent('styles'); ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body class="config">

<div class="preloader is-active">
        <div class="preloader__wrap">
            <img class="preloader__img" src="<?php echo e(asset('/front/images/preloader.png')); ?>" alt=""></div>
    </div>

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

    <div id="app">
            <?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('front.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
    <script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async defer></script>

    <!--====== Vendor Js ======-->
    <script src="<?php echo e(asset('/front/js/vendor.js')); ?>"></script>
 <!--====== jQuery Shopnav plugin ======-->
 <script src="<?php echo e(asset('/front/js/jquery.shopnav.js')); ?>"></script>
    <!--====== App ======-->
    <script src="<?php echo e(asset('/front/js/app.js')); ?>"></script>

    <!--====== Noscript ======-->
    <noscript>
        <div class="app-setting">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="app-setting__wrap">
                            <h1 class="app-setting__h1">JavaScript is disabled in your browser.</h1>

                            <span class="app-setting__text">Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </noscript>

    <?php echo \Livewire\Livewire::scripts(); ?>

    <?php echo notifyJs(); ?>
    <?php echo $__env->make('layouts.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('scripts'); ?>
    <!-- fjkgjkjgkdjg -->
    <?php echo $__env->yieldPushContent('js'); ?>
    <?php echo $settings->footer_code; ?>


</body>
</html>
<?php /**PATH /opt/lampp/htdocs/laravel/dashboard/resources/views/layouts/app.blade.php ENDPATH**/ ?>