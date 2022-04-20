@extends('Dashboard.admin')

@section('content')

<div class="row">
	<div class="col-12">
		<div class="form-group ml-2">
			<x-btn-component route="category.create"></x-btn-component>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body pb-0">

				@if(count($category) > 0)

				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead class="thead-light">
							<tr>
								<th scope="col">Image</th>
								<th scope="col">Category</th>
								<th scope="col">Property Type</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							@foreach($category as $category)
							<tr>
								
								<td class="text-dark col-1"><img src="{{asset('uploads/user/'.$category->category_image)}}" width="100%"></td>
								<td class="text-dark">{{ ucfirst($category->category_name) }}</td>
							
									@foreach($properties as $property)
									@if($property['id']==$category['property_id'])
									<td class="text-dark">{{ ucfirst($property->property) }}</td>
									@endif
									@endforeach
								<td>
									<a href="{{ route('category.edit', ['id' => $category->id]) }}" type="submit" class="btn btn-xs btn-info">
										Edit
									</a>
									<form action="{{ route('category.destroy', ['id' => $category->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
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

				<x-resource-empty resource="categories" new="category.create"></x-resource-empty>

				@endif
							
			</div>
		</div>
	</div>
</div>

@endsection