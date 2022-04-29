<div class="row">
            <div class="col-md-4 col-12">
              <img src="{{asset('uploads/product/'.$product->img['product_images'])}}" class="product_image">
               
            </div>
            <div class="col-md-8 col-12">
              <a href="{{route('ads.detail',['id'=>$product['id']])}}" class="link">
              <div class="category_data2 mb-0">
                <p>{{$product['category_name']}}</p>
              </div>
              <div class="product_data mb-0 mt-2 d-flex ">
                <h5>{{$product['price']}} AED</h5> 
                <p class=" text-dark">Premium</p>
              </div>
              <div class="product_data mb-0 text-danger d-flex">
                <h5>{{ucfirst($product['name'])}}</h5>
                  
              </div>
              <div class="content_of_add">
              
               <div class="detail_add">
                 
                   <div class="icon2  ml-5">
                    <i class="fa-solid fa-box text-dark p-1 ml-3"></i>
                    <p class="ml-1 text-dark">{{$product['total_area']}} {{$product['areaunit']}} </p>
                  </div>
                
                  @if($product['bedroom'])
                   <div class="icon2 pl-5">
                    <i class="fa-solid fa-bed fa-md p-1  text-dark"></i>
                    <p class=" ml-1 text-dark">{{$product['bedroom']}} Bedroom</p>
                  </div>
                 @endif
                  @if($product['bathroom'])
                   <div class="icon2  ml-5">
                    <i class="fa-solid fa-bath p-1 ml-5 text-dark"></i> 
                    <p class="pt-0 ml-1 text-dark">{{$product['bathroom']}} Bathroom</p>
                  </div>
                 @endif
                 
               </div>
               <div class="add_comany_img" >
               <img src="{{asset('pic/2416-logo.webp')}}" width="100%" class="mr-2">
               </div>
              </div>
              <div class="product_data mb-0 mt-0">
          <p class="m-0 area2"><i class="fa-solid fa-location-dot text-dark"></i> {{ucfirst($product['location'])}}  {{ucfirst($product['city'])}} 
           
          </p>
         </div>
               </a>
 
              
              <div class="d-flex contact_buttom " >
                 <button  class="btn btn_chat pl-0 call"><i class="fa-solid fa-phone"></i> Call</button>

                  <button  class="btn btn_chat pl-0 email bg-danger" ><i class="fa-solid fa-envelope"></i> Email</button>
         
      
                  <button class="btn btn_chat show_number bg-success"><i class="fa-brands fa-whatsapp"></i> WhatsApp</button>
                  
                  <i class="fa-regular fa-heart  heart_search ms-auto like_by_customer" data-id="{{$product['id']}}"></i>
              </div>

            </div>
          </div>