@extends('Dashboard.admin')

@section('content')

<form action="{{ route('area.update',['area' => $area->id]) }}" method="POST">
	@csrf
	@method('PUT')
	<div class="row justify-content-center">
		<div class="col-md-8 text-center">
          <i class="fas fa-boxes fa-3x icn"></i>
          <h2 class="h2 mt-3">Update Area Unit </h2>
		</div>
		<div class="col-md-6">
			<div class="card card_color shadow">
				<div class="card-body ">
					
					<div class="form-group">
						
						<label for="" class="font-weight-bold mt-2">
							Area Unit Name <span class="text-danger">*</span>
						</label>
						<input type="text" class="form-control" name="areaunit" value="{{$area['areaunit']}}">
						<span class="text-danger">@error ('areaunit') {{$message}}@enderror</span>
					</div>
					<div class="text-center">
						<button class="btn btn_color mt-3">Update</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

@endsection