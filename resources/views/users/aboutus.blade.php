@extends('layouts.base')
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
                    <h3>About Us</h3>
                    <nav>
                        <ol class="breadcrumb" style="background: transparent">
                            <li class="breadcrumb-item">
                                <a href="{{route('app.index')}}">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- team leader section Start -->
    <section class="overflow-hidden">
        <div class="container">
            <div class="row g-5">
                <div class="col-xl-5 offset-xl-1">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <img src="{{asset('assets/images/aboutus1.jpg')}}"
                                class="img-fluid rounded-3 about-image" alt="">
                        </div>
                        <div class="col-md-6">
                            <img src="{{asset('assets/images/aboutus3.jpg')}}"
                                class="img-fluid rounded-3 about-image" alt="">
                        </div>
                        <div class="col-12 ratio_40">
                            <div>
                                <img src="{{asset('assets/images/aboutus32.jpg')}}"
                                    class="img-fluid rounded-3 team-image bg-img" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-5">
                    <div class="about-details">
                        <div>
                            <h2>WHO WE ARE</h2>
                            <h3>ARventure: Your Premier Online Destination for Camping Essentials</h3>
                            <p>Welcome to ARventure, your ultimate online fashion destination for all your camping needs. 
                                We are a leading platform that caters to outdoor enthusiasts, providing a wide range of camping essentials to make your outdoor experience unforgettable. Discover the beauty of the great outdoors with ARventure. Our carefully selected camping gear is designed 
                                to elevate your outdoor experience. Immerse yourself in nature with confidence, knowing that you have the best equipment at your disposal. </p>
                          
                            <p>At ARventure, we prioritize quality and service to provide you with an exceptional shopping experience. Our camping essentials are crafted 
                                with precision and durability, ensuring they stand up to the challenges of the wilderness. ARventure is your trusted partner for all your camping needs.
                                Embark on your next adventure with ARventure Where Outdoor Excellence Meets Unmatched Style!</p>
                                <br>
                                <br>
                                <a class="btn btn-outline-success btn-sm" style="margin-left:-595px;margin-top:-40px;" href="{{route('shop.index')}}"><span class="" >
                                    SHOP NOW
                                    </span></a>
                            {{-- <button onclick="location.href = 'shop.php';" type="button"
                                class="btn btn-solid-default">Shop Now</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team leader section End -->
@endsection