@extends('vendor.admin')
@section('content')
<style type="text/css">
	
 
</style>
<div class="card">
	<div class="card-body text-center">
		<img src="{{asset('assets/defaults/signal.png')}}" width="8%">
<h3 class="font-weight-bold text-center mt-3 h3">you are not allowed</h3>
</div>
</div>
@endsection


@extends('vendor.admin')
@section('content')

<div class="container mt-5 mb-5">
 <div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow" >
     <div class="card-header text-center" style="background-color:#FF385C;color: #fff;">
       <h3>Permission Required</h3>
	 </div>
	 <div class="card-body text-center">
	  <p class="font-weight-bold text-center mt-3 h3">You Dont Have Permission </p>
     <h6>Please Contact Your Company</h6>
     </div>
    </div>
  </div>
 </div>
</div>
@endsection