@extends('master.master')
@section('content')
<style type="text/css">
	.card_hover_agent:hover{
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
</style>


<div class="container-fluid con mt-4">
  <div class="row" >
   <div class="col-md-12 col-12 " >
      <div class="background-image" >
       <img src="{{asset('pic/mario-gogh-VBLHICVh-lI-unsplash.jpg')}}" width="100%" >

       <div class="row data_row justify-content-center">
        <div class="col-md-6 col-12 mr-5">
      
            <h2 class="text-light text-center mt-4">Great agents find great properties.</h2>

            <form method="GET" action="{{route('agent')}}" class="mt-5">
           
            <input type="text" name="search" class="form-control" placeholder="Enter Loction Or Agent Name">

            <div class="min_max  d-flex p-1  mt-4">
             <select class="form-control" name="states">
              <option selected hidden disabled>Select Nationality</option>
               @foreach($national as $state)
               <option>{{ucfirst($state)}}</option>
               @endforeach
             </select>
             <select class="form-control" name="designation">
              <option selected hidden disabled>Select Service</option>
               @foreach($agents as $agent)
               <option>{{ucfirst($agent['designation'])}}</option>
               @endforeach
             </select>
           </div>
         
           <button class="search_btn btn w-100 mt-4 font-weight-bold"><i class="fas fa-search fa-lg"></i>SEARCH</button>
         
          </form>
 
        </div>
        </div>
      </div>
      </div>
    </div>
  </div>


<div class="container-fluid mt-4" >

 <div class="agent mb-5">
  <div class="row">
    @foreach($agents as $agent)
   <div class="col-md-3">
    <div class="card shadow " >
     <a href="" class="link">
      <img src="{{asset('uploads/user/'.$agent['user_image'])}}" class="product_image" width="100%">
      
       <div class="card-body pt-1">
        <div class="agent_name mb-0 mt-0 text-center">
          <h5 class="mb-0">{{ucfirst($agent['user_name'])}}</h5>
          
          <p class=" area2">{{ucfirst($agent['designation'])}}  
           </p>
        </div>
        <div class="product_data mb-0 mt-0">
         
         </div>
         <div class="product_data mb-0 mt-0">
          <p class="m-1 area2">  NATIONALITY:<span class="national ml-2">{{ucfirst($agent['national'])}} </span> 
           </p>
         </div>
         <div class="product_data mb-0 mt-0">
          <p class="m-0 area2">  LANGUAGES: <span class="national">{{ucfirst($agent['language'])}} </span>  
           </p>
         </div>

      </div>
   
      

 
      
     </a>
     </div>

   </div>
@endforeach
  </div>
</div>
</div>
@endsection