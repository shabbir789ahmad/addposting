@extends('master.master')
@section('content')
<style type="text/css">
	.card_hover_agent:hover{
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
</style>


<div class="container-fluid mt-4" >

 <div class="agent mb-5">
  <div class="row">
   <div class="col-md-3">

    <div class="card shadow " >
    

      <a href="" class="link">
     
       <img src="{{asset('pic/ximg_4.jpg.pagespeed.ic.BUEZMeneMq.webp')}}" class="product_image" width="100%">
      
       <div class="card-body pt-1">
        <div class="product_data mb-0 mt-0 d-flex">
          <h5>Shabbir Ahmad</h5>
          
         
        </div>
        <div class="product_data mb-0 mt-0">
          <p class="m-0 area2">  Property Consultant 
           </p>
         </div>
         <div class="product_data mb-0 mt-0">
          <p class="m-0 area2">  NATIONALITY:  Pakistan
           </p>
         </div>
         <div class="product_data mb-0 mt-0">
          <p class="m-0 area2">  LANGUAGES:  Urdu, Punjabi
           </p>
         </div>

      </div>
   
      

 
      
     </a>
     </div>

   </div>

  </div>
</div>
</div>
@endsection