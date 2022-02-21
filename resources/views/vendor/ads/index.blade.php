@extends('vendor.admin')
@section('content')

<div class="row ml-2">
	<div class="col-12">
		<div class="form-group">
         	<x-btn-component route="ads.index2"></x-btn-component>
		</div>
	</div>
</div>
<div class="row">
	@if(count($products) > 0)
	<div class="container mt-5">
  <p class="browser ">All Product</p>
   
   
  <div class="row">
    @foreach($products as $product)
    <div class="col-md-4">
    <a href="#" class="link">
     <div class="card shadow card_height" >
       <img src="{{asset('uploads/product/'.\App\Models\Image::where(['product_id' => $product->id])->pluck('product_images')->first())}}" class="product_image">
       <div class="card-body p-1">
        <div class="category_data mb-0">
         <p>Real Estate</p>
         <i class="fa-solid fa-heart text-danger"></i>
        </div>
        <div class="product_data mb-0 mt-0">
          <h5>{{$product['name']}}</h5>
          <p class="m-0">{{$product['location']}}</p>
        </div>
      </div>
      <div class="text-center card-footer">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star "></span>
            <span class="fa fa-star"></span>
          </div>
     </div>
   </a>
    </div>
  @endforeach

 
</div>
	@else
	  <div class="col-12">
	  	<x-resource-empty resource="package" new="package.create"></x-resource-empty>
	  </div>
	  </div>
   @endif
</div>



@endsection