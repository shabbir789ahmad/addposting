@extends('Dashboard.admin')

@section('content')

<div class="row">
	<div class="col-12">
		<div class="form-group ml-2">
			<x-btn-component route="banner.create"></x-btn-component>
		</div>
	</div>
</div>

<div class="row">
	@if(count($banners) > 0)
	@foreach($banners as $banner)
	<div class="col-12 col-md-4">
		<div class="card ml-1 mt-3">
			<div class="card-body  text-center">
             <img src="{{asset('uploads/user/'.$banner['banner'])}}" width="100%">
			   <a href="{{ route('banner.edit', ['id' => $banner->id]) }}" type="submit" class="btn btn-xs btn-info mt-3 mb-3">
				Edit
				</a>
				<form action="{{ route('banner.destroy', ['id' => $banner->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
				@method('DELETE')
				@csrf
				 <button type="submit" class="btn btn-xs btn-danger mt-3 mb-3">
						Delete
				 </button>
				</form>
								
							
					

				

				
							
			</div>
		</div>
	</div>
	@endforeach
	@else
	  <div class="col-12">
	  	<x-resource-empty resource="Banner" new="banner.create"></x-resource-empty>
	  </div>
   @endif
</div>

@endsection