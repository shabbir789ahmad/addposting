@extends('master.master')
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
<div class="container con mt-5 mb-5">
 <div class="card">
  <div class="card-body">
   <div class="row">
    <div class="col-md-3 text-center sd">
       <div class=" address text-center ">
         <i class="fa-solid fa-location-dot fa-2x"></i>
         <h6 class="mb-0">Address</h6>
         <p class=" p-0"> After reading the article and watching the video </p>
        
       </div>
       <div class=" address ">
         <i class="fa-solid fa-phone fa-2x"></i>
         <h6 class="mb-0">Address</h6>
         <p class=" p-0"> 3454566456 </p>
       </div>
       <div class=" address ">
       	 <i class="fa-solid fa-envelope fa-2x"></i>
         <h6 class="mb-0">Address</h6>
         <p class=" p-0"> dummy@gmail.com </p>
       </div>
    </div>
    <div class="col-md-9 borderleft">
    	@if(session()->has('success'))
          <div class="alert alert-primary" role="alert">
                 {{session()->get('success')}} 
           </div>
    	@endif
     <h5 class="mt-3 font-bold">Send Message</h5>
     <p> After reading the article and watching the video tutorial that I have given below, you can definitely create a beautiful contact form that I have given as an image.</p>
     <form method="POST" action="{{route('send.message')}}">
     	@csrf
     	<label class="mt-2 fw-bold">Name</label>
     	<input type="text" name="name" class="form-control border-secondary">
     	<span>@error ('name') @enderror</span>
     	<label class="mt-2 fw-bold">Email</label>
     	<input type="text" name="email" class="form-control border-secondary">
     	<span>@error ('email') @enderror</span>
     	<label class="mt-2 fw-bold">Message</label>
     	<textarea rows="5" class="form-control border-secondary" name="message"></textarea>
     	<span>@error ('message') @enderror</span>
     	<button class="send_btn mt-3 btn btn-lg ml-auto">Send</button>
     </form>
    </div>
   </div>
  </div>
 </div>
</div>
@endsection