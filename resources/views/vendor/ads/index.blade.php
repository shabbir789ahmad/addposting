@extends('vendor.admin')
@section('content')

<div class="row ml-2">
	<div class="col-12">
		<div class="form-group">
         	<x-btn-component route="ads.index2"></x-btn-component>
		</div>
	</div>
</div>

<div class="card backgorund " >
  <div class="card-body d-flex">
    <h4>
      All Ads
    </h4>
   
  </div>
</div>
<div class="row">
	@if(count($products) > 0)
	<div class="container-fluid mt-3">
 
   

   <div class="table-responsive card p-0">
          <table class="table table-striped table-bordered table-hover">
            <thead class="backgorund">
              <tr>
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Name</th>
                <th scope="col">Location</th>
                <th scope="col">Price</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
               @foreach($products as $product)
              <tr>
                
                <td class="text-dark col-1"><img src="{{asset('uploads/product/'.\App\Models\Image::where(['product_id' => $product->id])->pluck('product_images')->first())}}" width="100%" class="rounded"></td>
                <td class="text-dark">{{ ucfirst($product->category_name)}}</td>
                <td class="text-dark">{{ucfirst($product['name'])}}</td>
                <td class="text-dark">{{ucfirst($product['location'])}}</td>
                <td class="text-dark ">${{$product['price']}}</td>
              
               
                <td>
                 <form action="{{route('ads.destroy',['id'=>$product['id']])}}" method="POST" class="text-center ">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger w-50 text-center btn-sm">Delete</button>
      </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
   
 
	@else
	  <div class="col-12">
	  	<x-resource-empty resource="ads" new="ads.index2"></x-resource-empty>
	  </div>
	  </div>
   @endif
</div>



@endsection