@extends('layouts.app')
@section('content')

	@include('front.layouts.header')

                    <!--====== Product Detail Tab ======-->
            <div class="u-s-p-t-90">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">

                            <!--====== Product Detail Zoom ======-->
                            <div class="pd u-s-m-b-30">
                                <div class="slider-fouc pd-wrap">
                                    <div id="pd-o-initiate">
                                        @foreach($images as $img)
                                        <div class="pd-o-img-wrap" data-src="{{env('STORAGE_URL').'/uploads/website/'.$img->imageproducts_name}}">
                                            <img class="u-img-fluid" src="{{env('STORAGE_URL').'/uploads/website/'.$img->imageproducts_name}}" data-zoom-image="{{env('STORAGE_URL').'/uploads/website/'.$img->imageproducts_name}}" alt=""></div>
                               
                                            @endforeach
                                    </div>

                                    <span class="pd-text">Click for larger zoom</span>
                                </div>
                                <div class="u-s-m-t-15">
                                    <div class="slider-fouc">
                                        <div id="pd-o-thumbnail">
                                            @foreach($images as $img)
                                            <div>

                                                <img class="u-img-fluid" src="{{env('STORAGE_URL').'/uploads/website/'.$img->imageproducts_name}}" alt=""></div>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--====== End - Product Detail Zoom ======-->
                        </div>
                        <div class="col-lg-7">

                            <!--====== Product Right Side Details ======-->
                            <div class="pd-detail">
                                <div>

                                    <span class="pd-detail__name">{{$products[0]->products_name}}</span></div>
                                
                                <div class="u-s-m-b-15">

                                    <span class="pd-detail__preview-desc">{{$products[0]->small_description}}</span>
                                </div>
                                <div class="u-s-m-b-15">

                                    <span class="pd-detail__preview-desc">{{$products[0]->description}}</span>
                                </div>
                                
                                <div class="u-s-m-b-15">
                                    <div class="pd-detail__inline">

                                        <span class="pd-detail__click-wrap"><i class="far fa-envelope u-s-m-r-6"></i>

                                            <a href="mailto:{{$settings->contact_email}}">Email Us </a>

                                        </div>
                                </div>
                                <div class="u-s-m-b-15 mt-5">
                                    <div class="pd-detail__label u-s-m-b-8" style="color:black;">
                                        Highlights:-
                                    </div>
                                    <ul class="mt-2 ml-2">
                                    @foreach($points as $point)
                                    <li>
                                        <i class="fas fa-check-circle u-s-m-r-8" style="color:green;"></i>
                                        {{$point->name_points}}
                                    </li>
                                    @endforeach
                                    </ul>
                                    
                                </div>
                                <div class="u-s-m-b-15">
                                    <ul class="pd-social-list">
                                        @if($settings->facebook_link)
                                        <li>
                                            <a class="s-fb--color-hover" href="{{$settings->facebook_link}}"><i class="fab fa-facebook-f"></i></a></li>
                                        @endif
                                        @if($settings->twitter_link)
                                        <li>
                                        
                                            <a class="s-tw--color-hover" href="{{$settings->twitter_link}}"><i class="fab fa-twitter"></i></a></li>
                                        @endif
                                        @if($settings->youtube_link)
                                        <li>

                                            <a class="s-youtube--color-hover" href="{{$settings->youtube_link}}"><i class="fab fa-youtube"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="u-s-m-b-15">
                                    <form class="pd-detail__form">
                                        <div class="pd-detail-inline-2">
                                            <div class="u-s-m-b-15">

                                                <button class="btn btn--e-brand-b-2" type="submit">Contact Us</button></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--====== End - Product Right Side Details ======-->
                        </div>
                    </div>
                </div>
            </div>

    @include('front.layouts.contact')
@endsection