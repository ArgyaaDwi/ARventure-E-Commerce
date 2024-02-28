@extends('admin.base')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Welcome back  <td>{{$loggedInUser->name}}</td></h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md grid-margin transparent">
      <div class="row">
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div class="card card-tale">
            <div class="card-body">
              <p class="mb-2" style="color: black;"><b>Total Sales</b></p>
              <span class="material-symbols-outlined" style="color:black;background-color:white;padding:10px;border-radius:12px;">
                credit_card
                </span>
              <p class="fs-30 mb-4 mt-3"style="color: black;">Rp{{$order->sum('total_amount')}}.00</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div class="card card-dark-blue">
            <div class="card-body">
              <p class="mb-2"style="color: black;"><b>Total Product</b></p>
              <span class="material-symbols-outlined" style="color: black;background-color:white;padding:10px;border-radius:12px;">
                deployed_code
                </span> 
              <p class="fs-30 mb-4 mt-3 "style="color: black;">{{$product->count()}}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
          <div class="card card-light-blue">
            <div class="card-body">
              <p class="mb-2"style="color: black;"><b>Total Brand</b></p>
              <span class="material-symbols-outlined" style="color: black;background-color:white;padding:10px;border-radius:12px;">
                branding_watermark                </span>
              <p class="fs-30 mb-4 mt-3"style="color: black;">{{$brand->count()}}</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 stretch-card transparent">
          <div class="card card-light-danger">
            <div class="card-body">
              <p class="mb-2"style="color: black;"><b>Total User</b></p>
              <span class="material-symbols-outlined" style="color: black;background-color:white;padding:10px;border-radius:12px;">
                person
                </span>          
              <p class="fs-30 mb-4 mt-3"style="color: black;"> {{ $user->where('utype', 'USR')->count() }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-5 stretch-card grid-margin">
      <div class="card">
        <div class="card-body">
          <p class="card-title">Recent Messages</p>
          <ul class="icon-data-list">
            @foreach ($messages as $mess)
            <li>
              <div class="d-flex">
                @if($mess->user->foto)
                    <img src="{{ asset('storage/userpic/user/'.$mess->user->foto) }}" alt="">
                @else
                    <span>No Photo</span>
                @endif
                <div>
                  <p class="text-info mb-1">{{$mess->user->name}}</p>
                  <p class="mb-0">{{$mess->content}}</p>
                  <small>{{$mess->created_at}}</small>
                </div>
              </div>
            </li>
            @endforeach
          </ul> 
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title mb-0">Recent User</p>
          <div class="table-responsive">
            <table class="table table-striped table-borderless">
              <thead>
                <tr>
                  <th>ID User</th>
                  <th>Profile Picture</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>No Telephone</th>
                </tr>  
              </thead>
              <tbody>
                @foreach ($recentUser as $lu)
                <tr>
                  <td>{{$lu->id}}</td>
                  <td>
                    @if($lu->foto)
                        <img src="{{ asset('storage/userpic/user/'.$lu->foto) }}" alt="">
                    @else
                        <span>No Photo</span>
                    @endif
                  </td>                         <td>{{$lu->name}}</td>
                  <td class="font-weight-bold">{{$lu->email}}</td>
                  <td>{{$lu->no_telepon}}</td>
                </tr>
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
