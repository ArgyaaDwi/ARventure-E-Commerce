@extends('layouts.base')
@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="card-header ml-3">Order Details</div>
            <br>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                  <div class="row">
                      <div class="col-md-12">
                          <ul class="list-group list-group-flush">
                              {{-- <li class="list-group-item">ID Order: {{$order->id}} </li> --}}
                              {{-- <li class="list-group-item">ID Cart: {{$orderItem->id}} </li>
                              <li class="list-group-item">ID Cart: {{$orderItem->id}} </li> --}}
                              @foreach ($order->orderItems as $orderItem)
                              <li class="list-group-item">Product Name: {{ $orderItem->product->product_name }}</li>
                              <li class="list-group-item">Quantity: {{ $orderItem->quantity }}</li>
                              <li class="list-group-item">Price: Rp{{ $orderItem->price }}</li>
                              <!-- Tambahkan informasi lain yang ingin Anda tampilkan -->
                              @endforeach
                              <li class="list-group-item">Total Amount: Rp{{ $order->total_amount }}</li>
                              <li class="list-group-item">Shipping Address : {{ $order->shipping_address }}</li>
                              <li class="list-group-item">Postal Code: {{ $order->postal_code }}</li>
                              <li class="list-group-item">No Telephone: {{ $order->no_telp }}</li>
                              <li class="list-group-item">Timestamp: {{ $order->created_at }}</li>
                              <li class="list-group-item">
                                @if ($order->status === 'complete')
                                    Verified at: {{ $order->updated_at }}
                                @elseif ($order->status === 'process')
                                    Not verified yet
                                @endif
                            </li>                            
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
          <br>
          <br>
            <a class="btn btn-outline-success btn-sm" style="margin-left:18px;margin-top:-40px;" href="{{route('users.history')}}"><span class="material-symbols-outlined" >
              keyboard_backspace
              </span></a>
          </div>
        </div>
      </div>        
    </div>
  </div>
@endsection