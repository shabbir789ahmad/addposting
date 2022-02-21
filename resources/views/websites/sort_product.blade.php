<!-- @extends('master.master')
@section('content')
<div class="container">
<div class="row">
  <div class="col-md-4">
   <select class="form-control">
    
     @foreach($cities as $city)
      <option>{{$city['city']}}</option>
     @endforeach
    
   </select>
   <form action="" method="POST">
     <input type="search" name="search">
   </form>
  </div>
</div>
</div>
<!-- //dfdsf -->
  <div class="container  mt-5 mb-5">
     <p class="browser ">Properties You Like</p>
  <div class="container mt-4">
    <div class="row">
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


</div>
<a href="#" id="seeMore" class="text-center">Show More</a>
  </div>
  </div>


@endsection -->