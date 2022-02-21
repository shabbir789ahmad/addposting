@extends('Dashboard.admin')

@section('content')

<div class="row">
	<div class="col-12">
		<div class="form-group ml-2">
			<x-btn-component route="packages.create"></x-btn-component>
		</div>
	</div>
</div>

<div class="row">
	@if(count($packages) > 0)
	@foreach($packages as $package)
	<div class="col-12 col-sm-4  col-md-6 col-lg-3">
		<div class="card ml-1 mt-3 card_color">
			<div class="card-body pb-2">
               <div class="d-flex">
                <input type="checkbox" name="" class="form-control input" checked>
                <p class="ml-auto package mt-2">{{$package['package_ads']}} Ads</p>
               </div>
               <hr class="m-2">
               <p class="package">Valid Till:<span class="span2 float-right">{{date('d-m-Y', strtotime($package['package_duration']))}} </span></p>
               <hr class="m-2">
               <div class="package_price d-flex">
                  <img src="{{asset('/pic/businessMultiTag.a829cdefa1ba77d11fed885398b72c79.webp')}}" width="30%">
                  @if($package['package_discount'])
                 <p class="discount ml-auto">{{round(($package['package_price']-$package['package_discount'])/$package['package_price']*100)}} %</p>
                 @else
                  <p class="discount ml-auto">0 %</p>
                 @endif
                 <div class="pri ml-auto">
                  <p class="package mb-0 p-0">Rs. {{$package['package_price']}}</p>
                  <del class="span mb-0 p-0">Rs. {{$package['package_price']-$package['package_discount']}}</del>
                 </div>
               </div>
               <hr class="m-2">
               <div class="text-center">
               	<button type="button" class="btn btn-xs btn-warning discount " data-id="{{$package['id']}}">
				  Discount
				  </button>
			     <a href="{{ route('packages.edit', ['id' => $package->id]) }}" type="submit" class="btn btn-xs btn-info  ">
				  Edit
				  </a>
				  <form action="{{ route('packages.destroy', ['id' => $package->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
				  @method('DELETE')
				  @csrf
				   <button type="submit" class="btn btn-xs btn-danger ">
						Delete
				   </button>
				  </form>
			   </div>		
					

				

				
							
			</div>
		</div>
	</div>
	@endforeach
	@else
	  <div class="col-12">
	  	<x-resource-empty resource="package" new="package.create"></x-resource-empty>
	  </div>
   @endif
</div>



<!-- Modal -->
<div class="modal fade" id="discountModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('packages.update2')}}" method="POST">
      	@csrf
      	@method('PUT')
      	<input type="hidden" name="id" id="did">
      	<label for="" class="font-weight-bold mt-2">
			Package Disocunt <span class="text-danger">*</span>
			</label>
			<input type="number" class="form-control" name="package_discount" placeholder="Package Discount" >
			<span class="text-danger">@error ('package_discount') {{$message}}@enderror</span>
     
      </div>
      <div class="modal-footer">
      
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
       </form>
    </div>
  </div>
</div>
@endsection