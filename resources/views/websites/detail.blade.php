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
       	<h5> {{$products['price']}} AED</h5>
       	<div class="icon">
          <i class="fa-solid fa-share-nodes fa-lg pr-3"></i>
         <i class="fa-regular fa-heart fa-lg"></i>
        </div>
       </div>
       <div class="item_pri">
       	<div class="icon2">
       	   <i class="fa-solid fa-table-cells p-1"></i>
       	   <p class="pt-0 ml-4">{{$products['total_area']}} {{$products['areaunit']}}</p>
         </div>
         <div class="icon2 ml-2 ml-5">
       	   <i class="fa-solid fa-bed p-1 ml-3"></i>
       	   <p class="pt-0 ml-1">{{$products['bedroom']}} Bed</p>
         </div>
       </div>
       <p class="p-name">{{ucfirst($products['name'])}}</p>
       <div class="item_price">
       	<p>{{ucfirst($products['location'])}}</p>
        @php $now = time(); @endphp
        @php $datediff = $now - strtotime($products['created_at']); @endphp
        <p>{{floor($datediff / (60 * 60 * 24))}} days ago</p>
       </div>
      </div>
     </div>
     <!-- //seller description -->
     @if($users && !$labours)
     <div class="card card_border mt-4 p-0">
      <div class="card-body p-0 pt-4">
       <p class="description">Company Detail</p>
       <a href="{{route('vendor.product',['id'=>$users['id']])}}" class="mt-3  text-dark link">
       <div class="selller_description">
        <img src="{{asset('uploads/img/'.$users->user_image)}}" width="100%">
        <div class="seller_name mt-2">
         <h6 class="p-0 text-primary">{{ucfirst($users['user_name'])}}</h6>
         <p class="p-0">{{ucfirst($users['about_me'])}}<br> (<span class="text-primary">12 Properties</span>)</p>
         
        </div>

        <!-- <i class="fa-solid fa-arrow-right-long fa-lg "></i> -->
        
       </div></a>
       <p><span class="fw-bold language">Language</span>   <span>English</span>, <span>Urdu</span>, <span>Arabic</span></p>
       <div class="d-flex mb-4">
         <button  class="btn btn_chat pl-0 call"><i class="fa-solid fa-phone"></i> Call</button>

         <button  class="btn btn_chat pl-0 email bg-danger" data-id="{{$users['id']}}" data-name="{{$products['name']}}" data-agent="{{ucfirst($users['user_name'])}}"><i class="fa-solid fa-envelope"></i> Email</button>
         
      
           <button class="btn btn_chat show_number bg-success"><i class="fa-brands fa-whatsapp"></i> WhatsApp</button>
      
       </div>
        
      </div>
     </div>
      @endif
      @if($labours)
     <div class="card card_border mt-4 p-0">
      <div class="card-body p-0 pt-3">
       <div class="d-flex ">
       <p class="description">Agent </p>
       <a href="{{route('vendor.product',['id'=>$labours['user_id']])}}" class="link ms-auto" style="width: 15%;">
         <img src="{{asset('uploads/img/'.$labours->user_image)}}" width="90%" class=" border border-dark " style="border-radius: 50%; object-fit: cover;"></a>
       </div>
       <a href="{{route('agent.product',['id'=>$labours['id']])}}" class="mt-3  text-dark link">
       <div class="selller_description">
        <img src="{{asset('uploads/user/'.$labours->labour_image)}}" >
        <div class="seller_name mt-2">
         <h6 class="p-0">{{ucfirst($labours['labour_name'])}}</h6>
         <p class="p-0">Member since  {{date('Y',strtotime($labours['created_at']))}}</p>
         
        </div>
        <i class="fa-solid fa-arrow-right-long fa-lg "></i>
        
       </div></a>
       <div class="d-flex mb-4">
         <button  class="btn btn_chat pl-0 email" data-id="{{$labours['id']}}" data-name="{{$products['name']}}" data-agent="{{ucfirst($labours['labour_name'])}}">Email</button>
         @if(Auth::user())
         <button class="btn btn_chat">Call {{$labours['labour_phone']}}</button>
         @else
           <button class="btn btn_chat show_number">Show Number</button>
         @endif
       </div>
        
      </div>
     </div>
      @endif
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
        		<div class="price"><p>Price</p><p>${{$products['price']}}</p></div>
            <div class="price"><p>Area</p><p>{{$products['total_area'] }} {{ucfirst($products['areaunit'])}}</p></div>
        	</div>
          <div class="col-md-6 ">
            <div class="price"><p>City</p><p>{{ucfirst($products['city'])}}</p></div>
             @if($products['furnished'])
            <div class="price"><p>Furnished</p><p>{{$products['furnished']}}</p></div>
            @endif
          </div>
        	<div class="col-md-6">
           
            @if($products['bedroom'])
            <div class="price"><p>Bedrooms</p><p>{{$products['bedroom']}}</p></div>
            @endif
            
        	</div>
          <div class="col-md-6">
           
            @if($products['bathroom'])
            <div class="price"><p>Bathrooms</p><p>{{$products['bathroom']}}</p></div>
            @endif
           
          </div>
          <div class="col-md-6">
            @if($products['type'])
            <div class="price"><p>Type</p><p>{{$products['type']}}</p></div>
            @endif
          </div>
          <div class="col-md-6">
             @if($products['plot_type'])
            <div class="price"><p>Type</p><p>{{$products['plot_type']}}</p></div>
            @endif
          </div>
        </div>
       </div>
       <hr>
       <div class="descption row">
        <div class="col-md-6 col-12 ">
        <h5>Description</h5>
       
        <h6>Key Features:</h6>
         <ul class="list-unstyled">
          @foreach($features->slice(0,10) as $feature)
          <li class="text-capitalize">{{$feature['product_feature']}}</li>
         @endforeach
        </ul>
         
     </div>
        <div class="col-md-6 col-12 ">

        <ul class="list-unstyled mt-5">
          @foreach($features->slice(10,20) as $feature)
          <li class="text-capitalize">{{$feature['product_feature']}}</li>
         @endforeach
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
<div class="populer_text text-center mt-5">
  <h3 class="browser ">Related  Ads</h3>
  <p class="br2">Properties In Most Populer Category</p>
</div>
<div class="container-fluid pb-5 pt-5 " style="background-color:#B0D1FF;">
 
   
  <div class="owl-carousel owl-theme "  >
    @foreach($products2 as $product)
    <x-card.card2   :product="$product" />  
    @endforeach
 
  </div>
</div>

 

 <x-email--component />

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login To See Number </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <x-logincomponent />
      </div>
     
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

@section('script')
<script type="text/javascript">
  $('.email').click(function(){
    $('#emailmodal').modal('show');
    let name=$(this).data('name');
    $('#name').text(name)
    let agent=$(this).data('agent');
    $('#agent').text(agent)
    
    document.getElementById("product_image").src=document.getElementById("imgs").src
  })
  $('.show_number').click(function(){
    $('#exampleModal').modal('show')
  })
</script>
@endsection