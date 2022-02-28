@extends('vendor.admin')
@section('content')



<div class="card">
  <div class="card-body">
 <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead class="thead-light">
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Sub Total</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @php $total = 0;  @endphp
             @if(session('cart'))
            @foreach(session('cart') as $id => $details)
              @php $total=$details['package_price']*$details['package_quentity']
              @endphp
              <tr>
                <td class="id d-none"><input type="text"  value="{{$details['id']}}"></td>
                <td class="text-dark">{{ucwords($details['package_name'] )}}</td>
                <td class="text-dark">{{$details['package_price']}}</td>
                <td class="text-dark col-2"><input type="number" value="{{ $details['package_quentity'] }}" class="form-control  update_cart mt-3" /></td>
                <td class="text-dark">Rs. {{ (int)$details['package_price'] * $details['package_quentity'] }}</td>
                <td class="text-dark"><button class="btn btn-danger btn-md mt-3 remove_from_cart"><i class="fas fa-trash-alt"></i></button></td>
              </tr>
              @endforeach
              @else
               <p class="text-danger text-center">
     <i class="fa  fa-cart-plus text-danger  fa-5x"></i><br>
    Cart is Empty</p>
        @endif
            </tbody>
          </table>
        </div>


   </div>
 </div>



    



   

<div class="container mt-3">
  <div class="row">
    <div class="col-md-4 col-12 col-sm-12">
     <a href="{{ url('package') }} " class="btn mt-5 btn_color2 "><i class="fa fa-angle-left"></i> Continue Shopping</a>
    </div>
    <div class="col-md-4 col-0 col-sm-0">
    </div>
    <div class="col-md-4 col-12 col-sm-12">
      <div class="card">
        <h3 class="card-header text-light header">CheckOut</h3>
        <div class="card-body ">
       
       <p class=" mt-2 ">SubTotal:<span class="float-right"> Rs. {{ $total }}</span></p>
      
     <form action="{{route('buy.package')}}" method="POST">
      @csrf
       <button class=" btn_color " id="checkout">Checkout</button>
     </form>
    
        
        

  </div>
</div>
    </div>
  </div>
   

@endsection