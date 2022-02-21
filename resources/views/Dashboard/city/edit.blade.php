@extends('Dashboard.admin')

@section('content')

<form action="{{ route('city.update',['id' => $city->id]) }}" method="POST" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="row justify-content-center">
		<div class="col-md-8 text-center">
          <i class="fas fa-boxes fa-3x icn"></i>
          <h2 class="h2 mt-3">Update Category</h2>
		</div>
		<div class="col-md-6">
			<div class="card card_color shadow">
				<div class="card-body ">
					<h2 class="h3 mt-2 text-center"><!-- Please Fill All Field --></h2>
					<div class="form-group">
						<label for="" class="font-weight-bold mt-2">
							Select State <span class="text-danger">*</span>
						</label>
						<select class="form-control" name="state_id">
							
							@foreach($states as $state)
							
							<option value="{{$state['id']}}" @if($state['id']==$city['state_id']) selected @endif>{{$state['states']}}</option>
							
							@endforeach
						</select>

						<label for="" class="font-weight-bold mt-2">
							City Name <span class="text-danger">*</span>
						</label>
						<input type="text" class="form-control" name="city" value="{{$city->city}}">
						
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