@extends('Dashboard.admin')

@section('content')

<form action="{{ route('type.store') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row justify-content-center">
		<div class="col-md-8 text-center">
          <i class="fas fa-boxes fa-3x icn"></i>
          <h2 class="h2 mt-3">Create Category type</h2>
		</div>
		<div class="col-md-6">
			<div class="card card_color shadow">
				<div class="card-body ">
					<h2 class="h3 mt-2 text-center"><!-- Please Fill All Field --></h2>
					<div class="form-group">
						<label for="" class="font-weight-bold mt-2">
							Select Category  <span class="text-danger">*</span>
						</label>
						<select class="form-control" name="type_id" id="property_category" required>
							<option selected disabled hidden>Select Category</option>
							@foreach($categories as $category)
							<option value="{{$category['id']}}">{{$category['category_name']}}</option>
							@endforeach
						</select>
						
						<label for="" class="font-weight-bold mt-3">
							Type Name <span class="text-danger">*</span>
						</label>
						<input type="text" class="form-control" name="type" placeholder=" like Shop, office ,factory etc" required>
						
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