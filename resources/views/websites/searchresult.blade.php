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
     <select class="form-control">
   	  <option>Buy</option>
   	  <option>Rent</option>
     </select>
    </div>
    <div class="col-md-2 p-0 m-1">
     <select class="form-control">
   	   <option value="1">1 bed</option>
   	   <option value="2">2 bed</option>
   	   <option value="3">3 bed</option>
   	   <option value="4">4 bed</option>
   	   <option value="5">5 bed</option>
   	   <option value="6">6 bed</option>
   	   <option value="7">7 bed</option>
   	  <option>sdf</option>
   	  <option>sdf</option>
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
     <button class="btn border bg-light"><i class="fas fa-search"></i> Search</button>
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
    <h5 class="mt-2">Properties for Rent</h5>
    </div>
    <div class="col-md-4">

    </div>
    <div class="col-md-4 d-flex">
     <select class="form-control">
   	  <option>Sort By</option>
   	  <option>sdf</option>
   	  <option>sdf</option>
     </select>
    </div>
   </div>
  </div>
 </div>
</div>
<div class="container con mt-4">
 <div class="row">
 @foreach($products as $product)
  <div class="col-md-8 p-0" >
    <a href="{{route('ads.detail',['id'=>$product['id']])}}" class="link">
     <div class="card border border-secondary p-0" style="height: 70%;">
      <div class="card-body p-0">
        <div class="row">
         
         <div class="col-md-6 col-12" >
           <img src="{{asset('pic/ximg_2.jpg.pagespeed.ic.5-pth7OZ43.webp')}}" width="100%" height="70%">
          </div>
         <div class="col-md-6 col-12">
          <div class="category_data mt-4 mb-0">
            <p>{{\App\Models\Category::where(['id' => $product->category_id])->pluck('category_name')->first()}}</p>
            
            <i class="far fa-heart text-danger fa-lg herth"></i>
          </div>
          <div class="product_data mb-0 mt-4">
           <h5>{{$product['name']}}</h5>
           <p>{{$product['location']}}</p>
           <p>Price. ${{$product['price']}}</p>
          </div>
          <div class="contact mt-2">
           <button class="btn border" type="button"><i class="fas fa-envelope"></i> Email</button>
           <button class="btn border" id="call" type="button"><i class="fas fa-phone "></i> Call</button>
           <!-- <button class="btn border" type="button"><i class="fab fa-whatsapp"></i> WhatsApp</button> -->
          </div>
       </div>
     </div>
      </div>
     </div>
    </a>
  </div>
  @endforeach
    {!! $products->links() !!}
 </div>
</div>
<script type="text/javascript">
	$('$call').click(function(){
		alert('sd')
	})
</script>
@endsection