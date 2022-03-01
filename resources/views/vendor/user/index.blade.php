@extends('vendor.admin')
@section('content')

<div class="row ml-2">
	<div class="col-12">
		<div class="form-group">
         	<x-btn-component route="labour.create"></x-btn-component>
		</div>
	</div>
</div>
<div class="row">
	@if(count($labours) > 0)
	<div class="container mt-5">
  <p class="browser ">All Employess</p>
   
   
  <div class="row">
    @foreach($labours as $labour)
    <div class="col-md-4">
    <a href="#" class="link ">
     <div class="card shadow card_height" >
       <img src="{{asset('uploads/user/'.$labour['labour_image'])}}" class="product_image">
       <div class="card-body p-1">
        
        <div class="product_data mb-0 mt-0">
          <h5>{{ucfirst($labour['labour_name'])}}</h5>
         
         <p><span class="float-left">Phone Number:</span><p class="float-right"> {{ucfirst($labour['labour_phone'])}}</p></p><br>
         <p><span class="float-left">Email:</span><p class="float-right"> {{ucfirst($labour['labour_email'])}}</p></p>
        </div>
      </div>
       </a>
      <div class="text-center card-footer">
        <a href="{{route('labour.edit',['labour'=>$labour['id']])}}" class="btn btn-info">Update</a>
            <form action="{{ route('labour.destroy',['labour' => $labour['id']]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-xs btn-danger">
                      Delete
                    </button>
                  </form>
          </div>
     </div>
  
    </div>
  @endforeach

 
</div>
	@else
	  <div class="col-12">
	  	<x-resource-empty resource="Employee" new="labour.create"></x-resource-empty>
	  </div>
	  </div>
   @endif
</div>



@endsection