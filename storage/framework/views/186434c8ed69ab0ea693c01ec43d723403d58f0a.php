<?php $__env->startSection('after-body'); ?>
<button data-bs-toggle="modal" data-bs-target="#changeAvatar" id="changeAvatarBtn" class="d-none"></button>
<div class="modal fade" id="changeAvatar" tabindex="-1" aria-labelledby="changeAvatarLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:394px;max-width: 100%">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changeAvatarLabel">Change Category Picture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
        <div class="col-12 p-2" style="background: #fff;overflow: hidden;position: relative;max-width: 100%!important">
            <div class="col-12 ltr">
                <img class="my-image" src="" id="avatar-image-selector" style="z-index: 45454" />
            </div>
            <div class="col-12 text-left
             mt-3">
                <button class="btn btn-secondary mx-1 font-1" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button class="btn btn-primary mx-1 font-1 save-image" >Change Picture</button>
            </div>
        </div>

      </div> 
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

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
            <div class="form-group mt-2">
                <?php echo Form::file('image', ['id'=>'avatar-image', 'class'=>'form-control']); ?>

                <?php echo Form::hidden('avatar', null, ['id'=>'encoded_image']); ?>

            </div> 
            <img src="" style="width:150px;max-width: 100%;   padding: 2rem 0; float: right;" id="getUserAvatar">
            
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

<?php $__env->startSection('scripts'); ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.js"></script>
<script type="text/javascript">
$(document).ready(function() { 
        var $uploadCrop = $('#avatar-image-selector').croppie({
            aspectRatio:1,
            viewport: {
                width: 300,
                height: 300,
                type: 'square'
            },
            boundary: {
                width: 350,
                height: 350
            },
            enableExif: true
        }); 

        function readFile(input) { 
            if (input.files && input.files[0]) {
                var reader = new FileReader(); 
                reader.onload = function (e) {
                    $('#changeAvatarBtn').click();
                    $uploadCrop.croppie('bind', {
                        url: e.target.result
                    }).then(function(){  
                        
                    }); 
                }          
                reader.readAsDataURL(input.files[0]); 
                $('.cr-image').css(
                     {
                        'transform':'translate3d(0px, 0px, 0px) scale(0.9787)',
                        'transform-origin':'0px 0px'
                     }
                 ); 
                 $('.cr-overlay').css(
                    {
                        'width':'667.8px',
                        'height':'667.8px',
                        'top':'-26.2914px',
                        'left':'-129.291px',
                        'cr-overlay':'5'
                    }
                 );
                 $('.cr-slider').attr({'min':0.1, 'max':1.5}); 
            }
            else { 
            }
        }
        function popupResult(result) { 
        	$('#getUserAvatar').attr('src',result.src);
        	$('#changeAvatar .btn-close').click();
        	$('#encoded_image').val(result.src);

        } 

        $('#avatar-image').on('change', function () { 
            readFile(this); 
        });
        $('.save-image').on('click', function (ev) {
            $uploadCrop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function (resp) {
                popupResult({
                    src: resp
                });
            });
        });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel/dashboard/resources/views/admin/categories/subcategories/create.blade.php ENDPATH**/ ?>