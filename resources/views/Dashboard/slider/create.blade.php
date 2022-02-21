@extends('Dashboard.admin')

@section('content')

<form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row justify-content-center">
		<div class="col-md-8 text-center">
          <i class="fas fa-boxes fa-3x icn"></i>
          <h2 class="h2 mt-3">Create Slider</h2>
		</div>
		<div class="col-md-6">
			<div class="card card_color shadow">
				<div class="card-body ">
					<h2 class="h3 mt-2 text-center"><!-- Please Fill All Field --></h2>
					<div class="form-group">
						<label for="" class="font-weight-bold mt-2">
							Heading 1 <span class="text-danger">*</span>
						</label>
						<input type="text" class="form-control" name="heading1" placeholder="Heading 1" value="{{old('heading1')}}">
						<span class="text-danger">@error ('heading1') {{$message}}@enderror</span>
						<label for="" class="font-weight-bold mt-2">
							Heading 2 <span class="text-danger">*</span>
						</label>
						<input type="text" class="form-control" name="heading2" placeholder="Heading 2" value="{{old('heading2')}}">
						<span class="text-danger">@error ('heading2') {{$message}}@enderror</span>
						<label for="" class="font-weight-bold mt-2">
							Slider Image <span class="text-danger">*</span>
						</label>
						<input type="file" class="form-control" name="image">
						<span class="text-danger">@error ('image') {{$message}}@enderror</span>
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