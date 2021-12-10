<?php $__env->startSection('content'); ?>
<style type="text/css">
    #navbar{
        display: none;
    }
    body{
        background: #fff;
    }
</style>
<div class="col-12 p-0 row">
    <div class="col-12 col-md-6 text-center p-0" style="">
        <div class="col-12 p-4 align-items-center justify-content-center d-flex row" style="height:100vh">
            <div class="col-12 p-0">
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                       
                        <div class="col-12 p-0 mb-5" style="width: 100%;max-width: 100%;">
                            <h3 class="mb-4">Login</h3>
                             <div class="divider"></div>
                        </div>
                        <div class="form-group row mb-3 ">
                            <label for="email" class="col-md-2 col-form-label text-md-end" style="margin: 0 0 0 8rem;">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group row mb-3 ">
                            <label for="password" class="col-md-2 col-form-label text-md-end" style="margin: 0 0 0 8rem;">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">

                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group row mb-3 ">
                            <div  class="col-md-4 col-form-label text-md-end"></div>
                            <div class="col-md-6">
                                <input class="form-check-input ml-2 me-0" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?> style="position:relative;float: right; ">

                                <label class="form-check-label" for="remember" style="position:relative;float: right;">
                                   remamber me
                                </label>
                            </div>
                        </div>
 

                        <div class="form-group row mb-3  mb-0">
                            <div class="col-md-8 offset-md-4 ">

                                <button type="submit" class="btn btn-primary">
                                   Login
                                </button>

                                
                            </div>
                            <?php if(Route::has('password.request')): ?>
                                    <a class="btn btn-link text-center" href="<?php echo e(route('password.request')); ?>">
                                       I forgot my password
                                    </a>
                                <?php endif; ?>
                        </div>
                    </form>
                    
                </div>
        </div>
    </div>
    <div class="col-12 col-md-6 p-0 d-none d-md-block" >
            <div style="height: 100vh;background-image: url('<?php echo e(asset('/images/auth-backgroud.jpg')); ?>');object-fit: cover;    vertical-align: middle;background-size: cover;background-repeat: no-repeat;"></div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel/dashboard/resources/views/auth/login.blade.php ENDPATH**/ ?>