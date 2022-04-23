@extends('Dashboard.admin')

@section('content')

<div class="row">
	<div class="col-12 ">
		<div class="form-group ml-2">
			<x-btn-component route="state.create"></x-btn-component>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body pb-0">

				@if(count($states) > 0)

				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead class="thead-light">
							<tr>
								<th scope="col">State Name</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							@foreach($states as $state)
							<tr>
								
								<td class="text-dark">{{ ucfirst($state->states) }}</td>
							
									
								<td>
									<a href="{{ route('state.edit', ['id' => $state->id]) }}" type="submit" class="btn btn-xs btn-info">
										Edit
									</a>
									<form action="{{ route('state.destroy', ['id' => $state->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
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

				<x-resource-empty resource="States" new="state.create"></x-resource-empty>

				@endif
							
			</div>
		</div>
	</div>
</div>

@endsection