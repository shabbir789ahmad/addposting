@extends('vendor.admin')
@section('content')


<div class="row">
 <div class="col-md-12 card_color">
  <div class="text-center py-5" style="background-color:#FFF6D9">
   <img src="{{asset('pic/businessMulti.9a0300207061151bc35b7093edbdba6a.webp')}}" width="10%">
   <p class="package mt-4 mb-2">Heavy discount on Packages</p>
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
               
                <input type="checkbox" name="" data-id="{{$package['id']}}" class="form-control input add_to_cart">
               
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


@endsection