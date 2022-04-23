@extends('master.master')
@section('content')

<div class="container-fluid con mt-4">
  <div class="row" >
   <div class="col-md-12 col-12 ">
      <div class="background-image">
       <img src="{{asset('pic/homeBanner@2x.png')}}" width="100%" >

       <div class="row data_row ">
        <div class="col-md-6 col-12 mr-5">
         <div class="card">
          <div class="card-body " style="height:19rem">
          	@foreach($products as $product)
          	@if($loop->first)
             <div class="row mt-5">
           	  <div class="col-md-4">

               <img src="{{asset('uploads/user/'.$product['labour_image'])}}" width="100%" class="rounded shadow card_border" style="height:10rem">
           	  </div>
              <div class="col-md-8">
               <div class="seller_name mt-2">
                <h6 class="p-0">{{ucfirst($product['labour_name'])}}</h6>
                <p class="p-0 mb-0">Member since  {{date('Y',strtotime($product['created_at']))}}</p>
                <p class="p-0">Phone Number : 	 {{$product['labour_phone']}}</p>
                <p class="p-0"> {{$product['about_me']}}</p>
               </div>
           	  </div>
             </div>
            @endif
            @endforeach
            </div>
          </div>
        </div>
       <div class="col-md-6 col-12 mr-5">
         <div class="card">
          <div class="card-body " style="height:19rem;overflow: auto;">
          	<h6 class="p-0">Top Categories</h6>
            <div class="row">
             @foreach($categories as $category)
              <div class="col-md-3 col-lg-4 col-6 col-sm-6  text-center">
               <div class="card card_hover mt-2  shadow">
	            <div class="card-body p-0 card_items category" data-id="{{$category['id']}}">
                <img src="{{asset('/uploads/user/'.$category['category_image'])}}" width="40%" class="mt-1" style="height:4rem">
               <p class="p-2 mb-0">{{ucfirst($category['category_name'])}}</p>
               </div>
	          </div>
             </div>
            @endforeach
           </div> 
          </div>
         </div>
        </div>
       </div>
      </div>
      </div>
    </div>
  </div>


<!-- //dfdsf -->
  <div class="container  mt-5 mb-5">
     <p class="browser ">Properties You Like</p>
  <div class="container mt-4">
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
<a href="#" id="seeMore" class="text-center">Show More</a>
<h6 id="h1" class="text-center mt-5 text-danger " style="display:none">No More Product In This Category</h6>
  </div>
  </div>

  <form id="category_form">
  	<input type="hidden" name="category_id" id="category_id">
  </form>
@endsection