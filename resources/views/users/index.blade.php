@extends('layouts.base')
@section('content')
<div class="content-wrapper">
    @if(session()->has('message'))
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
      {{session()->get('message')}}
    </div>
    @endif
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
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
                            <h3>User Profile</h3>
                            <nav>
                                <ol class="breadcrumb" style="background: transparent">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('app.index')}}">
                                            <i class="fas fa-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
          <div class="card-body">
            <br>
            <a href="{{route('users.edit')}}" style="color: white; text-decoration:none;"> <button type="button" class="btn btn-outline-success" style=" background-color:grey;color:white;border:none;margin-left:15px;">Update Data</button></a>
            <br>
            <br>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                  <div class="row">
                      <div class="col-md-3">
                          <div class="card-body">
                              <div class="text-center">
                                  @if($loggedInUser->foto)
                                      <img width="200px" src="{{ asset('storage/userpic/user/' . $loggedInUser->foto) }}" alt="Profile Picture">
                                  @else
                                      <span>No Photo</span>
                                  @endif
                              </div>
                          </div>
                      </div>
                      
                      <div class="col-md-5">
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
                      <div class="col-md-4">
                        <ul>
                            <li><a class="btn btn-light btn-sm" style="margin-left:30px;margin-top:20px;" href="{{route('users.history')}}"><span  >
                                History Transaction
                                </span></a>
                            </li>
                        </ul>
                      </div>
                  </div>
              </div>
          </div>
          <br>
          <br>
          <br>
            <a class="btn btn-outline-success btn-sm" style="margin-left:30px;margin-top:-40px;" href="{{route('app.index')}}"><span class="material-symbols-outlined" >
              keyboard_backspace
              </span></a>
              
          </div>
        </div>
      </div>        
    </div>
  </div>
@endsection