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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
 <style type="text/css">
   .owl-prev,.owl-next{
    position: absolute;
    top: 35%;
    border: 2px solid black;
   padding: 1rem 1.2rem !important;
   color: #000 !important;
    background-color: #fff !important;
}
.owl-next{
   
    right: 2%; 
}
.owl-prev{
   
    left: 2%; 
}

.owl-prev:hover , .owl-next:hover  {
    outline: none;
    border: 1px solid #580631 !important;
    color: #580631 !important;
}
 </style>
  </head>
  <body>
    {{View::make('master.header')}}
  @yield('content')


  {{View::make('master.footer')}}


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <script src="{{asset('js/category.js')}}"></script>
  <script src="{{asset('js/filter.js')}}"></script>
  <script src="{{asset('js/rent.js')}}"></script>
<script type="text/javascript">

  $(document).ready(function(){
  $('.owl-carousel').owlCarousel({
      margin: 15,
      nav: true,
      dots:false,
      loop:true,
       navText : ["<i class='fas fa-angle-left fa-2x p-3 border-secondary'></i> </i>","<i class='fas fa-angle-right fa-2x p-3'></i>"],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 4
        }
      }
    });

});

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

  <script type="text/javascript">
  
  $(document).on('click','.like_by_customer',function(){
    let id=$(this).data("id");
    $(this).replaceWith('<i class="fa-solid fa-heart heart_search unlike_by_customer"  data-id='+id+'></i>')
     

     like(id)


  });

 


  $(document).on('click','.unlike_by_customer',function(){
    let id=$(this).data("id");
    $(this).replaceWith('<i class="fa-regular fa-heart heart_search like_by_customer" data-id='+id+'></i>')
   

   });


   $(document).on('click','.like_by_customer2',function(){
    let id=$(this).data("id");
    $(this).replaceWith('<i class="fa-solid fa-heart haart_style unlike_by_customer2"  data-id='+id+'></i>')
     

     like(id)


  });

  $(document).on('click','.unlike_by_customer2',function(){
    let id=$(this).data("id");
    $(this).replaceWith('<i class="fa-regular fa-heart haart_style like_by_customer2" data-id='+id+'></i>')
   
        unlike(id);
   });

   function like(id)
   {
     $.ajax({
            url: '{{ route('add.to.like') }}',
            method: "post",
            data: {
                _token: '{{ csrf_token() }}', 
                id: id,
            },
            success: function (response) {
              
            }
        });

   }


   function unlike(id)
   {
     $.ajax({
            url: '{{ route('unlike.by.user') }}',
            method: "post",
            data: {
                _token: '{{ csrf_token() }}', 
                id: id, 
            },
            success: function (response) {
              
            }
        });
   }
</script>
<script type="text/javascript"></script>
  @section('script')
@show
  </body>
</html>


