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
   <div class="col-md-3 ">
     <div class="card card_hover_agent">
     	<div class="card-header p-0">
     		<img src="{{asset('pic/ximg_4.jpg.pagespeed.ic.BUEZMeneMq.webp')}} " width="100%">
     	</div>
     	<div class="card-body">
     	<div class="text-center">
          <h5 class="mb-0">Shabbir Ahmad</h5>
          <p class="mb-2">Property Consultant</p>
     	 </div>
     	 <div class="nationality text-center">
          
          <p class=" mb-0">NATIONALITY:  <span class="  fw-bold">Pakistan</span></p>
          <p>LANGUAGES:  <span class=" fw-bold">Urdu, Punjabi</span></p>
     	 </div>
     	</div>
     </div>
   </div>
  </div>
</div>
</div>
@endsection