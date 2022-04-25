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
               <img src="{{asset('uploads/img/'.$product['user_image'])}}" width="100%" class="rounded shadow card_border" style="height:10rem">
           	  </div>
              <div class="col-md-8">
               <div class="seller_name mt-2">
                <h6 class="p-0">{{ucfirst($product['user_name'])}}</h6>
                <p class="p-0 mb-0">Member since  {{date('Y',strtotime($product['created_at']))}}</p>
                <p class="p-0">Phone Number : 	 {{$product['phone']}}</p>
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
         <div class="card" >
          <div class="card-body " style="height:19rem;overflow: auto; background: #0E2E50; color: #fff;">
            <h6 class="p-0">Top Categories</h6>
            <div class="row">
             @foreach($categories as $category)
              <div class="col-md-3 col-lg-4 col-6 col-sm-6  text-center text-dark">
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
<div class="container-fluid  mt-5 mb-5">
  <div class="row justify-content-center">

    <div class="col-md-2 " >
      <h3 class=" mt-3">Sort By Agent:</h3>
       @foreach($labours as $labour)
      
       <a href="{{route('vendor.product',['id'=>$labour['user_id']])}}">
       <div class="card border-secondary" style="width:100%" >
          <div class="card-body p-0">
           <img src="{{asset('uploads/user/'.$labour['labour_image'])}}" width="100%" class="" style="height:4rem">
           <h6 class="text-center mt-2">{{$labour['labour_name']}}</h6>
          </div>
        </div></a>
   
       @endforeach
    </div>
  </div>
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

  <form id="category_form">
  	<input type="hidden" name="category_id" id="category_id">
  </form>
@endsection