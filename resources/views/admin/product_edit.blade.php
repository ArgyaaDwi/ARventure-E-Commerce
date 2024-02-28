@extends('admin.base')
@section('content')
    <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Update Products</p>
            <br>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" action="{{route('admin.updateproduct', ['id' => $product->id])}}" method="POST" enctype="multipart/form-data">
                      @csrf        
                      @method('PUT') 
                      <div class="form-group">
                        <label>Brand: </label>
                        <select name="id_brand" class="js-example-basic-single w-100" style="height: 40px;border:1px solid rgb(204, 202, 202)">
                            @foreach($brand as $brand)
                                <option value="{{ $brand->id }}" {{ $brand->id == $product->id_brand ? 'selected' : '' }}>
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_brand')
                            <small>{{ $message }}</small>
                        @enderror
                      </div>
                       <div class="form-group">
                        <label>Category: </label>
                        <select name="id_kategori" class="js-example-basic-single w-100" style="height: 40px;border:1px solid rgb(204, 202, 202)">
                            @foreach($category as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $product->id_kategori ? 'selected' : '' }}> 
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_kategori')
                            <small>{{ $message }}</small>
                        @enderror
                        </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Product Name</label>
                        <input type="text" name="product_name" class="form-control" id="exampleInputCity1" placeholder="Input Product Name" value="{{$product->product_name}}">
                        @error('product_name')
                          <small>{{$message}}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Product Description</label>
                        <textarea rows="8" cols="50" name="description" class="form-control" id="exampleInputCity1">{{$product->description}}</textarea>
                        @error('description')
                          <small>{{$message}}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="customFile">Product Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="product_image">
                            <label class="custom-file-label" for="customFile">{{$product->product_image}}</label>
                        </div>
                        @error('product_image')
                            <small>{{$message}}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Price</label>
                        <input type="number" name="harga" class="form-control" id="exampleInputCity1" min="0" step="0.01" value="{{$product->harga}}">
                        @error('harga')
                            <small>{{$message}}</small>
                        @enderror
                      </div>
                      <div class="form-group "  >
                        <label for="exampleInputCity1">Stock</label>
                        <input type="number" name="stock" class="form-control" id="exampleInputCity1" min="0" style="width: 100px;" value="{{$product->stock}}">
                        @error('stock')
                          <small>{{$message}}</small>
                        @enderror
                      </div>
                        <button type="submit" class="btn btn-primary mr-2" style="background-color: #7EA66B;border:none">Submit</button>
                        <a class="btn btn-outline-success btn-sm" href="{{route('admin.product')}}"><span class="material-symbols-outlined">
                        keyboard_backspace
                        </span></a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>        
    </div>
  
  </div>
@endsection