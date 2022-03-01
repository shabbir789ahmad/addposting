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
								<th scope="col">Package Name</th>
								<th scope="col">Package Quentity</th>
								<th scope="col">Package Ads</th>
								<th scope="col">Total Price</th>
								<th scope="col">Total Price</th>
							</tr>
						</thead>
						<tbody>
							@foreach($cart as $car)
							<tr>
							
								<td class="text-dark">{{ ucfirst($car->item_name) }}</td>
								<td class="text-dark">{{ ucfirst($car->item_quentity) }}</td>
								<td class="text-dark">{{ ucfirst($car->item_ads) }}</td>
								<td class="text-dark">{{ ucfirst($car->item_total) }}</td>
							
									
								<td>
									
									<form action="{{ route('order.destroy', ['order' => $car->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
										@method('DELETE')
										@csrf
										<button type="submit" class="btn btn-xs btn-danger">
											Delete
										</button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>

				

				@endif
							
			</div>
		</div>
	</div>
</div>

@endsection