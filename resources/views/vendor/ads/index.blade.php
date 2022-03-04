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
       <div class="card-body pt-1">
        <div class="category_data mb-0">
         <p>{{$product['category_name']}}</p>
        </div>
        <div class="product_data mb-0 mt-0 d-flex">
          <h5>{{ucfirst($product['name'])}}</h5>
          
         <i class="fa-solid fa-heart text-danger ml-auto"></i>
        </div>
        <div class="product_data mb-0 mt-0">
          <p class="m-0">{{ucfirst($product['location'])}} <span class="text-center">${{$product['price']}}</span></p>
        </div>
        
      </div>
      @php $now = time(); @endphp
        @php $datediff = $now - strtotime($product['created_at']); @endphp
        <p class="mt-0 p-0 text-center text-dark card-footer">{{floor($datediff / (60 * 60 * 24))}} days ago</p>
      
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