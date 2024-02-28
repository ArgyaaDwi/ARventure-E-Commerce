@extends('admin.base')
@section('content')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Update Users</p>
            <br>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">     
                  <form class="forms-sample" action="{{route('admin.updateuser', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email address</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Email" value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword4" placeholder="Leave it blank to keep the current password">
                    </div>
                    <div class="form-group">
                      <label for="customFile">Profile Picture</label>
                      <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFile" name="foto">
                          <label class="custom-file-label" for="customFile">{{$user->foto}}</label>
                      </div>
                  </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Address</label>
                      <input type="text" name="alamat" class="form-control" id="exampleInputCity1" placeholder="Input Address" value="{{$user->alamat}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Postal Code</label>
                      <input type="text" name="kode_pos" class="form-control" id="exampleInputCity1" placeholder="Postal Code" value="{{$user->kode_pos}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Telephone</label>
                      <input type="text" name="no_telepon"class="form-control" id="exampleInputCity1" placeholder="Telephone Number" value="{{$user->no_telepon}}">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" style="background-color: #7EA66B;border:none">Update</button>
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