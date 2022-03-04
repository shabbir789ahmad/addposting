@extends('Dashboard.admin')

@section('content')

<form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row justify-content-center">
		<div class="col-md-8 text-center">
          <i class="fas fa-boxes fa-3x icn"></i>
          <h2 class="h2 mt-3">Create Category</h2>
		</div>
		<div class="col-md-6">
			<div class="card card_color shadow">
				<div class="card-body ">
					<h2 class="h3 mt-2 text-center"><!-- Please Fill All Field --></h2>
					<div class="form-group">
						<label for="" class="font-weight-bold mt-2">
							Select Property Type <span class="text-danger">*</span>
						</label>
						<select class="form-control border-secondary" name="property_id">
							<option selected disabled hidden>Select Property Type</option>
							@foreach($properties as $property)
							<option value="{{$property['id']}}">{{$property['property']}}</option>
							@endforeach
						</select>
						<span class="text-danger">@error ('property_id') {{$message}} @enderror</span><br>

						<label for="" class="font-weight-bold mt-3">
							Category Name <span class="text-danger">*</span>
						</label>
						<input type="text" class="form-control border-secondary" name="category_name" placeholder="Sub Category ">
                         <span class="text-danger">@error ('category_name') {{$message}} @enderror</span><br>

						<label for="" class="font-weight-bold mt-3">
							Category Type <span class="text-danger">*</span>
						</label>
						<select  class="form-control border-secondary" name="category_type">
							<option value="house">House</option>
							<option value="land">Land & Plot</option>
							<option value="apartment">Apartment</option>
							<option value="shop">Shop</option>
							<option value="floor">Portion & Floor</option>
							<option value="room">Rooms</option>
						</select>
                         <span class="text-danger">@error ('category_type') {{$message}} @enderror</span><br>

						<label for="" class="font-weight-bold mt-3">
							Category Image <span class="text-danger">*</span>
						</label>
						<input type="file" class="form-control border-secondary" name="image" >
						 <span class="text-danger">@error ('image') {{$message}} @enderror</span>
					</div>
					<div class="text-center">
						<button class="btn btn_color mt-3">Save</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

@endsection