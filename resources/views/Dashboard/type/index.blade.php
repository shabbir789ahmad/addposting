@extends('Dashboard.admin')

@section('content')

<div class="row">
	<div class="col-12 ">
		<div class="form-group ml-2">
			<x-btn-component route="type.create"></x-btn-component>
		</div>
	</div>
</div>
<div class="card backgorund " >
	<div class="card-body d-flex">
		<h4>
			All  Type
		</h4>
		
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body px-0">

				@if(count($types) > 0)

				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead class="backgorund">
							<tr>
								<th scope="col">Type</th>
								<th scope="col">Category</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							@foreach($types as $type)
							<tr>
								
								<td class="text-dark">{{ $type->type }}</td>
							
							
							<td class="text-dark">{{ $type->category_name }}</td>
								
								
								<td >
									<a href="{{ route('type.edit', ['type' => $type->id]) }}" type="submit" class="btn btn-xs backgorund2">
										Edit
									</a>
									<form action="{{ route('type.destroy', ['type' => $type->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
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

				<x-resource-empty resource="types" new="type.create"></x-resource-empty>

				@endif
							
			</div>
		</div>
	</div>
</div>

@endsection