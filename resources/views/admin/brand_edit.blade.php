@extends('admin.base')
@section('content')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Update Brands</p>
            <br>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" action="{{route('admin.updatebrand', ['id' => $brand->id])}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name" value="{{$brand->name}}">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" style="background-color: #7EA66B;border:none">Update</button>
                    <a class="btn btn-outline-success btn-sm" href="{{route('admin.brand')}}"><span class="material-symbols-outlined">
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