<div class="card shadow " >
    <i class="fa-regular fa-heart  haart_style like_by_customer2" data-id="{{$product['id']}}"></i>

      <a href="{{route('ads.detail',['id'=>$product['id']])}}" class="link">
     
       <img src="{{asset('uploads/product/'.$product->img['product_images'])}}" class="product_image">
      
       <div class="card-body pt-1">
        <div class="category_data mb-0">
         <p>{{$product['category_name']}}</p>
        </div>

         <div class="varified mb-0">
         @if($product['ads_type'] == 'free')
         @else
         <p>{{ucfirst($product['ads_type'])}}</p>
         @endif
        </div>

        <div class="product_data mb-0 mt-0 d-flex">
          <h5>{{ucfirst($product['name'])}}</h5>
          
         
        </div>
        <div class="product_data mb-0 mt-0">
          <p class="m-0 area2"><i class="fa-solid fa-location-dot text-dark"></i>  {{ucfirst($product['city'])}} 
           
          </p>
         </div>

        <div class="product_data2 mb-0 mt-0">

            <div class="area">
              <div class="icon_size">
                <i class="fa-solid fa-box icon_size text-dark"></i>  {{$product['total_area']}} {{ucfirst($product['areaunit'])}}
              </div>
             @if($product['bedroom'])
              <div class="icon_size">
                <i class="fa-solid fa-bed icon_size p-1 ml-3 text-dark"></i>{{$product['bedroom']}}
              </div>
              @endif 
             @if($product['bathroom'])
              <div class="icon_size">
                <i class="fa-solid fa-bath icon_size text-dark"></i> {{$product['bathroom']}}
              </div>
             @endif
            </div>
             <div class="ms-auto price">
            <span class="text-center text-danger">  {{$product['price']}}  AED</span>
            </div>
          
        </div>
        
         
        
      </div>
   
       <!--  @php $now = time(); @endphp
        @php $datediff = $now - strtotime($product['created_at']); @endphp
        <p class="mt-0 p-0 text-center text-dark card-footer">{{floor($datediff / (60 * 60 * 24))}} days ago</p> -->

 
      
     </a>
     </div>
