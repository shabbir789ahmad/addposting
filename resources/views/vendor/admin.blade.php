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
 <link rel="stylesheet" href="{{asset('css/home.css')}}">
<style>

.show{

  display:block;
  }
  .hide{
  display:none;
  
  }
#snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;

  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  right: 10%;
  top: 60px;
  font-size: 17px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {top: 0; opacity: 0;} 
  to {top: 60px; opacity: 1;}
}

@keyframes fadein {
  from {top: 0; opacity: 0;}
  to {top: 60px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {top: 30px; opacity: 1;} 
  to {top: 0; opacity: 0;}
}

@keyframes fadeout {
  from {top: 60px; opacity: 1;}
  to {top: 0; opacity: 0;}
}
#content{
  background-color: #E9ECEF;
}
</style>
</head>

<body id="page-top "  >
  <div id="wrapper" >
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="{{asset('uploads/img/'.Auth::user()->user_image)}}">
        </div>
      </a>
      <hr class="sidebar-divider my-0">
       <div class="admin-order text-light ml-3 mt-3">
        Features
      </div>
      <hr class="sidebar-divider">
     
       <li class="nav-item ">
        <a class="nav-link " href="{{route('vendor.dashboard')}}">
          <i class="fas fa-window-maximize text-light"></i>
          <span>Dashboard</span>
        </a>
       </li>
       <li class="nav-item ">
        <a class="nav-link " href="{{route('package.index')}}">
         <i class="fas fa-ad text-light"></i>
          <span>Buy Ads</span>
        </a>
       </li>
       <li class="nav-item ">
        <a class="nav-link " href="{{route('ads.index')}}">
          <i class="fas fa-ad text-light"></i>
          <span>All Ads</span>
        </a>
       </li>
       <li class="nav-item ">
        <a class="nav-link " href="{{route('profile.index')}}">
          <i class="fas fa-address-card text-light"></i>
          <span>Your Profile</span>
        </a>
       </li>
       <li class="nav-item ">
        <a class="nav-link " href="{{route('labour.index')}}">
          <i class="fas fa-address-card text-light"></i>
          <span>Your User</span>
        </a>
       </li>
    
      
      
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content" >
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
            <li class="nav-item border rounded p-2 bg-light border-danger dropdown d-block mt-2 ml-5 bookname" style="z-index:900">
         <a id="navbarDropdown" class=" bg-light dropdown-toggle  text-light mt-4" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
         <a href="" class="mt-5  text-dark " > {{ucwords( Auth::user()->user_name )}}</a>
                                </a>

  <div class="dropdown-menu " aria-labelledby="navbarDropdown">
  <a class="dropdown-item" href="{{ route('logout') }}"
    onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
          </a>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-hidden">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest</p>

         
        </nav>
        <!-- Topbar -->
<div id="snackbar">></div>
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
  <script src="{{asset('js/checkbox.js')}}"></script>

   
  
 @if(Session()->has('success'))
<script>
 var x = document.getElementById("snackbar");
  x.className = "show";
  x.innerHTML='{{ Session('success') }}';
  x.style.backgroundColor ='#182430'
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

</script>
{{Session::forget('success')}}
  @endif
 
<?php $ds='shabbir';?>
<script>
function myFunction(id,res) {
  if(id==1)
  {
    var x = document.getElementById("snackbar");
  x.className = "show";
  x.innerHTML=res;
  x.style.backgroundColor ='#182430'
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
  }
  
}


 $(".add_to_cart").change(function (e) 
 { 
   $(this).is(':checked')
    if($(this).is(':checked')==true)
    {
       e.preventDefault();
       var id=$(this).data('id');
      $.ajax({
            url : '/add-to-cart/' +id,
            method: "GET",
            data: {
                _token: '{{ csrf_token() }}', 
              
            },
      }).done(function(res){

        myFunction(id=1,res)
      }).fail(function(e){
        console.log('erro')
      });
    }else if($(this).is(':checked')==false)
    {
       e.preventDefault();
       var id=$(this).data('id');
      $.ajax({
            url : '/remove-from-cart/' +id,
            method: "GET",
            data: {
                _token: '{{ csrf_token() }}', 
              
            },
      }).done(function(res){

        myFunction(id=1,res)
      }).fail(function(e){
        console.log('erro')
      });
    }
       
});
 //remove from cart
 $('.remove_from_cart').click(function(){
   
   let id=$(this).parents('td').parents('tr').children('.id').find('input').val();
 
  $.ajax({

      url:'remove-from-cart/'+id,
      method:'GET',
  }).done(function(res){
    window.location.reload();

  }).fail(function(){

  });


 });
 //update cart
  $(".update_cart").change(function (e) {
       
       
        let id=$(this).parents('td').parents('tr').children('.id').find('input').val();

       $.ajax({
            url:'update-from-cart/'+id,
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: id, 
                quentity: $(this).val()
            },
            success: function (response) {
               // window.location.reload();
            }
        });
    });
 
</script>
@section('script')
@show
</body>

</html>
