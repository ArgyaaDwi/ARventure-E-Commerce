@extends('layouts.base')
@push('styles')
    <link id="color-link" rel="stylesheet" type="text/css" href="{{asset('assets/css/demo2.css')}}">
@endpush
@section('content')
    <section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
            </div>
        @endif
            <div class="row">
                <div class="col-12">
                    <h3>{{$product->product_name}}</h3>
                    <nav>
                        <ol class="breadcrumb" style="background: transparent">
                            <li class="breadcrumb-item">
                                <a href="{{route('app.index')}}">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                       
                            <li class="breadcrumb-item active" aria-current="page">{{$product->product_name}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section> 
    <section>
        <div class="container">
            <div class="row gx-4 gy-5">
                <div class="col-lg-12 col-12">
                    <div class="details-items">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-1">
                                        <div class="details-image-vertical black-slide rounded">
                                            <div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-11">
                                        <div class="details-image-1 ratio_asos">
                                            <div>
                                                <img src="{{ asset('storage/userpic/product/'.$product->product_image) }}" class="img-fluid w-100  image_zoom_cls-0 blur-up lazyload" alt="{{$product->product_name}}">
                                            </div>
                                            <div>
                                                <img src="../assets/images/fashion/2.jpg" id="zoom_02"
                                                    data-zoom-image="assets/images/fashion/2.jpg"
                                                    class="img-fluid w-100 image_zoom_cls-1 blur-up lazyload" alt="">
                                            </div>
                                            <div>
                                                <img src="../assets/images/fashion/3.jpg" id="zoom_03"
                                                    data-zoom-image="assets/images/fashion/3.jpg"
                                                    class="img-fluid w-100 image_zoom_cls-2 blur-up lazyload" alt="">
                                            </div>
                                            <div>
                                                <img src="../assets/images/fashion/4.jpg" id="zoom_04"
                                                    data-zoom-image="assets/images/fashion/4.jpg"
                                                    class="img-fluid w-100 image_zoom_cls-3 blur-up lazyload" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="cloth-details-size">
                                    <div class="details-image-concept">
                                        <h2>{{$product->product_name}}</h2>
                                    </div>
                                    <h3 class="price-detail">Rp{{$product->harga}}</h3>
                                    <div id="selectSize" class="addeffect-section product-description border-product">
                                        <h6 class="product-title product-title-2 d-block">quantity</h6>
                                        <div class="qty-box">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <button type="button" class="btn quantity-left-minus" onclick="updateQuantity(-0)" data-type="minus" data-field="">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </span>
                                                <input type="text" name="quantity" id="quantity" class="form-control input-number" value="1">
                                                <span class="input-group-prepend">
                                                    <button type="button" class="btn quantity-right-plus" onclick="updateQuantity(0)" data-type="plus" data-field="">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-buttons">
                                        @if ($product->stock > 0)
                                        <a href="javascript:void(0)" onclick="addToCart();" class="btn btn-solid hover-solid btn-animation">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span>Add To Cart</span>
                                        </a>
                                        @else
                                            <h4>Out of Stock</h4>
                                        @endif
                                    </div>
                                    <div class="mt-2 mt-md-3 border-product">
                                        <h6 class="product-title hurry-title d-block">Hurry Up! Left <span>{{$product->stock}}</span> in
                                            stock</h6>
                                    </div>
                                    <div class="border-product">
                                        <h6 class="product-title d-block">share it</h6>
                                        <div class="product-icon">
                                            <ul class="product-social">
                                                <li>
                                                    <a href="https://www.facebook.com/">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.google.com/">
                                                        <i class="fab fa-google-plus-g"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://twitter.com/">
                                                        <i class="fab fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.instagram.com/">
                                                        <i class="fab fa-instagram"></i>
                                                    </a>
                                                </li>
                                               
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="cloth-review">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#desc" type="button">Description</button>
                            </div>
                        </nav>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="desc">
                                <div class="shipping-chart">
                                    {{$product->description}}
                                </div>
                            </div>

                           
                        </div>
                    </div>
                    
                </div>
                
            </div>
          
        </div>
        <a class="btn btn-outline-success btn-sm" style="margin-left:70px;margin-top:40px;" href="{{route('shop.index')}}"><span class="material-symbols-outlined" >
            keyboard_backspace
            </span></a>
    </section>
  
    <form id="addtocart" method="post" action="{{route('cart.store')}}" style="display: none;">
        @csrf
        <input type="hidden" name="id" value="{{$product->id}}">
        <input type="hidden" name="stock" id="qty" value="1">
    </form>
@endsection
@push('scripts')
<script>
    function updateQuantity(value) {
        var quantityInput = document.getElementById('quantity');
        var currentQuantity = parseInt(quantityInput.value);
        var newQuantity = Math.max(currentQuantity + value, 1);    
        quantityInput.value = newQuantity;
    }
    
    function addToCart() {
        var quantity = document.getElementById('quantity').value;    
        document.getElementById('qty').value = quantity;    
        document.getElementById('addtocart').submit();
    }
    </script>

@endpush