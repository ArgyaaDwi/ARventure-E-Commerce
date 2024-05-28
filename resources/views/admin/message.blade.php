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
            <p class="card-title mb-0">Messages</p>
            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                      <br>
                    <th>No</th>
                    <th>Id</th>
                    <th>Profile Picture</th>
                    <th>Name</th>
                    {{-- <th>Email</th> --}}
                    <th>Phone</th>
                    <th>Timestamp</th>
                    {{-- <th>Message</th> --}}
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $no=1;
                  @endphp
                  @foreach ($messages as $mess)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$mess->id}}</td>
                    <td>
                      @if($mess->user->foto)
                          <img src="{{ asset('storage/userpic/user/'.$mess->user->foto) }}" alt="">
                      @else
                          <span>No Photo</span>
                      @endif
                    </td>
                    <td>{{$mess->user->name}}</td>
                    {{-- <td >{{$mess->user->email}}</td> --}}
                    <td>{{$mess->user->no_telepon}}</td>
                    <td>{{$mess->created_at}}</td>
                    {{-- <td>{{$mess->content}}</td> --}}
                    <td>
                      <a class="btn btn-outline-info btn-sm" href="{{route('admin.messagedetail', ['id' => $mess->id]) }}"><span class="material-symbols-outlined">visibility</span></a>
                      <a data-toggle="modal" data-target="#deleteModal{{$mess->id}}" class="btn btn-danger btn-sm"><span class="material-symbols-outlined">delete</span></a>
                    </td>
                  </tr>
                  <div class="modal fade" id="deleteModal{{$mess->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{$mess->id}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="deleteModalLabel{{$mess->id}}">Confirm Deletion</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to delete this message?
                        </div>
                        <div class="modal-footer">
                          <form action="{{route('admin.destroymessage',  ['id' => $mess->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" style="background-color:white;color:black;" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
    </div>

  </div>
@endsection
