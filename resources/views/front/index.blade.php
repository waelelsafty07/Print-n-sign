@extends('layouts.app')
@section('content')

	@include('front.layouts.header')
    <!--====== Main App ======-->
	<div class="app-content">
		<div class="s-skeleton s-skeleton--h-600 s-skeleton--bg-grey">
            <div class="owl-carousel primary-style-1" id="hero-slider">
                <div class="hero-slide hero-slide--1" style="background-image: url(/images/slide-1.jpg);">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-content slider-content--animation">
                                

                                <span class="content-span-2 u-c-secondary">Print n Signs</span>
                                <span class="content-span-3 u-c-secondary">Highest Quality, Cheapest Prices, Fastest Turnaround in the Town!</span>
                                    <a class="shop-now-link btn--e-brand" href="{{route('products')}}">SHOP NOW</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-slide hero-slide--2"style="background-image: url(/images/slide-2.jpg);">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-content slider-content--animation">
                                
                                <span class="content-span-2 u-c-white">🤙{{$settings->phone}}</span>
                                <span class="content-span-3 u-c-white">Contact Us</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-slide hero-slide--3"style="background-image: url(/images/slide-3.jpg);">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-content slider-content--animation">
                                    <span class="content-span-2 u-c-secondary">Why Print n Signage?</span>
                                    <span class="content-span-4 u-c-secondary">SPEED</span>
                                    <span class="content-span-3 u-c-secondary">We believe that what makes you fast, will make you successful. </span>
                                    <span class="content-span-3 u-c-secondary">We are fast and getting faster. </span>
                                    <span class="content-span-3 u-c-secondary">We are obsessed with clocks, not calendars. From 1 to 1 Million, Hudson Printing can help you go faster.</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
            <!--====== End - Primary Slider ======-->


            <!--====== Section 1 ======-->
            <div class="u-s-p-y-60">

                <!--====== Section Intro ======-->
                <div class="section__intro u-s-m-b-46">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section__text-wrap">
                                    <h1 class="section__heading u-c-secondary u-s-m-b-12">Special Offers for limited time on featured items </h1>

                                    <span class="section__span u-c-silver">BROWSE FAVOURITE OFFERS</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Intro ======-->


                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 u-s-m-b-30">

                                <a class="collection" href="shop-side-version-2.html">
                                    <div class="aspect aspect--bg-grey aspect--square">

                                        <img class="aspect__img collection__img" src="/images/urgent-business-cards1000x70028_orig.jpg" alt=""></div>
                                </a></div>
                            <div class="col-lg-7 col-md-7 u-s-m-b-30">

                                <a class="collection" href="shop-side-version-2.html">
                                    <div class="aspect aspect--bg-grey aspect--1286-890">

                                        <img class="aspect__img collection__img" src="/images/flyers-printing_orig.jpg" alt=""></div>
                                </a></div>
                            
                        </div>
                    </div>
                </div>

                <!--====== Section Content ======-->
            </div>
            <!--====== End - Section 1 ======-->


            <!--====== Section 2 ======-->
            <div class="u-s-p-b-60">

                <!--====== Section Intro ======-->
                <div class="section__intro u-s-m-b-16">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section__text-wrap">
                                    <h1 class="section__heading u-c-secondary u-s-m-b-12">Products</h1>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Intro ======-->


                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="filter__grid-wrapper u-s-m-t-30">
                                    <div class="row">
										@foreach($products as $product)
										<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item headphone">
												<div class="product-o product-o--hover-on product-o--radius">
													<div class="product-o__wrap">

														<a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

															<img class="aspect__img {{$product->id}}" src="{{$product->ProductImage()}}" alt=""></a>
														<div class="product-o__action-wrap">
															<ul class="product-o__action-list">


															</ul>
														</div>
													</div>

													<span class="product-o__category">

														<a href="{{route('productsDetails',$product->id)}}">{{\App\Models\Categories::find($product->category_id)->name}}</a>
													</span>

													<span class="product-o__name">

														<a href="{{route('productsDetails',$product->id)}}">{{$product->products_name}}</a>
													</span>
                                                    <span class="product-o__description">
                                                    {{$product->small_description}}
													</span>
                                                    
												</div>
											</div>
											@endforeach
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 2 ======-->
			 <!--====== Section 1 ======-->
			 <div class="u-s-p-y-60">

<!--====== Section Intro ======-->
<div class="section__intro u-s-m-b-46">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section__text-wrap">
					<h1 class="section__heading u-c-secondary u-s-m-b-12">Special Offers for limited time on featured items </h1>

				</div>
			</div>
		</div>
	</div>
</div>
<!--====== End - Section Intro ======-->


<!--====== Section Content ======-->
<div class="section__content">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 col-md-5 u-s-m-b-30">

				<a class="collection" href="shop-side-version-2.html">
					<div class="aspect aspect--bg-white aspect--square">

						<img class="aspect__img collection__img" src="{{$settings->website_logo()}}" alt=""></div>
				</a></div>
			<div class="col-lg-7 col-md-7 u-s-m-b-30">

						<p style="line-height:2.3rem">
														We are a professional Signage & Printing press in Dubai for quality Printing, outdoor and indoor Signage Solutions.<br> We enjoy the taste of success by providing the best services to our customers in the UAE.<br> We are master in the field of offset printing and digital printing with high-quality results.
								​In market many claims to be professional, but they lack the creative approach that we inbuilt!<br>
								With our team of experts, you will enjoy the assistance of Innovative designers and professional advertisers who have completed many projects with the installation.<br> We provide all kind of tools and manpower for signboard fixing and repair at very reasonable rates. <br>
								​We are learned professional who acquired accuracy in our jobs by the decades-long experience by providing our clients with Creative & professional Signage & Printing solutions.<br>
								Our business is to understand your exact requirements and produce a product that will enhance both your company’s image and boost your profit and turnover.
														</p>
				</div>
			
		</div>
	</div>
</div>

@include('front.layouts.contact')
<!--====== Section Content ======-->
</div>
<!--====== End - Section 1 ======-->

	</div>
@endsection