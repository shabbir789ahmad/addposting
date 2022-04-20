@extends('master.master')
@section('content')

<div class="container con mt-4">
 <div class="card">
  <div class="card-body">
  	<form action="{{route('searchresult')}}" method="GET">
   <div class="row">
   	
    <div class="col-md-4 p-0 m-1">
     <input type="search" name="search" class="form-control" placeholder="Search Here">
    </div>
    <div class="col-md-2 p-0 m-1">
     <select class="form-control" name="buy_rent">
   	  <option value="sale">Buy</option>
   	  <option value="rent">Rent</option>
     </select>
    </div>
    <div class="col-md-2 p-0 m-1">
     <select class="form-control" name="bed">
   	   <option value="1">1 bed</option>
   	   <option value="2">2 bed</option>
   	   <option value="3">3 bed</option>
   	   <option value="4">4 bed</option>
   	   <option value="5">5 bed</option>
   	   <option value="6">6 bed</option>
   	   <option value="7">7 bed</option>
   	 
     </select>
    </div>
    <div class="col-md-2 p-0 m-1" >
     <select class="form-control border border-secondary" name="amenities">
       <option selected disabled hidden> Amenities</option>
       @foreach($features as $feature)
       <option value="{{$feature['sub_category_name']}}">{{ucfirst($feature['sub_category_name'])}}</option>
       @endforeach
      </select>
    </div>
    <div class="col-md-1 p-0 d-flex m-1">
     <button class="btn border bg-light" ><i class="fas fa-search"></i> Search</button>
    </div>
  </form>
   </div>
  </div>
 </div>
</div>
<div class="container con mt-4">
  <div class="card">
   <div class="card-body"> 
    <div class="row">
    <div class="col-md-4">
    <h5 class="mt-2">Properties Search Result</h5>
    </div>
    <div class="col-md-4">

    </div>
    <div class="col-md-4 d-flex">
     <select class="form-control" id="sale_by">
   	  <option>Sort By Property</option>
     
   	  <option value="sale">Property for Sale</option>
      <option value="rent">Property for Rent</option>
     
     </select>
    </div>
   </div>
  </div>
 </div>
</div>

<div class="container mt-3">
 <div class="card">
  <div class="card-body">
    <div class="row">
     <div class="col-md-3">
        <h5>Filters</h5>
        <hr>
        <h6 class="mt-4 mb-3">By Categories</h6>
        <select class="form-control border border-secondary" id="categori2">
          <option selected hidden disabled>Filter by Category</option>
          @foreach($categories as $category)
          <option value="{{$category['id']}}" >{{$category['category_name']}}</option>
          @endforeach
        </select>

         <hr>
        <h6 class="mt-4">By City</h6>
        <select class="form-control border border-secondary" id="city">
          <option selected hidden disabled>Filter by City</option>
          @foreach($cities as $city)
          <option value="{{$city['city']}}" >{{ucfirst($city['city'])}}</option>
          @endforeach
        </select>

         <hr>
        <h6 class="mt-4">By Area Unit</h6>
        <select class="form-control border border-secondary" id="areaunit">
          <option selected hidden disabled>Filter by Area Unit</option>
          @foreach($areas as $area)
          <option value="{{$area['areaunit']}}" >{{ucfirst($area['areaunit'])}}</option>
          @endforeach
        </select>

     </div>
     <div class="col-md-9">

       @foreach($products as $product)
      
       <div class="card p-0 mt-2 border border-secondary">
        <div class="card-body p-0">
          <i class="fa-regular fa-heart  heart_search ms-auto like_by_customer" data-id="{{$product['id']}}"></i>
           <a href="{{route('ads.detail',['id'=>$product['id']])}}" class="link">
          <div class="row">
            <div class="col-md-4">
              @foreach($image as $img)
                @if($img['product_id']==$product['id'])
                 <img src="{{asset('uploads/product/'.$img['product_images'])}}" class="product_image">
                @endif
              @endforeach
            </div>
            <div class="col-md-8">
              <div class="category_data2 mb-0">
                <p>{{$product['category_name']}}</p>
              </div>
              <div class="product_data mb-0 mt-2 d-flex">
                <h5>{{ucfirst($product['name'])}}</h5>
                  
                 
              </div>
              <div class="product_data mb-0 mt-2 d-flex">
                <h5>${{$product['price']}}</h5>
              </div>
              

              <div class="icon_bed" >
                
                @if($product['bedroom'])
                <div class="bed ">
                 <img src="{{asset('pic/icons8-relax-100.png')}}" width="25%" >  {{$product['bedroom']}}+
                </div>
                @endif
                @if($product['bathroom'])
                <div class="bed ">
                 <img src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/64/000000/external-washbasin-bathroom-kiranshastry-lineal-kiranshastry.png" width="25%" />  {{$product['bathroom']}}+
                </div>
                @endif
                @if($product['bathroom'])
                <div class="bed2 ">
                 <img src="https://img.icons8.com/cotton/64/000000/box--v2.png" width="10%" /> {{$product['total_area']}} {{ucfirst($product['areaunit'])}}
                </div>
                @endif
               </div>

               <div class="icon_bed2" >
                 <p class="m-0">{{ucfirst($product['location'])}} </p>

                 <p class="ml-5" style="margin-left:10%">{{ucfirst($product['city'])}} </p>
               </div>

            </div>
          </div>
          </a>
        </div>
       </div>
       
         @endforeach
         <div class="mt-5"> 
           {!! $products->links() !!}
         </div>
     </div>
    </div>
  </div>
</div>
</div>


<form id="filter_form">
  <input type="hidden" name="category" id="categ_input">
  <input type="hidden" name="city" id="city_input">
  <input type="hidden" name="areaunit" id="areaunit_input">
  <input type="hidden" name="plot_type" id="plot_type_input">
</form>




@endsection

@section('script')
<script type="text/javascript">
  $('#categori2').change(function(){

    let value=$(this).val()
    $('#categ_input').val(value)
    
   $('#filter_form').submit();
  });

  $('#city').change(function(){

    let value=$(this).val()
    $('#city_input').val(value)
    
   $('#filter_form').submit();
  });


   $('#areaunit').change(function(){

    let value=$(this).val()
    $('#areaunit_input').val(value)
    
   $('#filter_form').submit();
  });

   $('#sale_by').change(function(){

    let value=$(this).val()
    $('#plot_type_input').val(value)
    
   $('#filter_form').submit();
  });
</script>

@endsection