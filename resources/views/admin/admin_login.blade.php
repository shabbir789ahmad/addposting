@extends('admin.master')
@section('content')
<style type="text/css">
    .sd{
        justify-content: center;
      align-items: center;
      display: flex;
      flex-direction: column;
    }
    .address i{
        color: #002F34;
    }
    .borderleft{
        border-left: 2px solid #002F34;
        height: 2%;
        margin-top: 2%;
    }
    .send_btn{
        color: #ffffff;
        background-color: #002f34;
    }
</style>
<div class="">
 <div class="card " style="width: 100%">
  <div class="card-body ">
   <div class="row" style="width:98%">
    <div class="col-md-3 text-center sd">
       
      
       <div class=" address ">
        <h3>Real Estate</h3>
       </div>
    </div>
    <div class="col-md-9 borderleft">
         @if(session()->has('adminerror'))
            <div class="alert alert-danger">
           <strong>Error!</strong>{{session()->get('adminerror')}}
            </div>
            @endif
     <h5 class="mt-3 font-bold">Sign In</h5>
     <p> Sign in to start your session</p>
     <form id="login-form" action="{{ route('admin.authenticate') }}" method="post">
        @csrf
        <label class="mt-2 fw-bold">Email</label>
        <input type="email" class="form-control py-3 border-secondary" name="email" value="{{old('email')}}" />
        <span>@error ('name') @enderror</span>
        <label class="mt-2 fw-bold">Password</label>
        <input type="password" class="form-control py-3 border-secondary" name="password"/>
        <span>@error ('email') @enderror</span>
        
        
        <button type="submit" class="btn send_btn btn-lg mt-5 float-right">Sign In</button>
     </form>
    </div>
   </div>
  </div>
 </div>
</div>
@endsection

