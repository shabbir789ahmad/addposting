@extends('Dashboard.admin')

@section('content')

<div class="row">
	<div class="col-12">
		<div class="form-group ml-2">
			<h4>All Order</h4>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body pb-0">

				@if(count($cart) > 0)

				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead class="thead-light">
							<tr>
								<th scope="col">User Name</th>
								<th scope="col">User email</th>
								<th scope="col">Package Name</th>
								<th scope="col">Ads Quentity</th>
								<th scope="col">Total Price</th>
								<th scope="col">Approve Package</th>
							</tr>
						</thead>
						<tbody>
							@foreach($cart as $car)
							<tr>
							
								<td class="text-dark">{{ ucfirst($car->user_name) }}</td>
								<td class="text-dark">{{ ucfirst($car->email) }}</td>
								<td class="text-dark">{{ ucfirst($car->item_name) }}</td>
								<td class="text-dark">{{$car->item_ads }}</td>
								<td class="text-dark">{{$car->item_total}}</td>
							
									
								<td>
								<button class="btn btn-warning cart" data-id="{{$car['id']}}" data-name="{{$car['item_name']}}">Approve</button>
								<form action="{{ route('order.destroy', ['id' => $car->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
				@method('DELETE')
				@csrf
				 <button type="submit" class="btn btn-xs btn-danger mt-3 mb-3 reject">
						Reject
				 </button>
				</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				{{ $cart->links() }}
             @else
				<div class="image text-center">
                 <img src="{{asset('pic/fogg-page-not-found-1.png')}}" width="20%" class="border rounded">
                 <h3 class="font-weight-bold">Not Record Found</h3>
				</div>

				@endif
							
			</div>
		</div>
	</div>
</div>

@endsection

@section('script')

<script type="text/javascript">
$(document).ready(function()
 {
   $('.cart').click(function () {

         $(this).prop('disabled',true);
         $('.reject').prop('disabled',true);
        
        let id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url :'orders/destroy',
            
           data: { 

           	'id': id,
           	'name':$(this).data('name'),

           },
            success: function (data) {
               console.log('ddf');
           }
       });
       
  
        
    });

 });
</script>
@endsection