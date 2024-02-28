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
            <p class="card-title mb-0">Transactions</p>
            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                      <br>
                    <th>No</th>
                    <th>Id</th>
                    <th>Id User</th>
                    <th>Buyer</th>
                    <th>Status</th>
                    <th>Total Amount</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>  
                <tbody>
                  @php
                    $no=1;
                  @endphp
                  @foreach ($order as $or)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$or->id}}</td>
                    <td>{{$or->id_user}}</td>
                    <td>{{$or->user->name}}</td>
                    <td >
                      @if($or->status === 'process')
                        <button type="button" class="btn btn-warning btn-sm">{{$or->status}}</button>
                      @else
                        <button  type="button" class="btn btn-success btn-sm">{{$or->status}}</button>
                      @endif
                    </td>
                    <td>{{$or->total_amount}}</td>
                    <td>{{$or->created_at}}</td>

                    <td>
                      @if($or->status === 'process')
                      <form action="{{ route('orders.complete', $or->id) }}" method="post">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-outline-primary btn-sm">
                            <span class="">Verification</span>
                        </button>
                      </form>
                      @else
                          Is verified
                      @endif
                    </td>
                  </tr>
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