@extends('Dashboard.admin')
@section('content')

 <?php $data="All None Approve Vendor"; $type='vendor' ?>
<x-product-component :users=$users :data=$data :type=$type/>

@endsection

@section('script')
@parent
<script type="text/javascript">
	
 $(document).ready(function()
 {   
  $('.user').change(function () {

        let status = $(this).prop('checked') === true ? 1 : 0;
        
        let id = $(this).data('id');
      
        $.ajax({
            type: "GET",
            dataType: "json",
            url :'approve/this/user',
            
           data: {'approve': status, 'id': id},
            success: function (data) {
               console.log('ddf');
           }
       });
       
  
        
    });
  
 });
</script>
@endsection