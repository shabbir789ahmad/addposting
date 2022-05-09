@extends('vendor.admin')
@section('content')

 
<div class="card backgorund" >
  <div class="card-body ">
    <h4>
      Your Cart
    </h4>
    
  </div>
</div>

<div class="card">
  <div class="card-body">
 <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead class="backgorund">
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
              @php $total +=$details['package_price']
              @endphp
              <tr style="align-items: center;">
                <td class="id d-none"><input type="text"  value="{{$details['id']}}"></td>
                <td class="text-dark">{{ucwords($details['package_name'] )}}</td>

                <td class="text-dark price_c">{{$details['price']}}</td>

                <td class="text-dark col-2"><input type="number" value="{{ $details['package_ads'] }}" class="form-control  update_cart " /></td>

                <td class="text-dark "><span class="sub_total"> {{ (int)$details['package_price'] }}</span>  AED</td>

                <td class="text-dark"><button class="btn btn-danger btn-md  remove_from_cart"><i class="fas fa-trash-alt"></i></button></td>
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
     <a href="{{ route('package.index') }} " class="btn mt-5 btn_color2 "><i class="fa fa-angle-left"></i> Continue Shopping</a>
    </div>
    <div class="col-md-4 col-0 col-sm-0">
    </div>
    <div class="col-md-4 col-12 col-sm-12">
      <div class="card">
        <h3 class="card-header text-light header">CheckOut</h3>
        <div class="card-body ">
       
       <h6 class=" mt-2 font-weight-bold text-dark">SubTotal:<span class="float-right">AED</span>  <span class="float-right sub_total "> {{ $total }}</span></h6>
      
     <form action="{{route('buy.package')}}" method="POST" class="text-center mt-5">
      @csrf
       <button class=" btn_color " id="checkout">Checkout</button>
     </form>
    
        
        

  </div>
</div>
    </div>
  </div>
   

@endsection