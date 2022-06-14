@extends('admin.master')

@section('content')



<div class="grid">
 <div class="container">
      
@if(session()->has('message'))
            <div class="alert alert-danger">
           <strong>Success</strong>{{session()->get('message')}}
            </div>
            @endif

<form method="POST" action="{{route('forgot.send.email') }}">
      @csrf
        <div class="title">Enter Your Email</div>

        <div class="input-box underline">
          <input  id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocu placeholder="Enter Your Email" >
          <div class="underline"></div>
          @error('email')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
        </div>


        <div class="input-box button">
          <input type="submit" name="" value="Continue">
        </div>
      </form>



        
     
    </div>
 </div>


@endsection
