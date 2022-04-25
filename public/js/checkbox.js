$(document).ready(function(){
  
  $('.input_checkbox').click(function(){
   
     let checked=$(this).children('.check_btn').is(':checked')
     if(checked==true)
     {  $(this).css('border','0.2px solid #002F34')
     	$(this).children('.check_btn').prop('checked',false)
     }else{
     	$(this).children('.check_btn').prop('checked',true)
     	 $(this).css('border','2px solid #002F34')
     }
  });
  $('.input_checkbox2').click(function(){
  
     let checked=$(this).children('.check_btn2').is(':checked')
     if(checked==true)
     {
       $(this).css('border','0.2px solid #002F34')
      $(this).children('.check_btn2').prop('checked',false)
     }else{

       $(this).children('.check_btn2').prop('checked',true)
       $(this).css('border','2px solid #002F34')
       $(this).siblings('.input_checkbox2').children('.check_btn2').prop('checked',false)
       $(this).siblings('.input_checkbox2').css('border','0.2px solid #002F34')
     }
  });

  $('.input_checkbox_furnished').click(function(){
  
     let checked=$(this).children('.check_btn3').is(':checked')
     if(checked==true)
     {
       $(this).css('border','0.2px solid #002F34')
      $(this).children('.check_btn3').prop('checked',false)
     }else{

       $(this).children('.check_btn3').prop('checked',true)
       $(this).css('border','2px solid #002F34')
       $(this).siblings('.input_checkbox_furnished').children('.check_btn3').prop('checked',false)
       $(this).siblings('.input_checkbox_furnished').css('border','0.2px solid #002F34')
     }
  });

  $('.input_checkbox4').click(function(){
  
     let checked=$(this).children('.check_btn4').is(':checked')
     if(checked==true)
     {
       $(this).css('border','0.2px solid #002F34')
      $(this).children('.check_btn4').prop('checked',false)
     }else{

       $(this).children('.check_btn4').prop('checked',true)
       $(this).css('border','2px solid #002F34')
       $(this).siblings('.input_checkbox4').children('.check_btn4').prop('checked',false)
       $(this).siblings('.input_checkbox4').css('border','0.2px solid #002F34')
     }
  });



$('.property_for_sale').click(function() {
   
   let id=$(this).data('id');
  $.ajax({
            url : '/get-al-category/' +id,
            method: "GET",
            data: {
                _token: '{{ csrf_token() }}', 
              
            },
      }).done(function(res)
      {  let da;
         if(id==1)
         {
           da= '/ads/create/';
        }else{
           da= '/ads/create/';
        }
        $('.category_append').empty();
        $.each(res,function(index,val)
        { 
          $('.category_append').append(`

            <a href="${da+val.id}" class="property_for_sale2 mt-2"><i class="fas fa-home ml-3 mt-4 text-dark fa-lg mr-2"></i>${val.category_name}</a>
          `);

        })
       
      }).fail(function(e){
        console.log('erro')
      });
});
 

 $('#state').change(function() {
   
   let id=$(this).val();
  $.ajax({
            url : '/get-city-id/' +id,
            method: "GET",
            data: {
                _token: '{{ csrf_token() }}', 
              
            },
      }).done(function(res)
      { 
        $('#city').empty();
        $.each(res,function(index,val)
        { 
          $('#city').append(`

            <option value="${val.city}">${val.city}</optin>
           `);

        })
       
      }).fail(function(e){
        console.log('erro')
      });
});
  
})