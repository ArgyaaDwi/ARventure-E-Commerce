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
            <p class="card-title mb-0">Brands</p>
            <br>
            <a href="{{route('admin.brandcreate')}}" style="color: white; text-decoration:none;"> <button type="button" class="btn btn-outline-primary" style="border-radius:8px; background-color:#7EA66B;color:white;border:none;">Add Brands</button></a>
            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                    <br>
                    <th>No</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>  
                </thead>
                <tbody>
                  @php
                    $no = 1;
                  @endphp
                    @foreach ( $brand as $br )
                      <tr>
                        <td>{{$no++}}</td>
                        <td>{{$br->id}}</td>
                        <td>{{$br->name}}</td>
                        <td> 
                          <a class="btn btn-outline-primary btn-sm" href="{{route('admin.brand_edit', ['id' => $br->id]) }}"><span class="material-symbols-outlined">edit</span></a>
                          <a data-toggle="modal" data-target="#deleteModal{{$br->id}}" class="btn btn-danger btn-sm"><span class="material-symbols-outlined">delete</span></a>
                        </td>
                      </tr>
                      <div class="modal fade" id="deleteModal{{$br->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{$br->id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="deleteModalLabel{{$br->id}}">Confirm Deletion</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Are you sure you want to delete this brand?
                            </div>
                            <div class="modal-footer">
                              <form action="{{route('admin.destroybrand',  ['id' => $br->id])}}" method="post">
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
    {{-- <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1"><<</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">>></a>
        </li>
      </ul>
    </nav> --}}
  </div>
@endsection