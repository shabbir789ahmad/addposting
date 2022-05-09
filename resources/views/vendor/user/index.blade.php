@extends('vendor.admin')

@section('content')
<style type="text/css">
  input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
}

input[type=number] {
    -moz-appearance:textfield; /* Firefox */
}
</style>


<div class="row">
  <div class="col-12">
    <div class="form-group ml-2">
      <x-btn-component route="labour.create"></x-btn-component>
    </div>
  </div>
</div>
<div class="card backgorund " >
  <div class="card-body d-flex">
    <h4>
      All Agent
    </h4>
   
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body px-0">

        @if(count($labours) > 0)

        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead class="backgorund">
              <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Total Ads</th>
                <th scope="col">Used Ads</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($labours as $user)
              <tr>
                
                <td class="text-dark col-1 p-1"><img src="{{asset('uploads/user/'.$user->user_image)}}" width="100%" height="80rem" class="rounded"></td>
                <td class="text-dark">{{ ucfirst($user->user_name) }}</td>
                <td class="text-dark">{{ ucfirst($user->email) }}</td>
                <td class="text-dark">{{ ucfirst($user->phone) }}</td>
                <td class="text-dark">{{ $user->total_ads }}</td>
                <td class="text-dark">{{ $user->used_ads }}</td>
              
                 
                <td>
                  <button type="button" data-id="{{$user->id}}" class="btn btn-xs btn-warning assing_ads">
                    Assign Ads
                  </button>
                  
                  <form action="{{ route('labour.destroy', ['labour' => $user->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-xs btn-danger">
                      Delete
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        @else

        <x-resource-empty resource="User" new="labour.create"></x-resource-empty>

        @endif
              
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="ads_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header backgorund">
        <h5 class="modal-title" id="exampleModalLabel">Assign Ads</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{route('asign.ads')}}">
        @csrf
      <div class="modal-body">
        <input type="hidden" name="agent_id" id="labour">
        <label class="mt-4 font-weight-bold" >Select Ads Package </label> 
        <select class="form-control" name="all_ads" id="all_ads">
          @foreach($ads as $ad)
          <option value="{{$ad['total_ads']}}"> {{$ad['package_name']}} {{$ad['total_ads']}}</option>
          @endforeach
        </select>   
      
         
        <span id="message" class="text-danger"></span><br>
         <label class="font-weight-bold">Number Of Ads To This User</label>
         <input type="number" name="total_ads" class="form-control" id="new_ads" step="0.01">
         
      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary create" disabled>Create</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection
@section('script')

<script type="text/javascript">
  $(document).ready(function(){
   
   $('.assing_ads').click(function(){

    $('#ads_modal').modal('show')
    let id=$(this).data('id');

    $('#labour').val(id)
   });

  $('#new_ads').keyup(function(){
   
   let value=$(this).val();
   let total=$('#all_ads').val();
  
     if(parseInt(value) >= parseInt(total))
     {
   
       $(this).css('border','1px solid red');
       $('.create').prop('disabled',true);
     }else
    {
       $(this).css('border','1px solid black');
       $('.create').prop('disabled',false);
       
     }
   
  });

  });
</script>
@endsection