
@extends('layouts.admin')
@section('styles')
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
@endsection
@section('content')

<section class="content">
  <div class="container-fluid">
  <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{$page_title}}</h3>
          </div>
        <div class="card-body">
          {!! Form::open(['url'=>route('admin.products.update',$product->id),'method'=>'PUT', 'files' => true]) !!}
          <form livewire:files-viewer />
                  @csrf
                  
    <div class="row">

          <div class="col-6">
              <div class="form-group mt-2">
                {!! Form::label('name', 'Product Name*') !!}
                {!! Form::text('name',$product->products_name,['class'=>'form-control']) !!}
              </div>
              <div class="form-group mt-2">
                {!! Form::label('small_description', 'Small_description*') !!}
                {!! Form::text('small_description',$product->small_description,['class'=>'form-control']) !!}
              </div>
      </div>


      <div class="col-6">

              <div class="form-group mt-2">
                  {!! Form::label('category_id', 'Category*') !!}
                {!! Form::select('category_id',App\Models\Categories::pluck('name','id'),$product->category_id, ['class'=>'form-control','id'=>'SelectorCategory','placeholder'=>'Select Category']) !!}

              </div>
              <div id ="SelectorSubCategory"class="form-group mt-2">
                {!! Form::label('subcategory_id', 'SubCategory*') !!}
                {!! Form::select('subcategory_id',App\Models\Subcategories::pluck('name','id'),$product->subCategory_id, ['class'=>'form-control','id'=>'subcategory_id','placeholder'=>'Select Category']) !!}
              </div>
              <div class="form-group mt-2" id ="points-highlight">
                {!! Form::label('points', 'Point Highlight*') !!}
                @foreach($points as $point)
                {!! Form::text('points[]',$point->name_points,['class'=>'form-control']) !!}
                @endforeach
              </div>
              <a class="btn btn-primary mt-2" id="btn-plus"><i class="fa fa-plus"></i></a>
              </div>
              <div class="form-group mt-2">
                {!! Form::label('description', 'Description*') !!}
                {!! Form::textarea('description',$product->description,['class'=>'form-control']) !!}
              </div>
             
            </div>
            
            {!! Form::submit('Add',['class'=>'btn btn-primary mt-2','placeholder' => '..................']) !!}
                {!! Form::close() !!}
      </div>

      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
@endsection
@section('scripts')

<?php


          
?>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.js"></script>
<script type="text/javascript">
  $('#btn-plus').on('click', function(){ 
    $('#points-highlight').append($('<input class="form-control mt-1" name="points[]" type="text">'));
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
@endsection