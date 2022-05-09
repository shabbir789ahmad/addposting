@extends('Dashboard.admin')
@section('content')
 
 
 <?php 
    $data="All None Approve Vendor";
    $type='vendor'; 
    
  ?>
<x-product-component :users=$users :data=$data :type=$type  />

<form id="approve_form">
    <input type="hidden" name="approved" id="app">
</form>
@endsection

@section('script')
<script type="text/javascript">
    $('#Approved').change(function(){

    $('#app').val($(this).val())
    $('#approve_form').submit();
    })
</script>
@endsection

<!-- js code is in admin.blade -->