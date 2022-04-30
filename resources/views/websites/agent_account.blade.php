@extends('master.master')
@section('content')

<div class="container-fluid con mt-0 mt-md-2  ">
  
         <div class="card" style="background-color:#0E2E50">
          <div class="card-body p-0" >
          	@foreach($products as $product)
          	@if($loop->first)
             <div class="row ">
              <div class="col-md-8">
                <div class="row">
           	  <div class="col-md-3">

               <img src="{{asset('uploads/user/'.$product['user_image'])}}" width="100%" class="rounded shadow card_border agent_image" >
           	  </div>
              <div class="col-md-8">
               <div class="seller_name2 mt-0 mt-md-2">
                <h6 class="p-0">{{ucfirst($product['user_name'])}}</h6>
               
                <p class="p-0">Phone:  <span class="color">{{$product['phone']}}</span></p>
                <p class="p-0">Email: <span class="color"> {{$product['email']}}</span></p>
                <p class="p-0">About Me: <span class="color"> {{$product['about_me']}}</span></p>
                
               </div>
           	  </div>
             </div>
           </div>
              <div class="col-md-3">
                <div class="contact_agent mt-3 text-center">
                  <h3>Contact This Agent</h3>
                  <button  class="btn btn_chat bg-danger pl-0 py-3 "><i class="fa-solid fa-phone"></i> Call</button>

                  <button  class="btn btn_chat pl-0 py-3 email bg-danger" ><i class="fa-solid fa-envelope"></i> Email</button>
         
      
                  <button class="btn btn_chat py-3 show_number bg-success"><i class="fa-brands fa-whatsapp"></i> WhatsApp</button>
                </div>
              </div>
              <!-- <div  class="col-md-1">
                <img src="{{asset('uploads/user/'.$product['user_image'])}}" width="100%" class="rounded shadow card_border" style="height:5rem">
              </div> -->
           </div>
            @endif
            @endforeach
            </div>
          </div>
       
    
  </div>

<div class="container-fluid  mt-5 mb-5">

    <p class="browser ">Properties You Like</p>
  <div class="container-fluid mt-4 p-5" style="background-color:#B0D1FF;">
    <div class="row">
      @if(count($products)>0)

      @foreach($products as $product)
      <div class="col-md-3">
       <x-card.card2 :product="$product" />
     </div>
      @endforeach
   @else
   <x-404not-found />
  @endif
</div>

<h6 id="h1" class="text-center mt-5 text-danger " style="display:none">No More Product In This Category</h6>
  </div>
  </div>

<!-- //dfdsf -->
<!-- <div class="container-fluid mt-5 mb-5 width_card3" >
 
   @foreach($products as $product)
      
       <div class="card p-0 mt-5 mt-md-2 card_height border border-secondary" >
        <div class="card-body p-0">
          
           
          <div class="row">
            <div class="col-md-3 col-4 p-0 ">
              <img src="{{asset('uploads/product/'.$product->img['product_images'])}}" class="product_image" width="100%">
               
            </div>
            <div class="col-md-9 col-8 p-0">
              <a href="{{route('ads.detail',['id'=>$product['id']])}}" class="link ml-2">
              <div class="category_data2 mb-0">
                <p>{{$product['category_name']}}</p>
              </div>
              <div class="product_data mb-0 mt-2 ml-5">
                <h5>{{$product['price']}} AED</h5> 
                <p class="mb-0 text-dark">Premium</p>
              </div>
              <div class="product_data mb-0 text-danger  d-flex">
                <h5>{{ucfirst($product['name'])}}</h5>
                  
              </div>
              <div class="content_of_add">
              
               <div class="detail_add">
                 
                   <div class="icon2  ml-5">
                    <i class="fa-solid fa-box text-dark  p-1 ml-3"></i>
                    <p class="ml-1 text-dark">{{$product['total_area']}} {{$product['areaunit']}} </p>
                  </div>
                
                  @if($product['bedroom'])
                   <div class="icon2 pl-5 d-none d-sm-flex">
                    <i class="fa-solid fa-bed fa-md p-1  text-dark"></i>
                    <p class=" ml-1 text-dark">{{$product['bedroom']}} Bedroom</p>
                  </div>
                 @endif
                  @if($product['bathroom'])
                   <div class="icon2  ml-5 d-none d-sm-flex">
                    <i class="fa-solid fa-bath p-1 ml-5 text-dark"></i> 
                    <p class="pt-0 ml-1 text-dark">{{$product['bathroom']}} Bathroom</p>
                  </div>
                 @endif
                 
               </div>
               <div class="add_comany_img" >
               <img src="{{asset('pic/2416-logo.webp')}}" width="100%" class="mr-2">
               </div>
              </div>
              <div class="product_data mb-0 mt-0">
          <p class="m-0 area2"><i class="fa-solid fa-location-dot text-dark"></i> {{ucfirst($product['location'])}}  {{ucfirst($product['city'])}} 
           
          </p>
         </div>
               </a>
 
              
              <div class="d-flex contact_buttom " >
                 <button  class="btn btn_chat pl-0 call"><i class="fa-solid fa-phone "></i> Call</button>

                  <button  class="btn btn_chat pl-0 email bg-danger" ><i class="fa-solid fa-envelope "></i> Email</button>
         
      
                  <button class="btn btn_chat show_number bg-success "><i class="fa-brands fa-whatsapp "></i> WhatsApp</button>
                  
                  <i class="fa-regular fa-heart  heart_search ms-auto like_by_customer  fa-sm-2x fa-2x" data-id="{{$product['id']}}"></i>
              </div>

            </div>
          </div>
          
        </div>
       </div>
       
         @endforeach
         <div class="mt-5"> 
         
         </div>
  </div> -->

  <form id="category_form">
  	<input type="hidden" name="category_id" id="category_id">
  </form>
@endsection