@extends('layouts.base')
@section('content')
<section class="pt-0 poster-section">
    <div class="right-side-contain">
        <div class="banner-left">
            <h4>The North Face</h4>
            <h1>New <span>Arrival</span></h1>
            <p>Summit Series</p>
        </div>
    </div>
</section>
<!-- category section start -->
<section class="category-section ratio_40">
        @if(Route::has('login'))
            @auth
                @if(Auth::user()->utype === 'USR')
        <div class="row gy-3">
            <div class="col-xxl-2 col-lg-3">
                <div class="category-wrap category-padding category-block theme-bg-color">
                    <div>
                        <span>Categories</span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-10 col-lg-9">
                <div class="category-wrapper category-slider1 white-arrow category-arrow">
                    @foreach ($category as $c)
                    <div>
                        <a href="" class="category-wrap category-padding">
                            <img src="{{ asset('storage/userpic/category/'.$c->image) }}" alt="" class="bg-img blur-up lazyload"
                                alt="category image">
                            <div class="category-content category-text-1">
                                <h3><span style="color: black">{{$c->name}}</span></h3>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @else
            @endif
             @endauth
        @endif
</section>
<!-- category section end -->
<!-- banner section start -->
<section class="ratio2_1 banner-style-2">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
                <div class="collection-banner p-bottom p-center text-center">
                    <a href="" class="banner-img">
                        <img src="assets/images/fashion/banner/2.png" class="bg-img blur-up lazyload" alt="">
                    </a>
                    <a href=""  class="contain-banner">
                        <div class="banner-content with-big">
                            <h2 class="mb-2">100 % Original</h2>
                            <span> Authenticity Guaranteed</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="collection-banner p-bottom p-center text-center">
                    <a href="" class="banner-img">
                        <img src="assets/images/fashion/banner/3.png" class="bg-img blur-up lazyload" alt="">
                    </a>
                    <a href="" class="contain-banner">
                        <div class="banner-content with-big">
                            <h2 class="mb-2">Good Quality</h2>
                            <span>Unparalleled Quality Products.</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="collection-banner p-bottom p-center text-center">
                    <a href="" class="banner-img">
                        <img src="assets/images/fashion/banner/4.png" class="bg-img blur-up lazyload" alt="">
                    </a>
                    <a href="" class="contain-banner">
                        <div class="banner-content with-big">
                            <h2 class="mb-2">Fast Shipping **</h2>
                            <span>You may receive it in 1-3 business days</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="collection-banner p-bottom p-center text-center">
                    <a href="" class="banner-img">
                        <img src="assets/images/fashion/banner/5.png" class="bg-img blur-up lazyload" alt="">
                    </a>
                    <a href="" class="contain-banner">
                        <div class="banner-content with-big">
                            <h2 class="mb-2">Friendly Price</h2>
                            <span>Unbeatable Quality at Wallet-Friendly Prices.</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="collection-banner p-bottom p-center text-center">
                    <a href="" class="banner-img">
                        <img src="assets/images/fashion/banner/6.png" class="bg-img blur-up lazyload" alt="">
                    </a>
                    <a href="shop-left-sidebar.html" class="contain-banner">
                        <div class="banner-content with-big">
                            <h2 class="mb-2">Shopping Bliss</h2>
                            <span>Where Joy Meets Retail Therapy!</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="collection-banner p-bottom p-center text-center">
                    <a href="" class="banner-img">
                        <img src="assets/images/fashion/banner/7.png" class="bg-img blur-up lazyload" alt="">
                    </a>
                    <a href="" class="contain-banner">
                        <div class="banner-content with-big">
                            <h2 class="mb-2">Shop Securely</h2>
                            <span>Security Measures in Place. </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner section end -->
<style>
    .products-c .bg-size {
        background-position: center 0 !important;
    }
</style>
@endsection
