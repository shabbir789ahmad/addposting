@extends('Dashboard.admin')

@section('content')

<form action="{{ route('packages.update', ['id'=>$packages->id]) }}" method="POST" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="row justify-content-center">
		<div class="col-md-8 text-center">
          <i class="fas fa-boxes fa-3x icn"></i>
          <h2 class="h2 mt-3">Update Package</h2>
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
							
							<option value="premium" @if($packages['package_name']=='premium') selected @endif>Premium</option>
							<option value="featured" @if($packages['package_name']=='featured') selected @endif>Featured</option>
							<option value="hot" @if($packages['package_name']=='hot') selected @endif>Hot</option>
						</select>
						<span class="text-danger">@error ('package_name') {{$message}}@enderror</span>

						<label for="" class="font-weight-bold mt-2">
							 Price Per Ads <span class="text-danger">*</span>
						</label>
						<input type="number" class="form-control" name="package_price" placeholder="Package Price" value="{{$packages['package_price']}}">
						<span class="text-danger">@error ('package_price') {{$message}}@enderror</span>


						<label for="" class="font-weight-bold mt-2">
							 Package Discount (if any) <span class="text-danger">*</span>
						</label>
						<input type="number" class="form-control" name="package_discount" value="{{$packages['package_discount']}}">
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