
    <nav class="navbar_list" style="overflow:hidden;">
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars fa-lg"></i>
      </label>
      <label class="logo"><a href="{{url('/')}}" class="link text-light">Real<span>Estate</span></a></label>

      <ul class="ul mb-0">
        <li class="li"><a  class="  {{ (request()->is('/')) ? 'active' : '' }}"  href="{{url('/')}}">Home</a></li>
        <li class="li"><a href="{{url('searchresult')}}"   class="  {{ (request()->is('searchresult')) ? 'active' : '' }}">Buy</a></li>
        <li class="li"><a href="{{url('searchresult')}}" class="  {{ (request()->is('searchresult')) ? 'active' : '' }}">Rent</a></li>
        <li class="li"><a href="{{url('agent')}}" class="  {{ (request()->is('agent')) ? 'active' : '' }}">Find Agent</a></li>
      </ul>

      <!-- <button class="btn btn_upload_adds"><i class="fa-solid fa-plusd"></i>Post Adds</button> -->
             @guest
          @if (Route::has('login'))
          <a class="btn_upload_login btn float-right" href="{{ route('login') }}">{{ __('Login') }}</a>
          @endif
          @else
          
          @if(Auth::user()->type==1)  
          <div class="btn-group user_img">
            <img src="{{asset('pic/iconProfilePicture.7975761176487dc62e25536d9a36a61d.png')}}" width="100%" class=" dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
           <ul class="dropdown-menu ">
             <li><a class="dropdown-item" href="{{route('vendor.dashboard')}}">Dashboard</a></li>
             <li><a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Log out
              </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-hidden">
               @csrf
             </form></li>
            </ul>
          </div>
          @elseif(Auth::user()->type==0)
           <div class="btn-group user_img">
            <img src="{{asset('pic/iconProfilePicture.7975761176487dc62e25536d9a36a61d.png')}}" width="100%" class=" dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
           <ul class="dropdown-menu ">
             <li><a class="dropdown-item" href="#">Dashboard</a></li>
             <li><a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Log out
              </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-hidden">
               @csrf
             </form></li>
            </ul>
          </div>
          @endif
     @endguest

 

    

    </nav>
 



 