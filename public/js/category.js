$(document).ready(function(){

$('#property_category').change(function() {

   let id=$(this).val();
  $.ajax({
            url : '/get-al-category/' +id,
            method: "GET",
            data: {
                _token: '{{ csrf_token() }}', 
              
            },
      }).done(function(res)
      {  
      	console.log(res)
        $('.category_id').empty();
        $.each(res,function(index,val)
        { 
          $('.category_id').append(`
            <option value="${val.id}">${val.category_name}</option>
           `);

        })
       
      }).fail(function(e){
        console.log('erro')
      });
});
   


$('#states2').change(function() {
   
   let id=$(this).val();
  $.ajax({
            url : '/get-city-id/' +id,
            method: "GET",
            data: {
                _token: '{{ csrf_token() }}', 
              
            },
      }).done(function(res)
      { 
        $('#cities').empty();
        $.each(res,function(index,val)
        { 

          $('#cities').append(`
                <option disabled selected hidden>Select City</optin>
                <option value="${val.city}">${val.city}</optin>
           `);

        })
       
      }).fail(function(e){
        console.log('erro')
      });
});

$('.click').click(function(e){
  e.stopPropagation()
  e.preventDefault()
 $(this).addClass('active');
  $(this).siblings('a').removeClass('active')
  if($(this).data('id')===2)
  {
    $('.category').css('display','block')
    category();
  }else{
    $('.category').css('display','none')
  }
  
  if($(this).data('id')===1)
  {
    $('.populer').css('display','block')
  }else{
    $('.populer').css('display','none')
  }
  
  if($(this).data('id')===3)
  {
    $('.area').css('display','block')
    area()
  }else{
    $('.area').css('display','none')
  }
  if($(this).data('id')===4)
  {
    $('.citis').css('display','block')
    cities()
  }else{
    $('.citis').css('display','none')
  }
  
  if($(this).data('id')===5)
  {
    $('.price2').css('display','block')
    price()
  }else{
    $('.price2').css('display','none')
  }
  
})

function cities()
{
  $.ajax({
            url : '/get-city-all/',
            method: "GET",
            data: {
                _token: '{{ csrf_token() }}', 
              
            },
      }).done(function(res)
      { 
        $('.citiss').empty();
        $.each(res,function(index,val)
        { 
            let ph = baseURL + "uploads/img/icons8-shopping-mall-48.png";
          $('.citiss').append(`
                <div class="col-md-3 col-lg-2 col-6 col-sm-3  text-center">
                 <div class="card card_hover mt-2 city shadow">
                  <div class="card-body p-0 card_items">
                   <img src="${ph}" width="40%" class="mt-1">
                   <p class="p-2 p mb-0">${val.city}</p>
                  </div>
                 </div>
                </div>
           `);

        })
       
      }).fail(function(e){
        console.log('erro')
      });
}

function category()
{
  $.ajax({
            url : '/get-category-all/',
            method: "GET",
            data: {
                _token: '{{ csrf_token() }}', 
              
            },
      }).done(function(res)
      { 
        $('.categorys').empty();
        $.each(res,function(index,val)
        { 
            let ph = baseURL + "uploads/img/icons8-shopping-mall-48.png";
          $('.categorys').append(`
                <div class="col-md-3 col-lg-2 col-6 col-sm-3  text-center">
           <a href="" class="link text-dark">
               <div class="card card_hover mt-2  shadow">
              <div class="card-body p-0 card_items">
                <img src="${ph}" width="40%" class="mt-1">
                 <p class="p-2 mb-0">${val.category_name}</p>
               </div>
             </div>
            </a>
            </div>
           `);

        })
       
      }).fail(function(e){
        console.log('erro')
      });
}

function area()
{
  $.ajax({
            url : '/get-area-all/',
            method: "GET",
            data: {
                _token: '{{ csrf_token() }}', 
              
            },
      }).done(function(res)
      { 
        $('.areas').empty();
        $.each(res,function(index,val)
        { 
            let ph = baseURL + "uploads/img/icons8-shopping-mall-48.png";
          $('.areas').append(`
                <div class="col-md-3 col-lg-2 col-6 col-sm-3  text-center">
          
               <div class="card card_hover mt-2 area shadow" >
              <div class="card-body p-0 card_items d">
                <img src="${ph}" width="40%" class="mt-1">
                 <p class="p-2 p mb-0">${val.areaunit}</p>
               </div>
             </div>
         
            </div>
           `);

        })
       
      }).fail(function(e){
        console.log('erro')
      });
}

function price()
{
  $.ajax({
            url : '/get-price-all/',
            method: "GET",
            data: {
                _token: '{{ csrf_token() }}', 
              
            },
      }).done(function(res)
      { 
        $('.price_range').empty();
        $.each(res,function(index,val)
        { 
            
          $('.price_range').append(`
                <div class="col-md-2 col-6 col-sm-3 col-lg-2">
                 <div class="card card_hover shadow price_rang " data-price1='${val.price1}' data-price2='${val.price2}' >
                  <div class="card-body card_items small_card text-center">
                    <h6>Under </h6>
                    <p>${val.price1} - ${val.price2}</p>
                  </div>
                 </div>
              </div>
           `);

        })
       
      }).fail(function(e){
        console.log('erro')
      });
}
});