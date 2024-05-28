@extends('layouts.base')
@section('content')
<section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
    {{-- <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li> --}}
    </ul>
    <div class="container">

        <div class="row">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}
                </div>
            @endif
            <div class="col-12">
                <h3>Cart</h3>
                <nav>
                    <ol class="breadcrumb" style="background: transparent">
                        <li class="breadcrumb-item">
                            <a href="{{route('app.index')}}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Cart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Cart Section Start -->
<section class="cart-section section-b-space">
    <div class="container">
        @if ($cartItems->Count() > 0)
        <div class="row">
            <div class="col-md-12 text-center" >
                <table class="table cart-table"  >
                    <thead>
                        <tr class="table-head" >
                            <th scope="col" >image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">quantity</th>
                            <th scope="col">total</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $items)
                        <tr>
                            <td>
                                <a href="{{route('users.shopdetails', ['id'=>$items->product->id])}}">
                                    <img src="{{ asset('storage/userpic/product/'.$items->product->product_image) }}" class="blur-up lazyloaded"
                                        alt="{{$items->product->product_name}}">
                                </a>
                            </td>
                            <td>
                                <a href="{{route('users.shopdetails', ['id'=>$items->product->id])}}">{{$items->product->product_name}}</a>
                                <div class="mobile-cart-content row">
                                    <div class="col">
                                        {{-- <div class="qty-box">
                                            <div class="input-group">
                                                <input type="text" name="quantity" class="form-control input-number"
                                                    value="1">
                                            </div>
                                        </div> --}}
                                        <form action="{{ route('update.cart') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="rowId" value="{{ $items->rowId }}">
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <input type="number" name="quantity" class="form-control input-number" value="{{ $items->qty }}">
                                                    <button type="submit" class="btn btn-primary">Update Quantity</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col">
                                        <h2>{{$items->harga}}</h2>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color">
                                            <a href="javascript:void(0)">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2>Rp{{$items->product->harga}}</h2>
                            </td>
                            <td>
                                <h2>{{$items->quantity}}</h2>
                                {{-- <div class="qty-box">
                                    <div class="input-group">
                                        <input type="number" name="quantity"
                                            data-rowid="{{$items->rowId}}" onchange="updateQuantity(this)" class="form-control input-number" value="{{$items->qty}}">
                                    </div>
                                </div> --}}
                            </td>
                            <td>
                                <h2>Rp{{$items->calculateSubTotal()}}.00</h2>
                            </td>
                            <td>
                                <form action="{{ route('cart.destroy', ['id' => $items->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><i class="fas fa-times"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12 mt-md-5 mt-4">
                <div class="row">
                    <div class="col-sm-7 col-5 order-1">
                        <div class="left-side-button text-end d-flex d-block justify-content-end">
                            <a href="{{ route('cart.clearAll') }}"
                               class="text-decoration-underline theme-color d-block text-capitalize"
                               onclick="return confirm('Are you sure you want to clear all items from your cart?')">Clear all items</a>
                        </div>
                    </div>
                    <div class="col-sm-5 col-7">
                        <div class="left-side-button float-start">
                            <a href="{{route('shop.index')}}" class="btn btn-solid-default btn fw-bold mb-0 ms-0">
                                <i class="fas fa-arrow-left"></i> Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cart-checkout-section">
                <div class="row g-4">
                    <div class="col-lg-4 col-sm-6">
                    </div>
                    <div class="col-lg-4 col-sm-6 ">

                        {{-- <form method="POST" action="{{ route('checkout') }}">
                            @method('post')
                            @csrf <!-- Laravel akan menambahkan token CSRF otomatis -->
                            <div class="checkout-button">
                                <a href="checkout" class="btn btn-solid-default btn fw-bold">
                                    Check Out <i class="fas fa-arrow-right ms-1"></i></a>
                            </div>
                        </form> --}}
                    </div>
                    <div class="col-lg-4">
                        <div class="cart-box">
                            <div class="cart-box-details">
                                <div class="total-details">
                                    <div class="top-details">
                                        <h3>Cart Totals</h3>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($cartItems as $cartItem)
                                            @php
                                                $total += $cartItem->calculateSubtotal();
                                            @endphp
                                        @endforeach
                                        <h6>Total <span>Rp{{ $total }}.00</span></h6>
                                    </div>
                                    <form method="POST" action="{{ route('checkout') }}">
                                        @method('post')
                                        @csrf <!-- Laravel akan menambahkan token CSRF otomatis -->
                                        <div class="bottom-details" style="background-color: #7EA66B">
                                            <button type="submit" id="checkout-btn" style="border: none; color:rgb(255, 255, 255);background-color:#7EA66B">
                                                <span>Process Checkout</span>
                                                <div id="checkout-spinner" class="spinner-border" style="display: none;"></div>
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Your cart is empty!</h2>
                    <h5 style="margin-top: 10px">Add some products now</h5>
                    <a href="{{route('shop.index')}}" class="btn btn-light mt-5" style="border: 1px solid black">Shop Now</a>
                </div>
            </div>
        @endif
    </div>
</section>
<form id="updateCartForm" action="{{ route('update.cart') }}" method="POST">
    @csrf
    <input type="hidden" name="rowId" id="updateRowId" value="">
    <input type="hidden" name="quantity" id="updateQuantity" value="">
</form>
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function updateQuantity(input) {
        var rowId = $(input).data('rowid');
        var newQuantity = $(input).val();

        // Mengisi nilai pada input tersembunyi pada formulir
        $('#updateRowId').val(rowId);
        $('#updateQuantity').val(newQuantity);

        // Mengirim formulir menggunakan AJAX
        $('#updateCartForm').submit();
    }

    document.getElementById('checkout-btn').addEventListener('click', function() {
        var button = document.getElementById('checkout-btn');
        var spinner = document.getElementById('checkout-spinner');

        button.querySelector('span').style.display = 'none';
        spinner.style.display = 'inline-block';
    });
</script>
@endpush
