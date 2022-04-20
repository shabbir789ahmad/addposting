@extends('Dashboard.admin')

@section('content')

<div class="card">
	<div class="card-body">
		<h4 class="font-weight-bold">
			All Messages
		</h4>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body pb-0">

				@if(count($message) > 0)

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
							@foreach($message as $category)
							<tr>
							  <td class="text-dark">{{ ucfirst($category->name) }}</td>
							  <td class="text-dark">{{ ucfirst($category->email) }}</td>
							   <td class="text-dark">{{ ucfirst($category->message) }}</td>
								<td>
									
									<form action="{{ route('message.destroy', ['id' => $category->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
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

				

				@endif
							
			</div>
		</div>
	</div>
</div>

@endsection