@extends('admin.base')
@section('content')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="card-header ml-3">Product Details</div>
            <br>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="card-body">
                              <div class="text-center">
                                  @if($product->product_image)
                                      <img width="360px" style="display:block;margin:auto;" src="{{asset('storage/userpic/product/'.$product->product_image )}}" alt="Product Picture">
                                  @else
                                      <span>No Photo</span>
                                  @endif
                              </div>
                          </div>
                      </div>
                      <div class="col-md-8">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">ID Product : {{ $product->id }}</li>
                          <li class="list-group-item">Brand : {{$product->brand->name}}</li>
                          <li class="list-group-item">Product Name : {{ $product->product_name }}</li>
                          <li class="list-group-item">Description : <br>{{ $product->description }}</li>
                          <li class="list-group-item">Price : RP{{ $product->harga }}</li>
                          <li class="list-group-item">Category : {{$product->category->name}}</li>
                          <li class="list-group-item">Stock Available : {{$product->stock}}</li>
                        </ul>
                      </div>
                  </div>
              </div>
          </div>
          <br>
            <a class="btn btn-outline-success btn-sm" style="margin-left:30px;margin-top:-40px;" href="{{route('admin.product')}}"><span class="material-symbols-outlined" >
              keyboard_backspace
              </span></a>
          </div>
        </div>
      </div>        
    </div>
  </div>
@endsection