@extends('Dashboard.admin')

@section('content')

<form action="{{ route('packages.store') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row justify-content-center">
		<div class="col-md-8 text-center">
          <i class="fas fa-boxes fa-3x icn"></i>
          <h2 class="h2 mt-3">Create Package</h2>
		</div>
		<div class="col-md-6">
			<div class="card card_color shadow">
				<div class="card-body ">
					<h2 class="h3 mt-2 text-center"><!-- Please Fill All Field --></h2>
					<div class="form-group">
						<label for="" class="font-weight-bold mt-2">
							Package Name <span class="text-danger">*</span>
						</label>
						<select class="form-control" name="package_name">
							<option selected disabled hidden>Select Package Type</option>
							<option value="premium">Premium</option>
							<option value="featured">Featured</option>
							<option value="hot">Hot</option>
						</select>
						
						<span class="text-danger">@error ('package_name') {{$message}}@enderror</span>

						<label for="" class="font-weight-bold mt-2">
							 Price per Ads <span class="text-danger">*</span>
						</label>
						<input type="number" class="form-control" name="package_price" placeholder="Package Price" value="{{old('package_price')}}">
						<span class="text-danger">@error ('package_price') {{$message}}@enderror</span>

						

						<label for="" class="font-weight-bold mt-2">
							 Package Discount (if any) <span class="text-danger">*</span>
						</label>
						<input type="number" class="form-control" name="package_discount" placeholder="Package Discount If Any">
						<span class="text-danger">@error ('package_discount') {{$message}}@enderror</span>
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