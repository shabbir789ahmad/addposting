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
   <div class="row bg-dark p-4">
    <div class="col-md-5 col-12 col-sm-12 mt-2">
     <input type="search" name="search" class="form-control" placeholder="Search Here">
    </div>
    <div class="col-md-5 col-12 col-sm-12 mt-2">
      <select class="form-control" name="Category">
   	   <option selected disabled hidden>All Categories</option>
       @foreach($categories as $category)
   	   <option value="{{$category['id']}}">{{ucfirst($category['category_name'])}}</option>
       @endforeach
      </select>
    </div>
    <div class="col-md-2 col-12 col-sm-12 mt-2">
      <button class="btn btn-lg  search_btn w-100"> Search</button>
    </div>
   </div>
  </div>
</div>
@endforeach

 <div class="container mt-5">
  <p class="browser ">Browser By Category</p>
  
  <div class="row">
   @foreach($categories->slice(0,12) as $category)
  
   <div class="col-md-3 col-lg-2 col-6 col-sm-6  text-center">
     <a href="{{route('all.ads',['id'=>$category['id']])}}" class="link text-dark">
    <div class="card card_hover mt-2  shadow">
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
       <img src="{{asset('uploads/product/'.\App\Models\Image::where(['product_id' => $product->id])->pluck('product_images')->first())}}" class="product_image">
       <div class="card-body p-1">
        <div class="category_data mb-0">
         <p>{{$product['category_name']}}</p>
         <i class="fa-solid fa-heart text-danger"></i>
        </div>
        <div class="product_data mb-0 mt-0">
          <h5>{{ucfirst($product['name'])}}</h5>
          <p class="m-0">{{ucfirst($product['location'])}} <span class="text-center">${{$product['price']}}</span></p>
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

<!-- products -->

 <div class="container  mt-5">

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
      </div>
     </div>
   </a>
    </div>
    @endforeach
  
   
  </div>
</div>
</div>


<!-- //dfdsf -->
  <div class="container  mt-5 mb-5">
     <p class="browser ">Properties You Like</p>
  <div class="container mt-4">
    <div class="row">
      @foreach($products as $product)
      <div class="col-md-3 a">
      <a href="{{route('ads.detail',['id'=>$product['id']])}}" class="link">
     <div class="card shadow card_height" >
       <img src="{{asset('uploads/product/'.\App\Models\Image::where(['product_id' => $product->id])->pluck('product_images')->first())}}" class="product_image">
       <div class="card-body p-1">
        <div class="category_data mb-0">
         <p>{{ucfirst($product['category_name'])}}</p>
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