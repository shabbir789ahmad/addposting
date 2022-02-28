$(document).ready(function(){
 
  $('#small').click(function(){

  	let id=$(this).data('id')
  	$('#small_input').val(id)
  	$('#filter_form').submit()

  });

  $('#new').click(function(){

  	let id=$(this).data('id')
  	$('#new_input').val(id)
  	$('#filter_form2').submit()

  });
  $('#furnish').click(function(){

  	let id=$(this).data('id')
  	$('#furnish_input').val(id)
  	$('#filter_form3').submit()

  });

  $(document).on('click','.area',function(e){
    e.stopPropagation();
  	let id=$(this).children('.d').find('.p').text()
  	$('#area_input').val(id)
  	$('#area_filter_form').submit()

  });

  $(document).on('click','.city',function(e){
    e.stopPropagation();
  	let id=$(this).children('.card_items').find('.p').text()
  	$('#city_input').val(id)
    $('#city_filter_form').submit()

  });

  $(document).on('click','.price_rang',function(e){
    e.stopPropagation();
  	let price1=$(this).data('price1')
  	let price2=$(this).data('price2')
  	$('#price_input1').val(price1)
  	$('#price_input2').val(price2)
    $('#price_filter_form').submit()

  });
 
   $(document).on('click','.category',function(e){
    alert('sd')
    let id=$(this).data('id')
    $('#category_id').val(id)
    $('#category_form').submit()

  });
});