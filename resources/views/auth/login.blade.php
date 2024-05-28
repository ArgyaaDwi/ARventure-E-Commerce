{{-- @extends('layouts.base')

@section('content')
<style>
    input [type="text"]:focus,
    [type="email"]:focus,
    [type="url"]:focus,
    [type="password"]:focus,
    [type="number"]:focus,
    [type="date"]:focus,
    [type="datetime-local"]:focus,
    [type="month"]:focus,
    [type="search"]:focus,
    [type="tel"]:focus,
    [type="time"]:focus,
    [type="week"]:focus,
    [multiple]:focus,
    textarea:focus,
    select:focus {
        --tw-ring-color: transparent !important;
        border-color: transparent !important;
    }

    input [type="text"]:hover,
    [type="email"]:hover,
    [type="url"]:hover,
    [type="password"]:hover,
    [type="number"]:hover,
    [type="date"]:hover,
    [type="datetime-local"]:hover,
    [type="month"]:hover,
    [type="search"]:hover,
    [type="tel"]:hover,
    [type="time"]:hover,
    [type="week"]:hover,
    [multiple]:hover,
    textarea:hover,
    select:hover {
        --tw-ring-color: transparent !important;
        border-color: transparent !important;
    }

    input [type="text"]:active,
    [type="email"]:active,
    [type="url"]:active,
    [type="password"]:active,
    [type="number"]:active,
    [type="date"]:active,
    [type="datetime-local"]:active,
    [type="month"]:active,
    [type="search"]:active,
    [type="tel"]:active,
    [type="time"]:active,
    [type="week"]:active,
    [multiple]:active,
    textarea:active,
    select:active {
        --tw-ring-color: transparent !important;
        border-color: transparent !important;
    }

    .box {
        background-color: red;
        padding: 4px;
    }

    .materialContainer{
        display: flex;
    }
    .login-section{
        display: flex;
        justify-content: center;
    }
</style>
<!-- Log In Section Start -->
<div class="login-section" >
    <div class="materialContainer" >
        <div class="box" style="background-clip: red">
            <form method="POST" action="{{route('login')}}">
                @csrf
                <div class="login-title">
                    <h2>Login</h2>
                </div>
                <div class="input">
                    <label for="name">Email</label>
                    <input type="email" id="name" name="email" :value="old('email')" required="" autofocus=""autocomplete="name">
                    @error('email')<span class="text-danger mt-3">{{$message}}</span>@enderror
                </div>

                <div class="input">
                    <label for="pass">Password</label>
                    <input type="password" id="pass" class="block mt-1 w-full" name="password" required="" autocomplete="current-password">
                        @error('password')<span class="text-danger mt-3">{{$message}}</span>@enderror
                </div>
                <div class="button login">
                    <button type="submit">
                        <span>Log In</span>
                        <i class="fa fa-check"></i>
                    </button>
                </div>
                <p>Not a member? <a href="{{route('register')}}" class="theme-color">Sign up now</a></p>
            </form>
        </div>
    </div>
</div>
@endsection --}}
@extends('layouts.base')

@section('content')
<style>
    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="url"]:focus,
    input[type="password"]:focus,
    input[type="number"]:focus,
    input[type="date"]:focus,
    input[type="datetime-local"]:focus,
    input[type="month"]:focus,
    input[type="search"]:focus,
    input[type="tel"]:focus,
    input[type="time"]:focus,
    input[type="week"]:focus,
    input[multiple]:focus,
    textarea:focus,
    select:focus {
        --tw-ring-color: transparent !important;
        border-color: transparent !important;
    }

    input[type="text"]:hover,
    input[type="email"]:hover,
    input[type="url"]:hover,
    input[type="password"]:hover,
    input[type="number"]:hover,
    input[type="date"]:hover,
    input[type="datetime-local"]:hover,
    input[type="month"]:hover,
    input[type="search"]:hover,
    input[type="tel"]:hover,
    input[type="time"]:hover,
    input[type="week"]:hover,
    input[multiple]:hover,
    textarea:hover,
    select:hover {
        --tw-ring-color: transparent !important;
        border-color: transparent !important;
    }

    input[type="text"]:active,
    input[type="email"]:active,
    input[type="url"]:active,
    input[type="password"]:active,
    input[type="number"]:active,
    input[type="date"]:active,
    input[type="datetime-local"]:active,
    input[type="month"]:active,
    input[type="search"]:active,
    input[type="tel"]:active,
    input[type="time"]:active,
    input[type="week"]:active,
    input[multiple]:active,
    textarea:active,
    select:active {
        --tw-ring-color: transparent !important;
        border-color: transparent !important;
    }

    .box {
        background-color: red;
        padding: 4px;
    }

    .materialContainer{
        display: flex;
    }
    .login-section{
        display: flex;
        justify-content: center;
    }
    .spinner {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 3px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top-color: #fff;
        animation: spin 1s ease-in-out infinite;
    }
    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }
</style>
<!-- Log In Section Start -->
<div class="login-section">
    <div class="materialContainer">
        <div class="box">
            <form method="POST" action="{{ route('login') }}" onsubmit="disableButton()">
                @csrf
                <div class="login-title">
                    <h2>Login</h2>
                </div>
                <div class="input">
                    <label for="name">Email</label>
                    <input type="email" id="name" name="email" :value="old('email')" required autofocus autocomplete="name">
                    @error('email')<span class="text-danger mt-3">{{ $message }}</span>@enderror
                </div>

                <div class="input">
                    <label for="pass">Password</label>
                    <input type="password" id="pass" class="block mt-1 w-full" name="password" required autocomplete="current-password">
                    @error('password')<span class="text-danger mt-3">{{ $message }}</span>@enderror
                </div>
                <div class="button login">
                    <button type="submit" id="login-button">
                        <span id="login-button-text">Log In</span>
                        <div id="spinner" class="spinner" style="display: none;"></div>
                    </button>
                </div>
                <p>Not a member? <a href="{{ route('register') }}" class="theme-color">Sign up now</a></p>
            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    function disableButton() {
        const button = document.getElementById('login-button');
        const buttonText = document.getElementById('login-button-text');
        const spinner = document.getElementById('spinner');

        buttonText.style.display = 'none';
        spinner.style.display = 'inline-block';
        button.disabled = true;
    }
</script>
@endsection
