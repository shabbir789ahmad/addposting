$(document).ready(function()
{
  $('.input_checkbox3').click(function(){

      let checked=$(this).children('.buy').is(':checked')
     if(checked==true)
     {
       $(this).css('border','0.2px solid #fff')
       $(this).css('background',' #0E2E50')
      $(this).children('.buy').prop('checked',false)
     }else{

       $(this).children('.buy').prop('checked',true)
     
       $(this).css('background','#FF385C')
       $(this).siblings('.input_checkbox3').children('.buy').prop('checked',false)
       $(this).siblings('.input_checkbox3').css('background',' #0E2E50')
     }
  }); 

$('.show_more_filter').click(function(){

	$(this).css('display','none');
	$('.more_filter').css('display','flex');
});

$('.hide_more_filter').click(function(){

	$('.more_filter').css('display','none');
	$('.show_more_filter').css('display','block');
});

});