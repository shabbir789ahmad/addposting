@extends('vendor.admin')

@section('content')

	<div class="row justify-content-center">
		<div class="col-md-12 text-center">
          <i class="fas fa-boxes fa-3x icn"></i>
          <h2 class="h2 mt-3">Post Your Ads</h2>
		</div>
		<div class="col-md-11">
			<div class="card card_color shadow">
				<div class="card-body ">
					<h2 class="h3 mt-2 text-center">INCLUDE SOME DETAILS</h2>
					<div class="row">
					 <div class="col-md-6 col-12 ">
                     @foreach($properties as $pro)
					 <div class="property_for_sale mt-2" data-id="{{$pro['id']}}"><i class="fas fa-home ml-3 mt-4 text-dark fa-lg mr-2"></i>{{$pro['property']}}<i class="fas fa-arrow-right float-right mr-3 mt-4 text-dark fa-lg"></i>	 </div>
					 @endforeach
					</div>
					<div class="col-md-6 col-12 category_append ">
					   
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection