@extends('Dashboard.admin')
@section('content')
 
 
 <?php $data="All None Approve user"; $type='vendor';  ?>
<x-product-component :users=$users :data=$data :type=$type />


<form id="approve_form2">
    <input type="hidden" name="approved2" id="app2">
</form>

@endsection
@section('script')
<script type="text/javascript">
    $('#Approved').change(function(){

    $('#app2').val($(this).val())
    $('#approve_form2').submit();
    })
</script>
@endsection
<!-- js code is in admin.blade -->