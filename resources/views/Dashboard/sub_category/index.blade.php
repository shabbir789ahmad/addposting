@extends('Dashboard.admin')

@section('content')

<div class="row">
	<div class="col-12 ">
		<div class="form-group ml-2">
			<x-btn-component route="subcategory.create"></x-btn-component>
		</div>
	</div>
</div>
<div class="card backgorund " >
	<div class="card-body d-flex">
		<h4>
			All  Features
		</h4>
		
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body px-0">

				@if(count($sub_categories) > 0)

				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead class="backgorund">
							<tr>
								<th scope="col">Feature</th>
								<th scope="col">Category</th>
								<th scope="col">Property Type</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							@foreach($sub_categories as $subcategory)
							<tr>
								
								<td class="text-dark">{{ $subcategory->sub_category_name }}</td>
							
							
							<td class="text-dark">{{ $subcategory->category_name }}</td>
								
								@foreach($properties as $pro)
									@if($pro['id']==$subcategory['property_id'])
									<td class="text-dark">{{ $pro->property }}</td>
									@endif
									@endforeach
								<td>
									<a href="{{ route('subcategory.edit', ['id' => $subcategory->id]) }}" type="submit" class="btn btn-xs backgorund2">
										Edit
									</a>
									<form action="{{ route('subcategory.destroy', ['id' => $subcategory->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
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

				<x-resource-empty resource="Feature" new="subcategory.create"></x-resource-empty>

				@endif
							
			</div>
		</div>
	</div>
</div>

@endsection