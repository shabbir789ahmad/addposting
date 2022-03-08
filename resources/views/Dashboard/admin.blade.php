<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Dashboard</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <!--  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
  <script src="https://kit.fontawesome.com/53bfee5bd7.js" crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="icon" href="{!! asset('pic/10_archived_orders._CB654640573_.png') !!} " >
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('css/ruang-admin.min.css')}}" rel="stylesheet">
 <link rel="stylesheet" href="{{asset('css/admin.css')}}">
 <link rel="stylesheet" href="{{asset('css/form.css')}}">
<style>

.show{

  display:block;
  }
  .hide{
  display:none;
  
  }

</style>
</head>

<body id="page-top " >
  <div id="wrapper" >
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="{{asset('pic/iconProfilePicture.7975761176487dc62e25536d9a36a61d.png')}}">
        </div>
      </a>
      <hr class="sidebar-divider my-0">
       <div class="admin-order text-light ml-3 mt-3">
        Features
      </div>
      <hr class="sidebar-divider">
     
       <li class="nav-item ">
        <a class="nav-link " href="{{url('admin/dashboard')}}">
          <i class="fas fa-window-maximize text-light"></i>
          <span>Dashboard</span>
        </a>
       </li>
       <li class="nav-item ">
        <a class="nav-link " href="{{route('category.index')}}">
          <i class="fas fa-window-maximize text-light"></i>
          <span>Category</span>
        </a>
       </li>
       <li class="nav-item ">
        <a class="nav-link " href="{{route('subcategory.index')}}">
          <i class="fas fa-window-maximize text-light"></i>
          <span>Sub Category Feature</span>
        </a>
       </li>
       <li class="nav-item ">
        <a class="nav-link " href="{{route('type.index')}}">
          <i class="fas fa-window-maximize text-light"></i>
          <span>Types </span>
        </a>
       </li>
       <li class="nav-item ">
        <a class="nav-link " href="{{route('slider.index')}}">
          <i class="fas fa-window-maximize text-light"></i>
          <span>Slider</span>
        </a>
       </li>
       <li class="nav-item ">
        <a class="nav-link " href="{{route('banner.index')}}">
          <i class="fas fa-window-maximize text-light"></i>
          <span>Banner</span>
        </a>
       </li>
       <li class="nav-item ">
        <a class="nav-link " href="{{route('packages.index')}}">
          <i class="fas fa-window-maximize text-light"></i>
          <span>Package</span>
        </a>
       </li>
       <li class="nav-item ">
        <a class="nav-link " href="{{route('order.index')}}">
          <i class="fas fa-window-maximize text-light"></i>
          <span>Ads Order</span>
        </a>
       </li>
       <li class="nav-item ">
        <a class="nav-link " href="{{route('state.index')}}">
          <i class="fas fa-window-maximize text-light"></i>
          <span>State</span>
        </a>
       </li>
       <li class="nav-item ">
        <a class="nav-link " href="{{route('city.index')}}">
          <i class="fas fa-window-maximize text-light"></i>
          <span>City</span>
        </a>
       </li>
       <li class="nav-item ">
        <a class="nav-link " href="{{route('vendor.index')}}">
          <i class="fas fa-window-maximize text-light"></i>
          <span>Vendor</span>
        </a>
       </li>
       <li class="nav-item ">
        <a class="nav-link " href="{{route('user.index')}}">
          <i class="fas fa-window-maximize text-light"></i>
          <span>Users</span>
        </a>
       </li>
        <li class="nav-item ">
        <a class="nav-link " href="{{route('message.index')}}">
          <i class="fas fa-window-maximize text-light"></i>
          <span>User Messages</span>
        </a>
       </li>
    
      
      
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <p> @guest
          @if (Route::has('login'))
           <li class="nav-item list-inline-item ml-5 mt-1   ml-2">
         <a class="nav-link  border rounded text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            
                        @else
            <li class="nav-item border rounded p-2 bg-light border-danger dropdown d-block mt-2 ml-5 bookname" style="z-index:900" >
         <a id="navbarDropdown" class=" bg-light dropdown-toggle  text-light mt-4" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
         <a href="" class="mt-5  text-dark " > {{ucwords( Auth::user()->name )}}</a>
                                </a>

  <div class="dropdown-menu " aria-labelledby="navbarDropdown">
  <a class="dropdown-item" href="{{ route('logout') }}"
    onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
          </a>

  <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-hidden">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest</p>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                @php 
                $notify=0;
             
                 $cart=\App\Models\Cart::get();

                 if($cart)
                 {
                 foreach($cart as $car)
                   {
                      $notify=count($car->unreadNotifications);
                     $cart=$car->unreadNotifications; 
                   
                  }
              
                }else{
                  $notify=0;
                }
                  
                 @endphp
                
                <span class="badge badge-danger badge-counter">{{$notify}}</span>
               
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
               @foreach($cart as $notification)
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <!-- <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div> -->
                 
                  <div class="d-flex">
                    @foreach($notification['data'] as $d)
                
                      {{$d}}
                    @endforeach
                  
                    <a href="{{route('order.index')}}" class=" border badge-warning rounded px-2 py-1 ml-auto mr-3">{{$notification['notifiable_id']}}</a>
                    
                  </div>
                </a>
               @endforeach
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-warning badge-counter"></span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="{{asset('pic/10_archived_orders._CB654640573_.png')}}" style="max-width: 60px" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been
                      having.</div>
                    <div class="small text-gray-500">Udin Cilok · 58m</div>
                  </div>
                </a>
              
                 
             
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>
           
            
          </ul>
        </nav>
        <!-- Topbar -->

    
     @yield('content')

          
  
  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>

 
  <script src="{{asset('js/jquery.easing.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/ruang-admin.min.js')}}"></script>
  <script src="{{asset('js/category.js')}}"></script>
     
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 @if(Session()->has('success'))
<script>
   swal.fire({
  title: ' {{ Session('success') }}',
  text: "Upload More",
  icon: "success",
  
}); 

</script>
{{Session::forget('success')}}
  @endif
 


<script>
 


 
let elemsu = Array.prototype.slice.call(document.querySelectorAll('.js-switchu'));

elemsu.forEach(function(html) {
    let switchery = new Switchery(html,  { size: ' small' });
});



</script>
<script>

$('.discount').click(function(){
     
   
       $('#discountModal').modal('show');
       let id=$(this).data('id')
        $('#did').val(id)
        
      
     });
     
    
</script>

@section('script')
@show
    
</body>

</html>
