@extends('master.master')
@section('content')

@foreach($sliders as $slider)
<img class="d-block w-100" src="{{asset('uploads/user/'.$slider->slider)}}" alt="Third slide" width="100%" height="600rem" class="img">
<div class="container_background3 text-center">
   
</div>
<div class="container_background2 ">
  <div class="container mt-5 text-center">
    <h1 class="heading">{{ucfirst($slider->heading1)}}</h1>
   <p>{{ucfirst($slider->heading2)}}</p>
   <div class="row bg-light rounded p-4 pb-5">
    <div class="row">
      <form action="{{route('searchresult')}}" method="GET">
      
     <div class="col-md-3 col-12 all_checkbox p-0">
       <div type="button" class="input_checkbox3  p-2 mt-2">
         <label>Buy</label>
         <input type="checkbox" name="buy" value="buy" class="buy" >
       </div>
       <div type="button" class="input_checkbox3  p-2 mt-2">
         <label>Rent</label>
         <input type="checkbox" name="buy" value="rent" class="buy" >
       </div>
     </div>
    </div>
    
    <div class="col-md-4 col-12 col-sm-12 mt-2 p-1">
     <input type="search" name="search" class="form-control border border-secondary" placeholder="Search Here">
    </div>
    <div class="col-md-2 col-6 col-sm-12 p-0 mt-2 p-1">
      <select class="form-control border border-secondary" name="category">
   	   <option selected disabled hidden>Property Type</option>
       @foreach($categories as $category)
   	   <option value="{{$category['id']}}">{{ucfirst($category['category_name'])}}</option>
       @endforeach
      </select>
    </div>
    <div class="col-md-2 col-6 col-sm-12 mt-2 p-1">
      <select class="form-control border border-secondary" name="city">
       <option selected disabled hidden>Select City</option>
       @foreach($cities as $city)
       <option value="{{$city['city']}}">{{ucfirst($city['city'])}}</option>
       @endforeach
      </select>
    </div>
    <div class="col-md-2 col-6 col-sm-12 mt-2 p-1">
      <select class="form-control border border-secondary" name="city">
       <option selected disabled hidden>Bed Rooms</option>
       @foreach($cities as $city)
       <option value="1">1</option>
       <option value="2">2</option>
       <option value="3">3</option>
       <option value="4">4</option>
       <option value="5">5</option>
       <option value="6">6</option>
       <option value="7">7</option>
       @endforeach
      </select>
    </div>
    <div class="col-md-2 col-12 col-sm-12 mt-2 p-2">
      <button class="btn btn-lg  search_btn w-100" type="submit"> Search</button>
     <label class="show_more_filter mt-2">More Filter  <i class="fas fa-arrow-down rounded border border-dark py-1 px-2 "></i></label>
    </div>

   
     
   
    <div class="row more_filter" style="display:none">
    
    <div class="col-md-3 col-6 col-sm-12 mt-2 p-1">
      <select class="form-control border border-secondary" name="areaunit" >
        <option selected disabled hidden> Area Unit</option>
        @foreach($areas as $area)
       <option value="{{$area['areaunit']}}">{{ucfirst($area['areaunit'])}}</option>
       @endforeach
      </select>
    </div>
    <div class="col-md-3 col-6 col-sm-12 mt-2 p-1">
      <select class="form-control border border-secondary" name="min_price">
       <option selected disabled hidden>Minimum Price</option>
       @foreach($prices as $price)
       <option value="{{$price['price1']}}">${{ucfirst($price['price1'])}}</option>
       @endforeach
      </select>
    </div>
    <div class="col-md-3 col-6 col-sm-12 mt-2 p-1">
      <select class="form-control border border-secondary" name="max_price">
       <option selected disabled hidden>Maximum Price</option>
       @foreach($prices as $price)
       <option value="{{$price['price1']}}">${{ucfirst($price['price1'])}}</option>
       @endforeach
      </select>
    </div>
    <div class="col-md-3 col-6 col-sm-12 mt-2 p-1">
      <select class="form-control border border-secondary" name="amenities">
       <option selected disabled hidden> Amenities</option>
       @foreach($features as $feature)
       <option value="{{$feature['sub_category_name']}}">{{ucfirst($feature['sub_category_name'])}}</option>
       @endforeach
      </select>
      <label class="hide_more_filter mt-2 float-right">Hide Filter
      <i class="fas fa-arrow-up rounded border border-dark py-1 px-2 "></i></label>
    </div>
    </div>
   </div>
  </div>
</div>
</form>
@endforeach

 <div class="container mt-5">
  <p class="browser ">Browser By Category</p>
  
  <div class="row">
   @foreach($categories->slice(0,12) as $category)
  
   <div class="col-md-3 col-lg-2 col-6 col-sm-6  text-center" >
     <a href="{{route('all.ads',['id'=>$category['id']])}}" class="link text-dark">
    <div class="card card_hover mt-2  shadow" style="height: 10rem;">
	  <div class="card-body p-0 card_items">
       <img src="{{asset('/uploads/user/'.$category['category_image'])}}" width="40%" class="mt-1">
       <p class="p-2 mb-0">{{ucfirst($category['category_name'])}}</p>
       <button class="btn btn-lg ">{{\App\Models\Product::where(['category_id' => $category->id])->count()}}</button>
	  </div>
	 </div>
   </a>
  </div>

  @endforeach
 

 </div>
</div>


<!-- products -->

 <div class="container mt-5">
  <p class="browser ">All Ads</p>
   
   <div class="owl-carousel">
  
    @foreach($products as $product)
    <a href="{{route('ads.detail',['id'=>$product['id']])}}" class="link">
     <div class="card shadow card_height" >
      @foreach($image as $img)
      @if($img['product_id']==$product['id'])
       <img src="{{asset('uploads/product/'.$img['product_images'])}}" class="product_image">
       @endif
       @endforeach
       <div class="card-body pt-1">
        <div class="category_data mb-0">
         <p>{{$product['category_name']}}</p>
        </div>
        <div class="product_data mb-0 mt-0 d-flex">
          <h5>{{ucfirst($product['name'])}}</h5>
          
         <i class="fa-solid fa-heart text-danger ms-auto"></i>
        </div>
        <div class="product_data mb-0 mt-0">
          <p class="m-0">{{ucfirst($product['location'])}} <span class="text-center">${{$product['price']}}</span></p>
        </div>
        
      </div>
      @php $now = time(); @endphp
        @php $datediff = $now - strtotime($product['created_at']); @endphp
        <p class="mt-0 p-0 text-center text-dark card-footer">{{floor($datediff / (60 * 60 * 24))}} days ago</p>
     
     </div>
   </a>
  @endforeach

  </div>
</div>


<!-- banner -->

  <div class="container mt-5">
   <div class="row">
    @foreach($banners as $banner)
    <div class="col-md-12 ">
     
      <div class="card shadow">
        <div class="card-body">
      <img src="{{asset('uploads/user/'.$banner['banner'])}}" width="100%" height="500rem" >
  </div>
    </div>
  </div>
  @endforeach
 </div>
</div>

<!-- prodduct with category -->
<div class="container mt-5">
  <p class="browser ">Tranding Today</p>
   
   <div class="owl-carousel">
  
    @foreach($products as $product)
    <a href="{{route('ads.detail',['id'=>$product['id']])}}" class="link">
     <div class="card shadow card_height" >
       @foreach($image as $img)
      @if($img['product_id']==$product['id'])
       <img src="{{asset('uploads/product/'.$img['product_images'])}}" class="product_image">
       @endif
       @endforeach
       <div class="card-body pt-1">
        <div class="category_data mb-0">
         <p>{{$product['category_name']}}</p>
        </div>
        <div class="product_data mb-0 mt-0 d-flex">
          <h5>{{ucfirst($product['name'])}}</h5>
          
         <i class="fa-solid fa-heart text-danger ms-auto"></i>
        </div>
        <div class="product_data mb-0 mt-0">
          <p class="m-0">{{ucfirst($product['location'])}} <span class="text-center">${{$product['price']}}</span></p>
        </div>
        
      </div>
      @php $now = time(); @endphp
        @php $datediff = $now - strtotime($product['created_at']); @endphp
        <p class="mt-0 p-0 text-center text-dark card-footer">{{floor($datediff / (60 * 60 * 24))}} days ago</p>

       
     
     </div>
   </a>
  @endforeach

  </div>
</div>
<!-- products -->

<!--  <div class="container  mt-5">

  <p class="browser">Tranding Today</p>
  <div class="container mt-4">
   <div class="row">
    @foreach($products->slice(0, 4) as $product)
    <div class="col-md-6">
      <a href="{{route('ads.detail',['id'=>$product['id']])}}" class="link">
     <div class="card p-0" style="height: 90%;">
      <div class="card-body p-0">
        <div class="row">
         <div class="col-md-6 col-12" >
          <img src="{{asset('uploads/product/'.\App\Models\Image::where(['product_id' => $product->id])->pluck('product_images')->first())}}" width="100%" height="90%">
         </div>
        <div class="col-md-6 col-12">
          <div class="category_data mt-4 mb-0">
            <p>{{ucfirst($product['category_name'])}}</p>
            <i class="fa-solid fa-heart text-danger fa-2x herth" ></i>
          </div>
          <div class="product_data mb-0 mt-4">
           <h5>{{ucfirst($product['name'])}}</h5>
           <p>{{ucfirst($product['location'])}}<span class="mr-3">${{ucfirst($product['price'])}}</span></p>
           
          </div>
       </div>
     </div>
      </div>
     </div>
   </a>
    </div>
    @endforeach
  
   
  </div>
</div>
</div> -->


<!-- //dfdsf -->
  <div class="container  mt-5 mb-5">
     <p class="browser ">Properties You Like</p>
  <div class="container mt-4">
    <div class="row">
      @foreach($products as $product)
      <div class="col-md-3 a">
      <a href="{{route('ads.detail',['id'=>$product['id']])}}" class="link">
     <div class="card shadow card_height" >
      @foreach($image as $img)
      @if($img['product_id']==$product['id'])
       <img src="{{asset('uploads/product/'.$img['product_images'])}}" class="product_image">
       @endif
       @endforeach
       <div class="card-body pt-1">
        <div class="category_data mb-0">
         <p>{{$product['category_name']}}</p>
        </div>
        <div class="product_data mb-0 mt-0 d-flex">
          <h5>{{ucfirst($product['name'])}}</h5>
          
         <i class="fa-solid fa-heart text-danger ms-auto"></i>
        </div>
        <div class="product_data mb-0 mt-0">
          <p class="m-0">{{ucfirst($product['location'])}} <span class="text-center">${{$product['price']}}</span></p>
        </div>
        
      </div>
      @php $now = time(); @endphp
        @php $datediff = $now - strtotime($product['created_at']); @endphp
        <p class="mt-0 p-0 text-center text-dark card-footer">{{floor($datediff / (60 * 60 * 24))}} days ago</p>
      
     </div>
   </a>
      </div>
      @endforeach


</div>
<a href="#" id="seeMore" class="text-center">Show More</a>
  </div>
  </div>

<div class="container-fluid">
 <div class="card">
  <div class="card-body">
    <div class="row">
     <div class="col-md-4">
      <img src="{{asset('pic/olxMobileApp.f5579f77e849b600ad60857e46165516.webp')}}"  width="100%">
     </div>
     <div class="col-md-4 app">
      <h5 class="mt-5 font-weight-bold">TRY THE OUR APP</h5>
      <p>Buy, sell and find just about anything using the app on your mobile.</p>
     </div>
     <div class="col-md-4 ">
      <h5 class="mt-5">GET YOUR APP TODAY</h5>
      <div class="d-flex">
        <img src="{{asset('pic/iconAppGallery_noinline.6092a9d739c77147c884f1f7ab3f1771.svg')}}"  width="32%">
        <img src="{{asset('pic/iconAppStoreEN_noinline.a731d99c8218d6faa0e83a6d038d08e8.svg')}}"  width="32%">
        <img src="{{asset('pic/iconGooglePlayEN_noinline.9892833785b26dd5896b7c70b089f684.svg')}}"  width="32%">
      </div>
     </div> 
    </div>
  </div>
 </div>
</div>
@endsection