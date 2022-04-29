@extends('admin.master')

@section('content')


<div class="grid">
    
        <div class="twitter">
          <a href="#"><i class="fab fa-google"></i>Sign in With Google</a>
        </div>

    <div class="container1">
      <form method="POST" action="{{ route('login') }}">
      @csrf

      <x-logincomponent />
    </form>
      <div class="row ">
                            <div class="col-md-12 text-center">
                               
                               @if (Route::has('register'))
                                Not A Member?
                                    <a class="btn btn-link" href="{{ route('register') }}">
                                       <span class="font-weight-bold ">Signin</span>
                                    </a>
                                @endif
                               
                            </div>
                        </div>
        
     
    </div>
 </div>


@endsection
