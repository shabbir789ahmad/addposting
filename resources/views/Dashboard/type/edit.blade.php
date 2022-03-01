@extends('Dashboard.admin')

@section('content')

<form action="{{ route('type.update',['type' => $type->id]) }}" method="POST" >
	@csrf
	@method('PUT')
	<div class="row justify-content-center">
		<div class="col-md-8 text-center">
          <i class="fas fa-boxes fa-3x icn"></i>
          <h2 class="h2 mt-3">Update Type</h2>
		</div>
		<div class="col-md-6">
			<div class="card card_color shadow">
				<div class="card-body ">
					<h2 class="h3 mt-2 text-center"><!-- Please Fill All Field --></h2>
					<div class="form-group">
						
						<label for="" class="font-weight-bold mt-2">
							Select Category <span class="text-danger">*</span>
						</label>
						<select class="form-control" name="type_id" id="property_category" required>
							@foreach($categories as $category)
							<option value="{{$category['id']}}" @if($category['id']==$type->type_id) selected @endif>{{$category['category_name']}}</option>
							@endforeach
						</select>
						
						<label for="" class="font-weight-bold mt-3">
							Type name <span class="text-danger">*</span>
						</label>
						<input type="text" class="form-control" name="type" value="{{$type['type']}}" required>
						
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