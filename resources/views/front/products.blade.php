@extends('layouts.app')
@section('content')

	@include('front.layouts.header')


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

    @include('front.layouts.contact')
<!--====== Section Content ======-->
</div>
<!--====== End - Section 1 ======-->

	</div>
@endsection