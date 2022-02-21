
    <nav class="navbar_list">
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">CLASSY<span>ADS</span></label>
      <button class="btn btn_upload_adds"><i class="fa-solid fa-plus"></i>Post Adds</button>
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
    <ul class="ul">
        <li class="li"><a class="active" href="#">Home</a></li>
        <li class="li"><a href="#">About</a></li>
        <li class="li"><a href="#">Contact</a></li>
      </ul>

    </nav>
 



 