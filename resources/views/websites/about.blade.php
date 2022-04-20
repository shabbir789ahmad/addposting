@extends('master.master')
@section('content')
<style type="text/css">
	.link_type a{
		text-decoration: none;
		color: #ffffff;
	}

	@media  (max-width: 480px)
	{
		.back_img img{
			height: 15rem;
		}
	  .back_img::before{
         position: absolute;
         content: "";
         height: 15.6%;
         width: 100%;
         top: 5.5%;
         left: 0;
         background: #000;
         opacity: 0.6;
	  }
	.back_img h4{
		position: absolute;
		top: 10%;
		left: 30%;
		font-size: 2rem;
		font-weight: 700;
		color: #ffffff;
	}
	.back_img .link_type{
		position: absolute;
		top: 13%;
		left: 33%;
		font-size: 1.2rem;
		color: #ffffff;
	}
	.video_width{
		width:100%;
	}
	}
	@media (min-width: 481px) and (max-width: 768px) 
	{
		.back_img img{
			height: 17rem;
		}
	  .back_img::before{
         position: absolute;
         content: "";
         height: 18.4%;
         width: 100%;
         top: 5%;
         left: 0;
         background: #000;
         opacity: 0.6;
	  }
	.back_img h4{
		position: absolute;
		top: 10%;
		left: 45%;
		font-size: 2rem;
		font-weight: 700;
		color: #ffffff;
	}
	.back_img .link_type{
		position: absolute;
		top: 13%;
		left: 46%;
		font-size: 1.2rem;
		color: #ffffff;
	}
	.video_width{
		width:60%;
	}
	}
	@media (min-width: 768px) and (max-width: 1024px) 
	{
		.back_img img{
			height: 30rem;
		}
	  .back_img::before{
         position: absolute;
         content: "";
         height: 32%;
         width: 100%;
         top: 5%;
         left: 0;
         background: #000;
         opacity: 0.6;
	  }
	.back_img h4{
		position: absolute;
		top: 16%;
		left: 45%;
		font-size: 2rem;
		font-weight: 700;
		color: #ffffff;
	}
	.back_img .link_type{
		position: absolute;
		top: 20%;
		left: 46%;
		font-size: 1.2rem;
		color: #ffffff;
	}
	.text_color h2::before{
		    position: absolute;
    content: "";
    height: 10px;
    width: 10px;
    border-radius: 50%;
    background: transparent;
    border: 2px solid #e84444;
    top: 47.5%;
    left: 51%;
	}
	.text_color h2::after{
		       position: absolute;
    content: "";
    height: 2px;
    width: 50px;
    
    background: #e84444;
    top: 48%;
    left: 52%;
	}
	.video_width{
		width:50%;
	}
	}

	@media (min-width: 1024px) and (max-width: 1500px) 
	{
		.back_img img{
			height: 30rem;
		}
	  .back_img::before{
         position: absolute;
         content: "";
         height: 32%;
         width: 100%;
         top: 5%;
         left: 0;
         background: #000;
         opacity: 0.6;
	  }
	.back_img h4{
		position: absolute;
		top: 16%;
		left: 45%;
		font-size: 2rem;
		font-weight: 700;
		color: #ffffff;
	}
	.back_img .link_type{
		position: absolute;
		top: 20%;
		left: 46%;
		font-size: 1.2rem;
		color: #ffffff;
	}
	.text_color h2::before{
		    position: absolute;
    content: "";
    height: 10px;
    width: 10px;
    border-radius: 50%;
    background: transparent;
    border: 2px solid #e84444;
    top: 47.5%;
    left: 51%;
	}
	.text_color h2::after{
		       position: absolute;
    content: "";
    height: 2px;
    width: 50px;
    
    background: #e84444;
    top: 48%;
    left: 52%;
	}
	.video_width{
		width:50%;
	}
	}
	@media (min-width: 1501px) and (max-width: 2100px) 
	{
		.back_img img{
			height: 30rem;
		}
	  .back_img::before{
         position: absolute;
         content: "";
         height: 32%;
         width: 100%;
         top: 5%;
         left: 0;
         background: #000;
         opacity: 0.6;
	  }
	.back_img h4{
		position: absolute;
		top: 16%;
		left: 45%;
		font-size: 2rem;
		font-weight: 700;
		color: #ffffff;
	}
	.back_img .link_type{
		position: absolute;
		top: 20%;
		left: 46%;
		font-size: 1.2rem;
		color: #ffffff;
	}
	.text_color h2::before{
		    position: absolute;
    content: "";
    height: 10px;
    width: 10px;
    border-radius: 50%;
    background: transparent;
    border: 2px solid #e84444;
    top: 47.5%;
    left: 51%;
	}
	.text_color h2::after{
		       position: absolute;
    content: "";
    height: 2px;
    width: 50px;
    
    background: #e84444;
    top: 48%;
    left: 52%;
	}
	.video_width{
		width:50%;
	}
	}

	.text_color p{
		color: #666666;
	}
	
	.border_s{
		    height: 2px;
    margin: 20px auto 20px;
    position: relative;
    width: 80px;
    background: #28ABE3;
	}
</style>
<section class=" mt-4 con ">
  <div class="back_img">
    <img src="{{asset('pic/page-title.jpg')}}" width="100%">
    <h4>About Us</h4>
    <div class="link_type">
     <a href="{{url('/')}}">Home</a> /
     <a href="{{url('/about')}}">About</a>
    </div>
  </div>
</section>
<section class=" mt-5  con bg-light">
<div class="container">
 <div class="row">
    <div class="col-md-6">
     <img src="{{asset('pic/philosophy.jpg')}}" width="100%" height="100%">
    </div>
    <div class="col-md-6">
     <div class="text_color mt-5">
     <h6 class="mt-3">About Us</h6>
     <h2 class="">About Us</h2>
    
     <p class="mt-4">RealEstate is the first and largest property portal in Dubai and is among the top five property portals in the world. It was founded in 2022 and has since revolutionised the real estate industry of Dubai by connecting buyers and sellers online in a highly convenient way, making it a household name among Dubai around the world. With over 30 million property listings, and over 5.5 million monthly users, it is the pioneering property portal of Dubai, with more than 18,000 agencies registered.</p>
     <p>RealEstate connects buyers with sellers and tenants with landlords for highly user-friendly real estate experience. The extensive listings and projects on offer provide something for everyone when it comes to property.</p>
     <p>The company is also the pioneer of large-scale real estate events and frequently organizes expos both locally and internationally.. An astounding 400,000 people visit RealEstate Expos every year, and can explore property options with over 500 exhibitors.</p>
     </div>
    </div>
  </div>
</div>
</section>
<section class=" mt-5  con bg-light">
<div class="container w-75">
 <div class="row">
    <div class="col-md-6">
     <div class="text_color mt-5">
     	<h2 class="">Our Mission</h2>
     <span></span>
     <p class="	mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit sed eiusmod tempor didunt laboris nisi ut aliquip ex commodo consequat. duis aute irure dolor in reprehenderivoluptate velit esse cillum dolore fugiat nulla pariatur.Excepteur sint ocaecat cupidatat noproident sunt culpa qui officia deserunt mollit anim id est laborum.</p>
       <img src="{{asset('pic/company-image-2.jpg')}}" width="100%" height="70%">
     
    
     </div>
    </div>
    <div class="col-md-6">
     <div class="text_color mt-5">
     	<h2 class="">Our Vission</h2>
     <span></span>
     <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit sed eiusmod tempor didunt laboris nisi ut aliquip ex commodo consequat. duis aute irure dolor in reprehenderivoluptate velit esse cillum dolore fugiat nulla pariatur.Excepteur sint ocaecat cupidatat noproident sunt culpa qui officia deserunt mollit anim id est laborum.</p>
       <img src="{{asset('pic/company-image-3.jpg')}}" width="100%" height="70%">
     
    
     </div>
    </div>
  </div>
</div>
</section>

<section class=" mt-5  con bg-light">
<div class="container video_width" >
 <div class="row mt-5">
    <div class="col-md-12">
     <div class="text_color mt-5 text-center">
     	<h2 class="">Our Promo Video</h2>
      
     <p class="	mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit sed eiusmod tempor didunt laboris nisi ut aliquip ex commodo consequat. duis aute irure dolor in reprehenderivoluptate velit esse cillum dolore fugiat nulla pariatur .</p>
     <div class="border_s"></div>
       <iframe width="100%" height="300rem" src="https://www.youtube.com/embed/Cyi0frBmI9c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    
     </div>
    </div>
   
  </div>
</div>
</section>
@endsection