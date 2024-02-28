@extends('admin.base')
@section('content')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Add Category</p>
            <br>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" action="{{route('admin.storecategory')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Name Category</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
                      @error('name')
                        <small>{{$message}}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="customFile">Image Category</label>
                      <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFile" name="image">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                      @error('image')
                          <small>{{$message}}</small>
                      @enderror
                  </div>
                    <button type="submit" class="btn btn-primary mr-2" style="background-color: #7EA66B;border:none">Submit</button>
                      <a class="btn btn-outline-success btn-sm" href="{{route('admin.category')}}"><span class="material-symbols-outlined">
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