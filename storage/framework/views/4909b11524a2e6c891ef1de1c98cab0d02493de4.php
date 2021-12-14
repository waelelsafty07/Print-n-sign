<?php $__env->startSection('styles'); ?>
<style type="text/css">
    .croppie-container .cr-viewport{
            box-shadow: 0 0 2000px 2000px rgba(0,0,0,0.5)!important;
    }
    .cr-image{
    	opacity: 1; transform: translate3d(-26.8762px, -9.88808px, 0px) scale(1.0007); transform-origin: 176.876px 159.888px;
    }
    .ltr , .ltr *{
        direction: ltr!important;
        text-align: unset;
    }
</style>
<?php $__env->stopSection(); ?>
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
  <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?php echo e($page_title); ?></h3>
          </div>
        <div class="card-body">
          <?php echo Form::open(['url'=>route('admin.products.store'), 'files' => true]); ?>

          <form livewire:files-viewer />
                  <?php echo csrf_field(); ?>
                  
    <div class="row">

          <div class="col-6">
              <div class="form-group mt-2">
                <?php echo Form::label('name', 'Product Name*'); ?>

                <?php echo Form::text('name',old('name'),['class'=>'form-control']); ?>

              </div>
              <div class="form-group mt-2">
                <?php echo Form::label('small_description', 'Small_description*'); ?>

                <?php echo Form::text('small_description',old('small_descriptio'),['class'=>'form-control']); ?>

              </div>
              <div class="form-group mt-2">
                <?php echo Form::label('uploadfiles', 'Upload Iamge*'); ?>

              </div>
              <img src="" data-fancybox />

              <div class="fancybox">
                  <img src="" />
              </div>
              <div class="col-12  px-0 mt-2 px-0">
                  <div class="col-12 mt-2" style="overflow: hidden">
                      <div class="col-12 px-0" id="file-uploader-nafezly-second">
                          <input type="hidden" name="uploaded_files" value="" class="file-uploader-uploaded-files">
                          <input name="file" type="file" multiple class="file-uploader-files" data-fileuploader-files="" style="opacity: 0" />
                      </div>
                  </div>
              </div>
      </div>


      <div class="col-6">

              <div class="form-group mt-2">
                  <?php echo Form::label('category_id', 'Category*'); ?>

                <?php echo Form::select('category_id',App\Models\Categories::pluck('name','id'),null, ['class'=>'form-control','id'=>'SelectorCategory','placeholder'=>'Select Category']); ?>


              </div>
              <div id ="SelectorSubCategory"class="form-group mt-2">
                <?php echo Form::label('subcategory_id', 'SubCategory*'); ?>

                <?php echo Form::select('subcategory_id',[],null, ['class'=>'form-control','id'=>'subcategory_id','placeholder'=>'Select Category']); ?>

              </div>
              <div class="form-group mt-2" id ="points-highlight">
                <?php echo Form::label('points', 'Point Highlight*'); ?>

                <?php echo Form::text('points[]',old('points[]'),['class'=>'form-control']); ?>

              </div>
              <a class="btn btn-primary mt-2" id="btn-plus"><i class="fa fa-plus"></i></a>
              </div>
              <div class="form-group mt-2">
                <?php echo Form::label('description', 'Description*'); ?>

                <?php echo Form::textarea('description',old('description'),['class'=>'form-control']); ?>

              </div>
             
            </div>
            
            <?php echo Form::submit('Add',['class'=>'btn btn-primary mt-2','placeholder' => '..................']); ?>

                <?php echo Form::close(); ?>

      </div>

      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('admin.templates.dropzone',[
		'selector'=>'#file-uploader-nafezly-second',
		'url'=> route('admin.upload.file'),
		'method'=>'POST',
		'remove_url'=>route('admin.upload.remove-file'),
		'remove_method'=>'POST',
		'enable_selector_after_upload'=>'#submitEvaluation',
		'max_files'=>100,
		'max_file_size'=>'50',
		'accepted_files'=>"['image/*']"
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php


          
?>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.js"></script>
<script type="text/javascript">
  $('#btn-plus').on('click', function(){ 
    $('#points-highlight').append($('<input class="form-control mt-1" name="points[]" type="text">'));
  });
  $('#SelectorSubCategory').hide();
  $('#SelectorCategory').on('change',function(){
  $('#SelectorSubCategory').hide();
  $('#SelectorSubCategory')
    .find('option')
    .remove()
    .end();
  let values = $('#SelectorCategory').val();
  let url = $(location).attr('hostname');
  console.log(url);
    $.ajax({
      url: `ajax/${values}`,
      type: `get`,
      success: function (response) {
        // console.log(response);
        if (!$.trim(response)){   
          $('#SelectorSubCategory').hide();
            // $('#subcategory_id').
        }
        else{   
          console.log(response);
          $('#SelectorSubCategory').show();
          for (var i = 0; i <response.length; i++) {

            $('#subcategory_id').append($('<option>', { 
                value: response[i].id,
                text : response[i].name 
            }));
          }
          
        }
        // if(response.length > 0) {
        //   
        // }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      }
    });
  });
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel/dashboard/resources/views/admin/products/create.blade.php ENDPATH**/ ?>