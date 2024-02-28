@extends('layouts.base')
@push('styles')
    <link id="color-link" rel="stylesheet" type="text/css" href="assets/css/demo2.css">
    <style>
        nav svg{
            height : 20px;
        }
    </style>
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
            <div class="row">
                <div class="col-12">
                    <h3>Shop</h3>
                    <nav>
                        <ol class="breadcrumb" style="background: transparent">
                            <li class="breadcrumb-item">
                                <a href="{{route('app.index')}}">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 category-side col-md-4">
                    <div class="category-option">
                        <div class="button-close mb-3">
                            <button class="btn p-0"><i data-feather="arrow-left"></i> Close</button>
                        </div>
                        <div class="accordion category-name" id="accordionExample">
                            <div class="accordion-item category-rating">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo">
                                        Brand
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body category-scroll">
                                        <ul class="category-list">
                                            @foreach ($brand as $br)
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" id="br{{$br->id}}" name="brand" @if(in_array($br->id,explode(',',$q_brand))) checked="checked" @endif
                                                    value="{{$br->id}}" type="checkbox" onchange="filterProductByBrand()">
                                                    <label class="form-check-label"><a href="" style="color:black;">{{$br->name}}</a></label>
                                                    <p class="font-light">({{ $br->products ? $br->products->count() : 0 }})</p>
                                                </div>
                                            </li>  
                                            @endforeach 
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item category-rating">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSix">
                                        Category
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne">
                                    <div class="accordion-body category-scroll">
                                        <ul class="category-list">
                                            @foreach ($category as $cat )
                                                <li>
                                                    <div class="form-check ps-0 custome-form-check">
                                                        <input class="checkbox_animated check-it" id="ct{{$cat->id}}" name="category"
                                                            type="checkbox" value="{{$cat->id}}" @if(in_array($cat->id,explode(',',$q_category))) checked="checked" @endif onchange="filterProductByCategory()">
                                                        <label class="form-check-label"><a href="" style="color:black;">{{$cat->name}}</a></label>
                                                        <p class="font-light">({{ $cat->products ? $cat->products->count() : 0 }})</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="category-product col-lg-9 col-12 ratio_30">

                    <div class="row g-4">
                        <!-- label and featured section -->
                        <div class="col-md-12">
                            <ul class="short-name">
                            </ul>
                        </div>
                        <div class="col-12">
                            <div class="filter-options">
                                <div class="select-options">
                                    <div class="page-view-filter">
                                        {{-- <div class="dropdown select-featured">
                                            <select class="form-select" name="orderby" id="orderby">
                                                <option value="-1" {{$order == -1 ? 'selected' : ''}}>Default</option>
                                                <option value="1" {{$order == 1 ? 'selected' : ''}}>Date, New To Old</option>
                                                <option value="2" {{$order == 2 ? 'selected' : ''}}>Date, Old To New</option>
                                                <option value="3" {{$order == 3 ? 'selected' : ''}}>Price, Low To High</option>
                                                <option value="4" {{$order == 4 ? 'selected' : ''}}>Price, High To Low</option>
                                            </select>
                                        </div> --}}
                                    </div>
                                    <div class="dropdown select-featured">
                                        {{-- <select class="form-select" name="size" id="pagesize">
                                            <option value="12" {{$size == 12 ? 'selected' : ''}}>12 Products Per Page</option>
                                            <option value="24" {{$size == 12 ? 'selected' : ''}}>24 Products Per Page</option>
                                            <option value="52" {{$size == 12 ? 'selected' : ''}}>52 Products Per Page</option>
                                            <option value="100" {{$size == 12 ? 'selected' : ''}}>100 Products Per Page</option>
                                        </select> --}}
                                    </div>
                                </div>
                                <div class="grid-options d-sm-inline-block d-none">
                                    <ul class="d-flex">
                                        <li class="two-grid">
                                            <a href="javascript:void(0)">
                                                <img src="assets/svg/grid-2.svg" class="img-fluid blur-up lazyload"
                                                    alt="">
                                            </a>
                                        </li>
                                        <li class="three-grid d-md-inline-block d-none">
                                            <a href="javascript:void(0)">
                                                <img src="assets/svg/grid-3.svg" class="img-fluid blur-up lazyload"
                                                    alt="">
                                            </a>
                                        </li>
                                        <li class="grid-btn active d-lg-inline-block d-none">
                                            <a href="javascript:void(0)">
                                                <img src="assets/svg/grid.svg" class="img-fluid blur-up lazyload"
                                                    alt="">
                                            </a>
                                        </li>
                                        <li class="list-btn">
                                            <a href="javascript:void(0)">
                                                <img src="assets/svg/list.svg" class="img-fluid blur-up lazyload"
                                                    alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- label and featured section -->

                    <!-- Prodcut setion -->
                    <div class="row g-sm-4 g-3 row-cols-lg-4 row-cols-md-3 row-cols-2 mt-1 custom-gy-5 product-style-2 ratio_asos product-list-section">
                        @foreach ($product as $pr)
                            
                        <div>
                            <div class="product-box">
                                <div class="img-wrapper">
                                    <div class="front">
                                        <a href="{{route('users.shopdetails', ['id'=>$pr->id])}}">
                                            <img src="{{ asset('storage/userpic/product/'.$pr->product_image) }}"
                                                class="bg-img blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="{{route('users.shopdetails', ['id'=>$pr->id])}}">
                                            <img src="{{ asset('storage/userpic/product/'.$pr->product_image) }}"
                                                class="bg-img blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                    <div class="cart-wrap">
                                        <ul>
                                        
                                            <li>
                                                <a href="{{route('users.shopdetails', ['id'=>$pr->id])}}">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>
                                            {{-- <li>
                                                <a href="javascript:void(0)" class="wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li> --}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <div class="rating-details">
                                        <span class="font-light grid-content">{{$pr->category->name}}</span>
                                    </div>
                                    <div class="main-price">
                                        <a href="{{route('users.shopdetails', ['id'=>$pr->id])}}" class="font-default">
                                            <h5 class="ms-0">{{$pr->product_name}}</h5>
                                        </a>
                                        <div class="listing-content">
                                            <span class="font-light">{{$pr->category->name}}</span>
                                            <p class="font-light">{{$pr->description}}</p>
                                        </div>
                                        <h3 class="theme-color">Rp{{$pr->harga}}</h3>
                                        <button class="btn listing-content">Add To Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                 

                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section end -->
   <form id="frmFilter" method="GET" >
        {{-- <input type="hidden" name="page" id="page" value="{{$page}}">
        <input type="hidden" name="size" id="size" value="{{$size}}">
        <input type="hidden" name="order" id="order" value="{{$order}}"> --}}
        <input type="hidden" name="brand" id="brand" value="{{$q_brand}}"/>
        <input type="hidden" name="category" id="category" value="{{$q_category}}"/>
   </form>
@endsection
@push('scripts')
    <script>
        $("#pagesize").on("change",function(){
            $("#size").val($("#pagesize option:selected").val());
            $("#frmFilter").submit();
        })
        $("#orderby").on("change", function(){
            $("#order").val($("#orderby option:selected").val());
            $("#frmFilter").submit();

        })
        function filterProductByBrand(){
            var brand = "";
            $("input[name='brand']:checked").each(function(){
                if (brand==""){
                    brand += this.value;
                }
                else{
                    brand += "," + this.value;
                }
            });
            $("#brand").val(brand);
            $("#frmFilter").submit(); 
        }
        function filterProductByCategory(){
            var category = "";
            $("input[name='category']:checked").each(function(){
                if (category==""){
                    category += this.value;
                }
                else{
                    category += "," + this.value;
                }
            });
            $("#category").val(category);
            $("#frmFilter").submit(); 
        }
    </script>
@endpush