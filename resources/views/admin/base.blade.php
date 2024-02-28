<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title', 'ARventure Admin')</title>
  <link rel="stylesheet" href="{{asset('/template/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('/template/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('/template/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('/template/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('/template/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/template/js/select.dataTables.min.css')}}">
  <link rel="stylesheet" href= "{{ asset('/template/css/vertical/style.css')}}">
  {{-- <link rel="shortcut icon" href="images/favicon.png" /> --}}
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="{{('/')}}"><img src="{{asset('assets/images/arventure.png')}}" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="{{('/')}}"><img src="{{asset('assets/images/arventuremini.png')}}" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              @if($loggedInUser->foto)
                <img src="{{ asset('storage/userpic/user/'.$loggedInUser->foto) }}" alt="profile"/>
              @else
                <span>{{$loggedInUser->name}}</span>
              @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="{{ route('admin.adminprofile') }}">
                <span class="material-symbols-outlined">
                  person
                  </span>Admin Profile
              </a>
              <a class="dropdown-item" href="{{route('logout')}}">
                <span class="material-symbols-outlined">
                  logout 
                </span> Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">  
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.index')}}" style="background-color:#7EA66B;color:white;">
              <span class="material-symbols-outlined" >
                grid_view 
                </span>              
                <span class="menu-title" style="margin-left:5px;color:white;">Dashboard</span>
            </a>
          </li>
          <li class="nav-item" style="background-color:white">
            <a class="nav-link" href="{{route('admin.brand')}}">
              <span class="material-symbols-outlined">
                branding_watermark
                </span>
                <span class="menu-title" style="margin-left:5px;">Brand</span>
            </a>
          </li>
          <li class="nav-item"  style="background-color:white">
            <a class="nav-link" href="{{route('admin.category')}}">
              <span class="material-symbols-outlined">
                category
                </span>
                <span class="menu-title" style="margin-left:5px;">Categories</span>
            </a>
          </li>        
          <li class="nav-item" style="background-color:white">
            <a class="nav-link" href="{{route('admin.product')}}" >
              <span class="material-symbols-outlined">
                deployed_code
                </span>              
                <span class="menu-title" style="margin-left:5px;">Product</span>
            </a>           
          </li>
          <li class="nav-item" style="background-color:white">
            <a class="nav-link" href="{{route('admin.user')}}" >
              <span class="material-symbols-outlined">
                person
                </span>              
                <span class="menu-title"style="margin-left:5px;">User</span>
            </a>         
          </li>
          <li class="nav-item" style="background-color:white">
            <a class="nav-link" href="{{route('admin.transaction')}}" >
              <span class="material-symbols-outlined">
                contract
                </span>              
                <span class="menu-title"style="margin-left:5px;">Transactions</span>
            </a>         
          </li>
          <li class="nav-item" style="background-color:white">
            <a class="nav-link" href="{{route('admin.message')}}">
              <span class="material-symbols-outlined">
                sms
                </span>              
                <span class="menu-title"style="margin-left:5px;">Messages</span>
            </a>
          </li>
        </ul>
      </nav>
      <div class="main-panel">
        @yield('content')
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Arventure</a> from Argya Dwi. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
      </div>
    </div>
  </div>
  <script src="{{ asset('/template/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('/template/js/off-canvas.js')}}"></script>
  <script src="{{asset('/template/js/template.js')}}"></script>
  <script src="{{asset('/template/js/dashboard.js')}}"></script>
</body>
</html>

