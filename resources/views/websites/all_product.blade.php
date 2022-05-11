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
        </div>
      </div>
      </div>
    </div>
  </div>




 <div class="populer_text text-center mt-5">
   @foreach($categories as $category)
     @if($category['id']==Request('id'))
     <h3 class="browser ">{{$category['category_name']}} Ads</h3>
     @endif
     @endforeach

  <p class="br2">Properties In Most Populer Category</p>
</div>


<div class="container-fluid pb-5 pt-5 " style="background-color:#B0D1FF;">
 
 <div class="row"  >
     @foreach($products as $product)
     <div class="col-md-3 mt-3">
    <x-card.card2   :product="$product" />
    </div>  
    @endforeach
  
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