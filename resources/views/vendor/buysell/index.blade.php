@extends('vendor.admin')

@section('content')

<div class="card">
	<div class="card-body d-flex">
		<h4>
			All  Packages
		</h4>
		<div class="df d-flex w-25 ml-auto">
			<p class="mt-2 mr-1 font-weight-bold">Filter</p>
		  <select class="form-control ml-auto" name="ads_status" id="ads_status">
			<option disabled hidden selected>Selected Filter</option>
			<option value="1">Approved</option>
			<option value="2">Pending</option>
			<option value="3">Rejected</option>
	      </select>
	    </div>
	</div>
</div>

<div class="row mt-1">
	<div class="col-12">
		<div class="card">
			<div class="card-body pb-0">

				@if(count($carts) > 0)

				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead class="thead-light">
							<tr>
								<th scope="col">Package Name</th>
								<th scope="col">Order Quentity</th>
								<th scope="col">Total Ads</th>
								<th scope="col">Package Price</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							@foreach($carts as $cart)
							<tr>
								
								<td class="text-dark ">{{$cart->item_name}}</td>
								<td class="text-dark">{{ ucfirst($cart->item_quentity) }}</td>
								<td class="text-dark">{{ ucfirst($cart->item_ads) }}</td>
								<td class="text-dark">$ {{ ucfirst($cart->item_total) }}</td>
							    <td>
							    	@if($cart['approved']==1 )
								  <span class="badge badge-success">Approved</span>
                                 @elseif($cart['aproved']==0  && $cart['deleted_at']==null)
                                 <span class="badge badge-warning">Pending</span>
								  @endif
								  @if($cart['deleted_at'])
								  <span class="badge badge-danger">Rejected</span>
                                  <form action="{{ route('cart.reorder', ['id' => $cart->id]) }}" method="POST" class="d-inline">
										@method('PUT')
										@csrf
										<button type="submit" class="btn btn-xs btn-success" style="padding: .2rem .1rem;">
											Re Order
										</button>
									</form>
								  @endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>

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
<form id="package_filter">
	<input type="hidden" name="package" id="package">
</form>
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
       $('#ads_status').change(function(){
         
         let id=$(this).val();
         $('#package').val(id);
         $('#package_filter').submit();
       });
	});
</script>

@endsection