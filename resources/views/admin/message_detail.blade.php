@extends('admin.base')
@section('content')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="card-header ml-3">Message Details</div>
            <br>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                  <div class="row">
                      <div class="col-md-12">
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item">ID User: {{$messages->id}}</li>
                              <li class="list-group-item">Name : {{$messages->user->name}}</li>
                              <li class="list-group-item">Email Address : {{$messages->user->email}}</li>
                              <li class="list-group-item">No Telephone : {{$messages->user->no_telepon}}</li>
                              <li class="list-group-item">Content : {{$messages->content}}</li>
                              <li class="list-group-item">Timestamp : {{$messages->created_at}}</li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
          <br>
          <br>
            <a class="btn btn-outline-success btn-sm" style="margin-left:30px;margin-top:-40px;" href="{{route('admin.message')}}"><span class="material-symbols-outlined" >
              keyboard_backspace
              </span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
