@extends('layouts.admin')
@section('content')
<style type="text/css">
	.settings-tab-opener{
		box-shadow: 0px 6px 12px #ebebeb;
    	border-radius:11px;
    	cursor: pointer;
    	width:80px;height: 45px;
	}
	.settings-tab-opener.active{
		box-shadow: 0px 6px 12px #c8e0ff!important;
		color: #fff;
		background: #2196f3;
	}
	.taber:not(.active){
		display: none;
	}
	
</style>
<div class="col-12 py-0 px-3 row">
	
	 <div class="col-12  p-0" style="background: #fff;min-height: 80vh">

	 	<div class="col-12 px-3 py-4">
	 		<h4 class="font-4">Settings Website</h4>
	 	</div>

	 	<div class="col-12 row" >
			<div class="d-flex justify-content-center align-items-center p-0 m-2 settings-tab-opener active" data-opentab="general-tab">
					Genral <span  class="fal fa-wrench me-2"></span>
			</div>
			<div class="d-flex justify-content-center align-items-center p-0 m-2 settings-tab-opener" data-opentab="appearance-tab">
					Themes <span  class="fal fa-paint-roller me-2"></span>
			</div>
			<div class="d-flex justify-content-center align-items-center p-0 m-2 settings-tab-opener" data-opentab="links-tab">
				Links <span  class="fal fa-link me-2"></span>	
			</div>
			<div class="d-flex justify-content-center align-items-center p-0 m-2 settings-tab-opener" data-opentab="pages-tab">
					Pages <span  class="fal fa-pager me-2"></span>
			</div>
			<div class="d-flex justify-content-center align-items-center p-0 m-2 settings-tab-opener" data-opentab="codes-tab">
					Coding <span  class="fal fa-code me-2"></span>
			</div>
			<div class="d-flex justify-content-center align-items-center p-0 m-2 settings-tab-opener" data-opentab="others-tab">
				others <span  class="fal fa-cogs me-2"></span>	
			</div>
		</div>

	 	<form class="col-12 row " id="validate-form" method="POST" action="{{route('admin.settings.update')}}" enctype="multipart/form-data" >
	 	@csrf
	 	@method("PUT")
	 	
	 	<div class="col-12 col-lg-8 px-3 py-5">
	 		 
	 		<div class="col-12 row p-0 taber active" id="general-tab">
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				Website Name
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="" name="website_name" class="form-control" value="{{$settings->website_name}}"  maxlength="190">
		 			</div> 
		 		</div>
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				Address
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<textarea name="address" class="form-control">{{$settings->address}}</textarea>
		 			</div> 
		 		</div>
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				Description
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<textarea name="website_bio" class="form-control">{{$settings->website_bio}}</textarea>
		 			</div> 
		 		</div>

		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				Email Address
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="email" name="contact_email" class="form-control" value="{{$settings->contact_email}}" >
		 			</div> 
		 		</div>
		 		 

		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				Logo website
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="file" name="website_logo" class="form-control" >
		 				<div class="col-12 p-2">
		 					<img src="{{$settings->website_logo()}}" style="width:100px;max-height: 100px;">
		 				</div>
		 			</div> 
		 		</div>
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				WideLogo
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="file" name="website_wide_logo" class="form-control" >
		 				<div class="col-12 p-2">
		 					<img src="{{$settings->website_wide_logo()}}" style="width:100px;max-height: 100px;">
		 				</div>
		 			</div> 
		 		</div>
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				Small Picture
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="file" name="website_icon" class="form-control" >
		 				<div class="col-12 p-2">
		 					<img src="{{$settings->website_icon()}}" style="width:100px;max-height: 100px;">
		 				</div>
		 			</div> 
		 		</div>
	 		</div>
	 		<div class="col-12 row p-0 taber" id="appearance-tab">
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				Cover Website
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="file" name="website_cover" class="form-control" >
		 				<div class="col-12 p-2">
		 					<img src="{{$settings->website_cover()}}" style="width:100px;max-height: 100px;">
		 				</div>
		 			</div> 
		 		</div>

		 		
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				Color Main
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="color" name="main_color"  value="{{$settings->main_color}}" maxlength="190">
		 			</div> 
		 		</div>
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				Second Color
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="color" name="hover_color"  value="{{$settings->hover_color}}" maxlength="190">
		 			</div> 
		 		</div>
		 		
		 	</div>
		 	<div class="col-12 row p-0 taber" id="links-tab">
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				Number Phone
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="" name="phone" class="form-control" value="{{$settings->phone}}" maxlength="190">
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
				 Number Phone 2
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="" name="phone2" class="form-control" value="{{$settings->phone2}}" maxlength="190">
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				Whatsapp 
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="" name="whatsapp_phone" class="form-control" value="{{$settings->whatsapp_phone}}" >
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				Facebook Link
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="facebook_link" class="form-control" value="{{$settings->facebook_link}}" >
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				Twitter Link
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="twitter_link" class="form-control" value="{{$settings->twitter_link}}" >
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				Instagram Link
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="instagram_link" class="form-control" value="{{$settings->instagram_link}}" >
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				youtube Link
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="youtube_link" class="form-control" value="{{$settings->youtube_link}}" >
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				Telegram Link
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="telegram_link" class="form-control" value="{{$settings->telegram_link}}" >
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				Whatsapp Link
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="whatsapp_link" class="form-control" value="{{$settings->whatsapp_link}}" >
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				tiktok link
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="tiktok_link" class="form-control" value="{{$settings->tiktok_link}}" >
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				Website Link
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="nafezly_link" class="form-control" value="{{$settings->nafezly_link}}" >
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				Linkedin Link
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="linkedin_link" class="form-control" value="{{$settings->linkedin_link}}" >
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				Github Link
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="github_link" class="form-control" value="{{$settings->github_link}}" >
	 			</div> 
	 		</div>
	 		

	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<br>
	 			<hr>
	 		</div>

	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
				 custom link 1
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="another_link1" class="form-control" value="{{$settings->another_link1}}" >
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
				 custom link 2
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="another_link2" class="form-control" value="{{$settings->another_link2}}" >
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
				 custom link 3
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="another_link3" class="form-control" value="{{$settings->another_link3}}" >
	 			</div> 
	 		</div>

	 	</div>
	 	<div class="col-12 row p-0 taber" id="pages-tab">
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
				 Privacy policy
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<textarea  name="privacy_page" class="form-control editor with-file-explorer">{{$settings->privacy_page}}</textarea>
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
				 Terms of use
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<textarea  name="terms_page" class="form-control editor with-file-explorer">{{$settings->terms_page}}</textarea>
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				About Us
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<textarea  name="about_page" class="form-control editor with-file-explorer">{{$settings->about_page}}</textarea>
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				Contact Us
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<textarea  name="contact_page" class="form-control editor with-file-explorer">{{$settings->contact_page}}</textarea>
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<br>
	 			<hr>
	 		</div>
	 	</div>
	 	<div class="col-12 row p-0 taber" id="codes-tab">
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				Code Header
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<textarea name="header_code" class="form-control" style="min-height: 200px;text-align: left;direction: ltr;">{{$settings->header_code}}</textarea>
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
				 Code Footer
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<textarea name="footer_code" class="form-control" style="min-height: 200px;text-align: left;direction: ltr;">{{$settings->footer_code}}</textarea>
	 			</div> 
	 		</div> 
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				File robots
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<textarea name="robots_txt" class="form-control" style="min-height: 200px;text-align: left;direction: ltr;">{{$settings->robots_txt}}</textarea>
	 			</div> 
	 		</div>
	 	</div>
	 	<div class="col-12 row p-0 taber" id="others-tab">
	 	</div>

	 </div>
 
	 	<div class="col-12 col-lg-8 px-0 d-flex mb-3 row pb-3">
 		 	
 		 	<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<button class="btn pb-2 px-4" style="background: #ffa725;border-radius: 0px;color: #fff ">Save Changes</button>
	 			</div> 
	 		</div> 

 		</div>

	  	</form>
	 </div> 
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	$('.settings-tab-opener').on('click',function(){
		$('.settings-tab-opener').removeClass('active');
		$(this).addClass('active');
		var open_id = $(this).attr('data-opentab');
		$('.taber').removeClass('active');
		$('.taber#'+open_id).addClass('active');
	});
</script>
@endsection