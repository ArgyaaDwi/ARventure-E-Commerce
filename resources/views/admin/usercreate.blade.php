@extends('admin.base')
@section('content')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Add Users</p>
            <br>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" action="{{route('admin.storeuser')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
                      @error('name')
                        <small>{{$message}}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email address</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                      @error('email')
                        <small>{{$message}}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                      @error('password')
                        <small>{{$message}}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="customFile">Profile Picture</label>
                      <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFile" name="foto">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                      @error('foto')
                          <small>{{$message}}</small>
                      @enderror
                  </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Address</label>
                      <input type="text" name="alamat" class="form-control" id="exampleInputCity1" placeholder="Input Address">
                      @error('alamat')
                        <small>{{$message}}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Postal Code</label>
                      <input type="text" name="kode_pos" class="form-control" id="exampleInputCity1" placeholder="Location">
                      @error('kode_pos')
                        <small>{{$message}}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Telephone</label>
                      <input type="text" name="no_telepon"class="form-control" id="exampleInputCity1" placeholder="Location">
                      @error('no_telepon')
                        <small>{{$message}}</small>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" style="background-color: #7EA66B;border:none">Submit</button>
                      <a class="btn btn-outline-success btn-sm" href="{{route('admin.user')}}"><span class="material-symbols-outlined">
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