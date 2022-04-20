<div class="col-md-3 a b">
      
     <div class="card shadow card_height" >
      <i class="fa-regular fa-heart  haart_style like_by_customer2" data-id="{{$product['id']}}"></i>
      <a href="{{route('ads.detail',['id'=>$product['id']])}}" class="link">
       <img src="{{asset('uploads/product/'.\App\Models\Image::where(['product_id' => $product->id])->pluck('product_images')->first())}}" class="product_image">
       <div class="card-body pt-1">
        <div class="category_data mb-0">
         <p>{{$product['category_name']}}</p>
        </div>
        <div class="product_data mb-0 mt-0 d-flex">
          <h5>{{ucfirst($product['name'])}}</h5>
          
         
        </div>
        <div class="product_data mb-0 mt-0">
          <p class="m-0">{{ucfirst($product['location'])}} <span class="text-center">${{$product['price']}}</span></p>
        </div>
        
      </div>
      @php $now = time(); @endphp
        @php $datediff = $now - strtotime($product['created_at']); @endphp
        <p class="mt-0 p-0 text-center text-dark card-footer">{{floor($datediff / (60 * 60 * 24))}} days ago</p>
     </a>
     </div>
   
      </div>