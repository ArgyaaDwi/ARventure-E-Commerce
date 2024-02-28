@extends('admin.base')
@section('content')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="card-header ml-3">User Details</div>
            <br>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="card-body">
                              <!-- Bagian Kiri (Foto) -->
                              <div class="text-center">
                                  @if($user->foto)
                                      <img width="260px" style="display:block;margin:auto;" src="{{ asset('storage/userpic/user/' . $user->foto) }}" alt="Profile Picture">
                                  @else
                                      <span>No Photo</span>
                                  @endif
                              </div>
                          </div>
                      </div>
                      <div class="col-md-8">
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item">ID User: {{ $user->id }}</li>
                              <li class="list-group-item">Name : {{ $user->name }}</li>
                              <li class="list-group-item">Email Address : {{ $user->email }}</li>
                              <li class="list-group-item">
                                  @if($user->alamat)
                                      Address : {{ $user->alamat }}
                                  @else
                                      <span>No Address</span>
                                  @endif
                              </li>
                              <li class="list-group-item">
                                  @if($user->kode_pos)
                                      Postal Code : {{ $user->kode_pos }}
                                  @else
                                      <span>No Postal Code</span>
                                  @endif
                              </li>
                              <li class="list-group-item">
                                  @if($user->no_telepon)
                                      No Telephone : {{ $user->no_telepon }}
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
          <br>
            <a class="btn btn-outline-success btn-sm" style="margin-left:30px;margin-top:-40px;" href="{{route('admin.user')}}"><span class="material-symbols-outlined" >
              keyboard_backspace
              </span></a>
          </div>
        </div>
      </div>        
    </div>
  </div>
@endsection