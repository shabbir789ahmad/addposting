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
      <form action="{{route('ads.destroy',['id'=>$product['id']])}}" method="POST" class="text-center  card-footer">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger w-50 text-center btn-sm">Delete</button>
      </form>
      
      
     </div>
 
    </div>
  @endforeach

 
</div>
	@else
	  <div class="col-12">
	  	<x-resource-empty resource="ads" new="ads.index2"></x-resource-empty>
	  </div>
	  </div>
   @endif
</div>



@endsection