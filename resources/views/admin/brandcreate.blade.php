@extends('admin.base')
@section('content')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Add Brand</p>
            <br>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" action="{{route('admin.storebrand')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Name Brand</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
                      @error('name')
                        <small>{{$message}}</small>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" style="background-color: #7EA66B;border:none">Submit</button>
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