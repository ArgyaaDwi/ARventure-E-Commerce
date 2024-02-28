@extends('admin.base')
@section('content')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="card-header ml-3">Admin Profile</div>
            <br>
            <a href="{{route('admin.adminprofileedit')}}" style="color: white; text-decoration:none;margin-left:18px;"> <button type="button" class="btn btn-outline-primary" style="border-radius:0px; background-color:#7EA66B;color:white;border:none;">Update Data</button></a>
            <br>
            <br>
            
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="card-body">
                              <div class="text-center">
                                  @if($loggedInUser->foto)
                                      <img width="260px" src="{{ asset('storage/userpic/user/' . $loggedInUser->foto) }}" alt="Profile Picture">
                                  @else
                                      <span>No Photo</span>
                                  @endif
                              </div>
                          </div>
                      </div>
                      <div class="col-md-8">
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item">ID : {{ $loggedInUser->id }}</li>
                              <li class="list-group-item">Name : {{ $loggedInUser->name }}</li>
                              <li class="list-group-item">Email Address : {{ $loggedInUser->email }}</li>
                              <li class="list-group-item">
                                  @if($loggedInUser->alamat)
                                      Address : {{ $loggedInUser->alamat }}
                                  @else
                                      <span>No Address</span>
                                  @endif
                              </li>
                              <li class="list-group-item">
                                  @if($loggedInUser->kode_pos)
                                      Postal Code : {{ $loggedInUser->kode_pos }}
                                  @else
                                      <span>No Postal Code</span>
                                  @endif
                              </li>
                              <li class="list-group-item">
                                  @if($loggedInUser->no_telepon)
                                      No Telephone : {{ $loggedInUser->no_telepon }}
                                  @else
                                      <span>No Number</span>
                                  @endif
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
          <br>
            <a class="btn btn-outline-success btn-sm" style="margin-left:30px;margin-top:-40px;" href="{{route('admin.index')}}"><span class="material-symbols-outlined" >
              keyboard_backspace
              </span></a>
          </div>
        </div>
      </div>        
    </div>
  </div>
@endsection