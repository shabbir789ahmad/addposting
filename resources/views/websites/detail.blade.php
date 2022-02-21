@extends('master.master')
@section('content')
<div class="container con mt-4">
  <div class="row" >
   <div class="col-md-8 col-12 ">
    <div class="imgs">
      @foreach($images as $image)
      @if($loop->first)
    	 <img src="{{asset('uploads/product/'.$image['product_images'])}}" width="100%" height="500rem" id="imgs">
       @endif
       @endforeach
    	</div>
     <div class="item_imges mt-1">
     	    @foreach($images as $image)
          <div onclick="changepic(this)" class="p-1 w-25">
          <img src="{{asset('uploads/product/'.$image['product_images'])}}" width="90%" height="90%" >
        </div>
          @endforeach
     	
     </div>
   </div>
   <div class="col-md-4 col-12">
     <div class="card card_border">
      <div class="card-body">
       <div class="item_price">
       	<h5>Rs. {{$products['price']}}</h5>
       	<div class="icon">
          <i class="fa-solid fa-share-nodes fa-lg pr-3"></i>
         <i class="fa-solid fa-heart fa-lg"></i>
        </div>
       </div>
       <div class="item_pri">
       	<div class="icon2">
       	   <i class="fa-solid fa-table-cells p-1"></i>
       	   <p class="pt-0 ml-4">{{$products['area']}} {{$products['areaunit']}}</p>
         </div>
         <div class="icon2 ml-2 ml-5">
       	   <i class="fa-solid fa-bed p-1 ml-3"></i>
       	   <p class="pt-0 ml-1">{{$products['bedroom']}} Bed</p>
         </div>
       </div>
       <p class="p-name">{{ucfirst($products['name'])}}</p>
       <div class="item_price">
       	<p>{{ucfirst($products['location'])}}</p>
        <p>3 days ago</p>
       </div>
      </div>
     </div>
     <!-- //seller description -->
     <div class="card card_border mt-4 p-0">
      <div class="card-body p-0 pt-4">
       <p class="description">Seller Description</p>
       <div class="selller_description">
        <img src="{{asset('pic/iconProfilePicture.7975761176487dc62e25536d9a36a61d.png')}}" width="20%">
        <div class="seller_name mt-2">
         <h6 class="p-0">{{ucfirst($products['user_name'])}}</h6>
         <p class="p-0">Member since Aug 2017</p>
         
        </div>
        <i class="fa-solid fa-arrow-right-long fa-lg "></i>
       </div>
       <button  class="btn btn_chat">Chat With Seller</button>
        <div class="phone text-center mt-3">
          <i class="fa-solid fa-phone fa-lg mt-3 pr-5">..</i>
          @if(Auth::user())
            <p class="mt-2 ml-5">{{$products['phone']}}</p>
          @else
          <p class="mt-2 ml-5">********</p>
          <a href="#" class="p-0 ml-3">Show Number</a>
          @endif
        </div>
      </div>
     </div>
   </div>
  </div>
</div>

<div class="container con mt-4">
 <div class="row" >
   <div class="col-md-8 col-12 ">
   <!-- //seller description -->
     <div class="card card_border mt-4 p-0">
      <div class="card-body p-2 pt-4">
       <p class="descriptio mb-0"> Description</p>
       
         <p class="p-0 ">{{ucfirst($products['detail'])}}</p>
         
       
       
      </div>
     </div>


    <div class="card card_border mt-2">
     <div class="card-body">
       <div class="detail">
        <h5>Detail</h5>
        <div class="row">
        	<div class="col-md-6 ">
        		<div class="price"><p>Price</p><p>Rs.{{$products['price']}}</p></div>
            @if($products['bedroom'])
        		<div class="price"><p>Bedrooms</p><p>{{$products['bedroom']}}</p></div>
            @endif
        		<div class="price"><p>{{$products['areaunit']}}</p><p>{{$products['total_area']}}</p></div>
        	</div>
        	<div class="col-md-6">
        		<div class="price"><p>Furnished</p><p>Unfurnished</p></div>
        		<div class="price"><p>Bathrooms</p><p>3</p></div>
        		<div class="price"><p>Area</p><p>200</p></div>
        	</div>
        </div>
       </div>
       <hr>
       <div class="descption row">
        <div class="col-md-6 col-12 ">
        <h5>Description</h5>
       
        <h6>Key Features:</h6>
         <ul class="list-unstyled">
          @foreach($features as $feature)
          <li>{{$feature['product_feature']}}</li>
         @endforeach
        </ul>
         
     </div>
        <div class="col-md-6 col-12 ">

       <h6 class="mt-3">Key Features:</h6>
        <ul class="list-unstyled">
          <li>3 Bedroom with attach bath</li>
          <li>Kitchen</li>
          <li>Garage</li>
          <li>Storeroom</li>
          <li>Double T. V lounge</li>
          <li>Drawing room</li>
          <li>Dining Room</li>
          <li>Tiled flooring</li>
          <li>Solid Stylish Doors</li>
        </ul>
     </div>
       </div>
      </div>
    </div>
   </div>
   <div class="col-md-4 col-12 border">

   </div>
 </div>
</div>

<!-- products -->

 <div class="container mt-5">
  <p class="browser ">Related Ads</p>
  <div class="container mt-4">
   <div class="owl-carousel">
    @foreach($products2 as $product)
     <div class="card shadow">
       <img src="{{asset('uploads/product/'.\App\Models\Image::where(['product_id' => $product->id])->pluck('product_images')->first())}}" class="product_image">
       <div class="card-body p-1">
        <div class="category_data mb-0">
         <p>{{$product['category_name']}}</p>
         <i class="fa-solid fa-heart text-danger"></i>
        </div>
        <div class="product_data mb-0 mt-0">
          <h5>{{ucfirst($product['name'])}}</h5>
          <p>{{ucfirst($product['location'])}}</p>
          <div class="text-center">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
          </div>
         </div>
      </div>
     </div>
     @endforeach
    
   </div>
  </div>
</div>


<script type="text/javascript">
    
    function changepic(a)
    {

      document.getElementById("imgs").src=a.children[0].src;
       
    }

  </script>
@endsection