@extends('layouts.app')
<style type="text/css">
    p img,table{
        margin: auto;
    }
    ul{
        
    }

    </style>
@section('content')
	@include('front.layouts.header')
    <div class="section__intro u-s-m-b-16">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section__text-wrap">
                                    <h1 class="section__heading u-c-secondary u-s-m-b-12">FAQ</h1>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<div class="section__content">
	<div class="container">
		<div class="row" style="color:#000;">
            {!! $settings->faq_page !!}
        </div>
	</div>
</div>

@include('front.layouts.contact')
<!--====== Section Content ======-->
</div>
<!--====== End - Section 1 ======-->

	</div>
@endsection