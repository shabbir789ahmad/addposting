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
            <form action="{{route('all.ads',['id'=>request('id')])}}" method="GET">
           
             <select class="form-select mt-4" aria-label="Default select example" id="states2" name="city">

             <option selected hidden disabled>Select City</option>
             @foreach($cities as $city)
              
             <option value="{{$city['city']}}" @if($city['city']==request('city'))  selected  @endif>{{ucfirst($city['city'])}}</option>
             @endforeach
           </select>
          
           

           <select class="form-select mt-4" aria-label="Default select example" name="areaunit">
             <option selected hidden disabled>Select Area Unit</option>
             @foreach($areas as $area)
             <option value="{{$area['areaunit']}}" @if($area['areaunit']==request('areaunit'))  selected  @endif>{{$area['areaunit']}}</option>
             @endforeach
           </select>
           <div class="min_max mt-4">
             <input type="text" name="price1" class="form-control" placeholder="Min" >
             <input type="text" name="price2" class="form-control" placeholder="Max">
           </div>
           <button class="search_btn btn w-100 mt-4 font-weight-bold"><i class="fas fa-search fa-lg"></i>SEARCH</button>
          </div>
        </form>
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


<!-- <div class="container mt-5 "> -->
 <!-- <div class="pill-nav">
  <a  href="#" class="click active" data-id='1'>Populer</a>

  <a href="#" class="click" data-id='3'>Area Unit</a>
  <a href="#" class="click" data-id='4'>Cities</a>
  <a href="#" class="click" data-id='5'>Price Ranges</a>
</div> -->
<!-- <div class="container mt-5">
 
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
</div> -->
<!-- //dfdsf -->
 <!-- //dfdsf -->
  <div class="container-fluid  mt-5 mb-5">
    @foreach($categories as $category)
     @if($category['id']==Request('id'))
     <p class="browser ">{{$category['category_name']}} Ads</p>
     @endif
     @endforeach
  <div class="container-fluid mt-4">
    <div class="row">
      @foreach($products as $product)
     
        <div class="col-md-3">
       <x-card.card2 :product="$product" />
     </div>
   
      @endforeach


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

  <input type="hidden" name="areaunit" id="area_input">
</form>
<form id="city_filter_form">

  <input type="hidden" name="city" id="city_input">
</form>
<form id="price_filter_form">

  <input type="hidden" name="price1" id="price_input1">
  <input type="hidden" name="price2" id="price_input2">
</form>
@endsection