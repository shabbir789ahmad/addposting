@extends('Dashboard.admin')

@section('content')

<form action="{{ route('category.update',['id' => $categ->id]) }}" method="POST" enctype="multipart/form-data">
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
							Select Propert Type <span class="text-danger">*</span>
						</label>
						<select class="form-control" name="property_id">
							
							@foreach($properties as $property)
							
							<option value="{{$property['id']}}" @if($property['id']==$categ['property_id']) selected @endif>{{$property['property']}}</option>
							
							@endforeach
						</select>

						<label for="" class="font-weight-bold mt-2">
							Category Name <span class="text-danger">*</span>
						</label>
						<input type="text" class="form-control" name="category_name" value="{{$categ->category_name}}">
						
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
						<input type="file" class="form-control" name="image">
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