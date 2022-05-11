@extends('Dashboard.admin')

@section('content')

<form action="{{ route('env.update',['env' => $env->id]) }}" method="POST">
	@csrf
	@method('PUT')
	<div class="row justify-content-center">
		<div class="col-md-8 text-center">
          <i class="fas fa-boxes fa-3x icn"></i>
          <h2 class="h2 mt-3">Update Email Crediential </h2>
		</div>
		<div class="col-md-6">
			<div class="card card_color shadow">
				<div class="card-body ">
					
					<div class="form-group">
						
						<label for="" class="font-weight-bold mt-2">
							Email <span class="text-danger">*</span>
						</label>
						<input type="email" class="form-control" name="email" value="{{$env->email}}">
						<span class="text-danger">@error ('email') {{$message}}@enderror</span>
					</div>

					<div class="form-group">
						
						<label for="" class="font-weight-bold mt-2">
							Password <span class="text-danger">*</span>
						</label>
						<input type="text" class="form-control" name="password" value="">
						<span class="text-danger">@error ('password') {{$message}}@enderror</span>
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