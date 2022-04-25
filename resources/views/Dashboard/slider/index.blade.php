@extends('Dashboard.admin')

@section('content')

<div class="row">
	<div class="col-12 ">
		<div class="form-group ml-2">
			<x-btn-component route="slider.create"></x-btn-component>
		</div>
	</div>
</div>
<div class="card backgorund " >
	<div class="card-body d-flex">
		<h4>
			All  Slider
		</h4>
		
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body px-0">

				@if(count($sliders) > 0)

				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead class="backgorund">
							<tr>
								<th scope="col">Image</th>
								<th scope="col">Heading1</th>
								<th scope="col">Heading2</th>
								
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							@foreach($sliders as $slider)
							<tr>
								<td class="col-1 p-1 "><img src="{{asset('uploads/user/'.$slider->slider)}}" width="100%" height="80rem" class="rounded"></td>
								<td class="text-dark align-middle">{{ $slider->heading1 }}</td>
								<td class="text-dark align-middle">{{ $slider->heading2 }}</td>
								<td>
									<a href="{{ route('slider.edit', ['id' => $slider->id]) }}" type="submit" class="btn btn-xs btn-info">
										Edit
									</a>
									<form action="{{ route('slider.destroy', ['id' => $slider->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
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

				<x-resource-empty resource="slider" new="slider.create"></x-resource-empty>

				@endif
							
			</div>
		</div>
	</div>
</div>

@endsection