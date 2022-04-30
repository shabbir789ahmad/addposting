@extends('admin.master')

@section('content')



<div class="grid">
    
        

    <div class="container1">@if(session()->has('agenterror'))
          
            <span class="invalid-feedback" role="alert">
                 <strong>{{ session()->get('agenterror') }}</strong>
             </span>
             @endif
      <form method="POST" action="{{ route('company.authenticate') }}">
      @csrf
     
      <x-logincomponent />
       </form>
      <div class="row ">
                            <div class="col-md-12 text-center">
                               
                               @if (Route::has('register'))
                                Not A Member?
                                    <a class="btn btn-link" href="{{ route('company.register') }}">
                                       <span class="font-weight-bold ">Signin</span>
                                    </a>
                                @endif
                               
                            </div>
                        </div>
        
     
    </div>
 </div>


@endsection
