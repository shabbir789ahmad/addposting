<div class="cof">
 <div class="card">
  <div class="card-body">
   <div class="row mt-5">
    <div class="col-md-3 col-12 col-sm-12 text-center text-md-lext">  
      <div class="footer_intro">
       <h5>CLASSY<span>ADS</span></h5>
       <p>Lorem ipsum dolor sit amet, consectetur adipisi elit. Provident rerum unde possimus molestias dolorem fuga, illo quis fugiat!</p>
      </div>
      <div class="social_icon">
       <i class="fa-brands fa-facebook-f f"></i>
       <i class="fa-brands fa-twitter "></i>
       <i class="fa-brands fa-instagram"></i>
       <i class="fa-brands fa-linkedin"></i>
      </div>
    </div>
    <div class="col-md-2 col-12 col-sm-12  mt-2 mt-md-0">
      <div class="footer_intro">
       <h5>Navigations</h5>
      </div>
      <ul class="p-0 footer_list">
     	<li><a href="{{url('/')}}"><i class="fa-solid fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>Home</a></li>
     	<li><a href="{{url('about')}}"><i class="fa-solid fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>About</a></li>
     	<li><a href="{{url('contact')}}"><i class="fa-solid fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>Contact</a></li>
     	<li><a href="#"><i class="fa-solid fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>Feedback</a></li>
     </ul>
    </div>
    <div class="col-md-2 col-12 col-sm-12">
      <div class="footer_intro">
       <h5>Property By City</h5>
      </div>
      <ul class="p-0 footer_list">
        @foreach($cities as $city)
     	<li><a href="#"><i class="fa-solid fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>{{ucfirst($city['city'])}}</a></li>
     	@endforeach
     </ul>
    </div>
    <div class="col-md-2 col-12 col-sm-12">
     <div class="footer_intro">
       <h5>Navigations</h5>
      </div>
      <ul class="p-0 footer_list">
     	@foreach($categories as $category)
      <li><a href="{{route('all.ads',['id'=>$category['id']])}}"><i class="fa-solid fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>{{ucfirst($category['category_name'])}}</a></li>
      @endforeach
     </ul>
    </div>
    <div class="col-md-3 v">
      <div class="footer_intro">
       <h5>NewsLetter Signup</h5>
       <p>Lorem ipsum dolor sit amet, consectetur adipisi elit.adipisi elit</p>
      </div>
      <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Your Email Address" aria-label="Recipient's username" aria-describedby="button-addon2">
  <button class="btn btn-info" type="button" id="button-addon2"><i class="fa-solid fa-arrow-right"></i></button>
</div>
    </div>
   </div>
  </div>
 </div>
</div>