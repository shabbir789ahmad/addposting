@extends('Dashboard.admin')

@section('content')

<form action="{{ route('category.update',['id' => $categories->id]) }}" method="POST" enctype="multipart/form-data">
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
							
							<option value="{{$property['id']}}" @if($property['id']==$categories['property_id']) selected @endif>{{$property['property']}}</option>
							
							@endforeach
						</select>

						<label for="" class="font-weight-bold mt-2">
							Category Name <span class="text-danger">*</span>
						</label>
						<input type="text" class="form-control" name="category_name" value="{{$categories->category_name}}">
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