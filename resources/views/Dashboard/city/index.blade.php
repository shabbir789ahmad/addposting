@extends('Dashboard.admin')

@section('content')

<div class="row">
	<div class="col-12">
		<div class="form-group ml-2">
			<x-btn-component route="city.create"></x-btn-component>
		</div>
	</div>
</div>

<div class="card backgorund " >
	<div class="card-body d-flex">
		<h4>
			All  Cities
		</h4>
		
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body px-0">

				@if(count($cities) > 0)

				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead class="backgorund">
							<tr>
								<th scope="col">City</th>
								<th scope="col">State</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							@foreach($cities as $city)
							<tr>
								
								<td class="text-dark">{{ ucfirst($city->city) }}</td>
							
									
									<td class="text-dark">{{ ucfirst($city->states) }}</td>
									
								<td>
									<a href="{{ route('city.edit', ['id' => $city->id]) }}" type="submit" class="btn btn-xs backgorund2">
										Edit
									</a>
									<form action="{{ route('city.destroy', ['id' => $city->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
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

				@else

				<x-resource-empty resource="City" new="city.create"></x-resource-empty>

				@endif
							
			</div>
		</div>
	</div>
</div>

@endsection