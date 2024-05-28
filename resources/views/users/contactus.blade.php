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
                    <h3>Contact Us</h3>
                    <nav>
                        <ol class="breadcrumb" style="background: transparent">
                            <li class="breadcrumb-item">
                                <a href="{{route('app.index')}}">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-section">
        <div class="container">
            @if(session()->has('message'))
                <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
                </div>
            @endif
            <br>
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="materialContainer">
                        <div class="material-details">
                            <div class="title title1 title-effect mb-1 title-left">
                                <h2>Send Us Message</h2>
                            </div>
                        </div>
                        <form action="{{route('users.sendmessage')}}" method="POST">
                            @csrf
                            <div class="row g-4 mt-md-1 mt-2">
                                <div class="col-md-6">
                                    <label for="first" class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$loggedInUser->name}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="email2" class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="no_telepon" id="no_telepon"
                                        value="{{$loggedInUser->no_telepon}}">
                                </div>
                                <div class="col-md-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                    value="{{$loggedInUser->email}}">
                                </div>
                                <div class="col-12">
                                    <label for="comment" class="form-label">Content</label>
                                    <textarea class="form-control" name="content" id="comment" rows="5" required=""></textarea>
                                </div>

                                <div class="col-auto">
                                    <button class="btn btn-solid-default" type="submit">Submit</button>
                                    <a class="btn btn-outline-success btn-sm" style="margin-left:30px;margin-top:3px;" href="{{route('app.index')}}"><span class="material-symbols-outlined" >
                                        keyboard_backspace
                                        </span></a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="col-lg-4" >
                    <div class="contact-details" style="background-color: white ">
                        <div>
                            <h2>Let's get in touch</h2>
                            <h5 class="font-light">We're open for any suggestion or just to have a chat</h5>
                            <div class="contact-box">
                                <div class="contact-icon">
                                    <i data-feather="map-pin"></i>
                                </div>
                                <div class="contact-title">
                                    <h4>Address :</h4>
                                    <p>Jl. Raya ITS Politeknik Elektronika, Kampus ITS Sukolilo, Keputih, Sukolilo, Kota SBY, Jawa Timur</p>
                                </div>
                            </div>

                            <div class="contact-box">
                                <div class="contact-icon">
                                    <i data-feather="phone"></i>
                                </div>
                                <div class="contact-title">
                                    <h4>Phone Number :</h4>
                                    <p>+62 81234567891</p>
                                </div>
                            </div>

                            <div class="contact-box">
                                <div class="contact-icon">
                                    <i data-feather="mail"></i>
                                </div>
                                <div class="contact-title">
                                    <h4>Email Address :</h4>
                                    <p>arventure@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection
