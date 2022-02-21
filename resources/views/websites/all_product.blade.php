@extends('master.master')
@section('content')
<div class="container-fluid con mt-4">
  <div class="row" >
   <div class="col-md-12 col-12 ">
      <div class="background-image">
       <img src="{{asset('pic/homeBanner@2x.png')}}" width="100%" >

       <div class="row data_row justify-content-center">
        <div class="col-md-6 col-12 mr-5">
         <div class="card">
          <div class="card-body ">
            <h6>Search properties </h6>
            
           <div class="min_max mt-4">
             <select class="form-select mt-4" aria-label="Default select example" id="states2">
             <option selected hidden disabled>Select State</option>
             @foreach($locations as $location)
             <option value="{{$location['id']}}">{{$location['states']}}</option>
             @endforeach
           </select>
           <select class="form-select mt-4" aria-label="Default select example" id="cities">
             
             
           </select>
           </div>
           

           <select class="form-select mt-4" aria-label="Default select example">
             <option selected hidden disabled>Select Area Unit</option>
             @foreach($areas as $area)
             <option value="{{$area['id']}}">{{$area['areaunit']}}</option>
             @endforeach
           </select>
           <div class="min_max mt-4">
             <input type="text" name="" class="form-control" placeholder="Min">
             <input type="text" name="" class="form-control" placeholder="Max">
           </div>
           <button class="search_btn btn w-100 mt-4 font-weight-bold"><i class="fas fa-search fa-lg"></i>SEARCH</button>
          </div>
        </div>
        </div>
        <!-- <div class="col-md-8 mt-2 mt-md-0 mt-sm-2 col-12">
         <div class="card">
          <div class="card-body">
            <h6>Browes By Choice </h6>
           <div class="category_sort">
            <div class="category_data mb-0 active">
            <p>Populer</p>
           </div>
           <div class="category_data mb-0">
            <p>Category</p>
           </div>
           <div class="category_data mb-0">
            <p>By Cities</p>
           </div>
           <div class="category_data mb-0">
            <p>Area Unit</p>
           </div>
           <div class="category_data mb-0">
            <p>Price Ranges</p>
           </div>
            </div>
            <div class="row">
             <div class="col-md-3 col-4 mt-3">
              <div class="card">
               <div class="card-body small_card text-center">
                <h6>Small </h6>
                <p>Houses</p>
               </div>
              </div>
             </div>
             <div class="col-md-3 col-4 mt-3">
              <div class="card">
               <div class="card-body small_card text-center">
                <h6>Small </h6>
                <p>Houses</p>
               </div>
              </div>
             </div>

             <div class="col-md-3 col-4 mt-3">
              <div class="card">
               <div class="card-body small_card text-center">
                <h6>Small </h6>
                <p>Houses</p>
               </div>
              </div>
             </div>

             <div class="col-md-3 col-4 mt-3">
              <div class="card">
               <div class="card-body small_card text-center">
                <h6>Small </h6>
                <p>Houses</p>
               </div>
              </div>
             </div>

             <div class="col-md-3 col-4 mt-3">
              <div class="card">
               <div class="card-body small_card text-center">
                <h6>Small </h6>
                <p>Houses</p>
               </div>
              </div>
             </div>

             <div class="col-md-3 col-4 mt-3">
              <div class="card">
               <div class="card-body small_card text-center">
                <h6>Small </h6>
                <p>Houses</p>
               </div>
              </div>
             </div>


            </div>

           </div>
          </div>
        </div> -->
        </div>
      </div>
      </div>
    </div>
  </div>


<div class="container mt-5 ">
 <div class="pill-nav">
  <a  href="#" class="click active" data-id='1'>Populer</a>
<!--   <a href="#" class="click"  data-id='2'>Categories</a> -->
  <a href="#" class="click" data-id='3'>Area Unit</a>
  <a href="#" class="click" data-id='4'>Cities</a>
  <a href="#" class="click" data-id='5'>Price Ranges</a>
</div>
<div class="container mt-5">
 <!-- <div class="category display_item">
 <div class="row categorys "> 
 
 </div>
 </div> -->
 <div class="populer ">
  <div class="row">
    <div class="col-md-2">
      <div class="card card_hover shadow " id="small" data-id='2'>
       <div class="card-body small_card text-center">
        <h6>Small </h6>
        <p>Houses</p>
       </div>
      </div>
   </div>
   <div class="col-md-2">
     <div class="card card_hover shadow" id="new" data-id='new'>
      <div class="card-body small_card text-center">
       <h6>New </h6>
       <p>Houses</p>
     </div>
   </div>
  </div>
  <div class="col-md-2">
   <div class="card card_hover shadow" id="furnish" data-id='furnish'>
     <div class="card-body small_card text-center">
      <h6>Furnished </h6>
      <p>Houses</p>
    </div>
   </div>
 </div>
 <div class="col-md-2">
  <div class="card card_hover shadow">
    <div class="card-body small_card text-center">
     <h6>Corner </h6>
     <p>Houses</p>
    </div>
   </div>
 </div>
 <div class="col-md-2 ">
  <div class="card card_hover shadow">
    <div class="card-body small_card text-center">
     <h6>Corner </h6>
     <p>Plot</p>
   </div>
  </div>
 </div>
</div>
</div>
 <div class="area display_item">
 <div class="row areas">
 
 </div>
 </div>
 <div class="citis display_item">
  <div class="row citiss">
 
 </div>
 </div>
 <div class="price2 display_item">
  <div class="row price_range">

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
      <div class="col-md-3 a b">
      <a href="{{route('ads.detail',['id'=>$product['id']])}}" class="link">
     <div class="card shadow card_height" >
       <img src="{{asset('uploads/product/'.\App\Models\Image::where(['product_id' => $product->id])->pluck('product_images')->first())}}" class="product_image">
       <div class="card-body p-1">
        <div class="category_data mb-0">
         <p>Real Estate</p>
         <i class="fa-solid fa-heart text-danger"></i>
        </div>
        <div class="product_data mb-0 mt-0">
          <h5>{{ucfirst($product['name'])}}</h5>
          <p class="m-0">{{ucfirst($product['location'])}}</p>
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
   @else
   <x-404not-found />
  @endif
</div>
<a href="#" id="seeMore" class="text-center">Show More</a>
  </div>
  </div>

<form id="filter_form">
  <input type="hidden" name="small" id="small_input">
  
</form>
<form id="filter_form2">

  <input type="hidden" name="new" id="new_input">
 
</form>
<form id="filter_form3">

  <input type="hidden" name="furnish" id="furnish_input">
</form>
<form id="area_filter_form">

  <input type="hidden" name="area" id="area_input">
</form>
<form id="city_filter_form">

  <input type="hidden" name="city" id="city_input">
</form>
<form id="price_filter_form">

  <input type="hidden" name="price1" id="price_input1">
  <input type="hidden" name="price2" id="price_input2">
</form>
@endsection