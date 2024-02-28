@extends('layouts.base')
@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md- grid-margin stretch-card">
        <div class="card">
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
                <li></li>
                <li></li>
            </ul> --}}
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3>History Transaction</h3>
                        <nav>
                            <ol class="breadcrumb" style="background: transparent">
                                <li class="breadcrumb-item">
                                    <a href="{{route('app.index')}}">
                                        <i class="fas fa-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">History Transaction</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <br><br>
              <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id Order</th>
                    <th scope="col">Total Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Shipping Address</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $no=1;
                    @endphp
                  @foreach ($order as $order)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$order->id}}</td>
                    <td>Rp{{$order->total_amount}}</td>
                    <td >
                        @if($order->status === 'process')
                          <button type="button" class="btn btn-warning btn-sm">{{$order->status}}</button>
                        @else
                          <button  type="button" class="btn btn-success btn-sm">{{$order->status}}</button>
                        @endif
                    </td>                  
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->shipping_address}}</td>
                    <td><a class="btn btn-outline-info btn-sm" href="{{route('users.historydetail', ['id' => $order->id]) }}"><span class="material-symbols-outlined">visibility</span></a>
                    </td>
                  </tr>
                
                  @endforeach
                 
                </tbody>
              </table>
          <br>
          <br>
          <br>
            
              
          </div>
        </div>
      </div>  
      <br><br><br>      
      <a class="btn btn-outline-success btn-sm" style="margin-left:30px;margin-top:-40px;" href="{{route('users.index')}}"><span class="material-symbols-outlined" >
        keyboard_backspace
        </span></a>
    </div>
  </div>

@endsection