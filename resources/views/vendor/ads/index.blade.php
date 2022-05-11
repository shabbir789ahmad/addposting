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
                <th scope="col">Ads Type</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
               @foreach($products as $product)
              <tr >
                
                <td class="text-dark col-1 p-1" ><img src="{{asset('uploads/product/'.\App\Models\Image::where(['product_id' => $product->id])->pluck('product_images')->first())}}" width="100%" class="rounded"></td>
                <td class="text-dark align-middle">{{ ucfirst($product->category_name)}}</td>
                <td class="text-dark align-middle" >{{ucfirst($product['name'])}}</td>
                <td class="text-dark align-middle">{{ucfirst($product['location'])}}</td>
                <td class="text-dark align-middle ">{{$product['price']}} AED</td>
                <td class="text-dark align-middle text-center">
                  
                  <span @if($product['ads_type']=='free') class="badge badge-success p-2" @elseif($product['ads_type']=='Premium') class="badge badge-primary p-2" @elseif($product['ads_type']=='Featured') class="badge badge-info p-2" @elseif($product['ads_type']=='Hot') class="badge badge-danger p-2"  @endif>{{$product['ads_type']}}</span></td>
              
               
                <td class="p-0 align-middle">
                 <form action="{{route('ads.destroy',['id'=>$product['id']])}}" method="POST" class="text-center ">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger text-center btn-xs mt-2">Delete</button>
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