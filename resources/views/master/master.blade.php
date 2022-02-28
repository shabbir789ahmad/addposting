<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/53bfee5bd7.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" type="text/css" href="{{asset('css/header.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('css/footer.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('css/allproduct.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('css/detail.css')}}">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

  </head>
  <body>
    {{View::make('master.header')}}
  @yield('content')


  {{View::make('master.footer')}}


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{asset('js/category.js')}}"></script>
  <script src="{{asset('js/filter.js')}}"></script>
  <script src="{{asset('js/rent.js')}}"></script>
<script type="text/javascript">

  $(document).ready(function(){
  $('.owl-carousel').owlCarousel({
    loop:false,
    margin:10,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        500:{
            items:2
        },
        
        1000:{
            items:4
        }
    }
})});

  $(document).ready(function(){
  $(".a").slice(0,20).show();
  $("#seeMore").click(function(e){
    e.preventDefault();
    $(".a:hidden").slice(0,20).fadeIn("slow");
    
    if($(".a:hidden").length == 0){
       $("#seeMore").fadeOut("slow");
      }
  });

   $(".b").slice(0,20).show();
  $("#seeMore").click(function(e){
    e.preventDefault();
    $(".b:hidden").slice(0,20).fadeIn("slow");
    
    if($(".b:hidden").length == 0){
       $("#seeMore").fadeOut();
       $("#h1").css("display",'block').fadeIn('slow')
      }
  });
})
</script>
<script>

    var baseURL = "{{ url("") }}" + "/";

 
  </script>
  </body>
</html>


