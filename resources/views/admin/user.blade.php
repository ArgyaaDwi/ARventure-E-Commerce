@extends('admin.base')
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
          <div class="card-body">
            <p class="card-title mb-0">Users</p>
            <br>
            <a href="{{route('admin.usercreate')}}" style="color: white; text-decoration:none;"> <button type="button" class="btn btn-outline-primary" style="border-radius:8px; background-color:#7EA66B;color:white;border:none;">Add Users</button></a>
          
            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                      <br>
                    <th>No</th>
                    <th>id</th>
                    <th>Profile Picture</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>  
                </thead>
                <tbody>
                  @php
                    $no = 1;
                  @endphp
                  @foreach($user as $u)
                    @if ($u->utype == 'USR')
                      <tr>
                        <td>{{$no++}}</td>
                        <td>{{$u->id}}</td>
                        <td>
                          @if($u->foto)
                              <img src="{{ asset('storage/userpic/user/'.$u->foto) }}" alt="">
                          @else
                              <span>No Photo</span>
                          @endif
                        </td>                              
                        <td>{{$u->name}}</td>
                        <td >{{$u->email}}</td>
                        <td> 
                          <a class="btn btn-outline-info btn-sm" href="{{route('admin.user_detail', ['id' => $u->id]) }}"><span class="material-symbols-outlined">visibility</span></a>
                          <a class="btn btn-outline-primary btn-sm" href="{{route('admin.user_edit', ['id' => $u->id]) }}"><span class="material-symbols-outlined">edit</span></a>
                          <a data-toggle="modal" data-target="#deleteModal{{$u->id}}" class="btn btn-danger btn-sm"><span class="material-symbols-outlined">delete</span></a>
                        </td>
                      </tr>
                      <div class="modal fade" id="deleteModal{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{$u->id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="deleteModalLabel{{$u->id}}">Confirm Deletion</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Are you sure you want to delete this user?
                            </div>
                            <div class="modal-footer">
                              <form action="{{route('admin.destroyuser',  ['id' => $u->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" style="background-color:white;color:black;" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endif  
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>        
    </div>
    
  </div>
@endsection