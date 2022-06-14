@extends('admin.master')

@section('content')



<div class="grid">
 <div class="container">
      
@if(session()->has('adminerror'))
            <div class="alert alert-danger">
           <strong>Error!</strong>{{session()->get('adminerror')}}
            </div>
            @endif

<form method="POST" action="{{route('reset.password.now') }}">
      @csrf
       <input type="hidden" name="token" value="{{ $token }}">
        <div class="title">Login</div>

        <div class="input-box underline">
          <input  id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocu placeholder="Enter Your Email" >
          <div class="underline"></div>
          @error('email')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
        </div>

         

        <div class="input-box">
          <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          <div class="underline"></div>
        </div>

         @error('password')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
         @enderror

       <div class="col-md-12">
        <div class="input-box">
          <input id="password" type="password" class="@error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password" placeholder="Conform Password">
          <div class="underline"></div>
          @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
         @enderror
        </div>
       </div>

        <div class="input-box button">
          <input type="submit" name="" value="Continue">
        </div>
      </form>



        
     
    </div>
 </div>


@endsection
