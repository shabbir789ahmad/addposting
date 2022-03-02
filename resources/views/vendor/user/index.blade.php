@extends('vendor.admin')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="form-group ml-2">
      <x-btn-component route="labour.create"></x-btn-component>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body pb-0">

        @if(count($labours) > 0)

        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead class="thead-light">
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
                
                <td class="text-dark col-1"><img src="{{asset('uploads/user/'.$user->labour_image)}}" width="100%"></td>
                <td class="text-dark">{{ ucfirst($user->labour_name) }}</td>
                <td class="text-dark">{{ ucfirst($user->labour_email) }}</td>
                <td class="text-dark">{{ ucfirst($user->labour_phone) }}</td>
                <td class="text-dark">{{ \App\Models\AAd::where('labour_id',$user['id'])->sum('total_ads')}}</td>
                <td class="text-dark">{{ \App\Models\AAd::where('labour_id',$user['id'])->sum('used_ads')}}</td>
              
                 
                <td>
                  <button type="button" data-id="{{$user->id}}" class="btn btn-xs btn-warning assing_ads">
                    Assign Ads
                  </button>
                  <a href="{{ route('labour.edit', ['labour' => $user->id]) }}" type="submit" class="btn btn-xs btn-info">
                    Edit
                  </a>
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
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{route('asign.ads')}}">
        @csrf
      <div class="modal-body">
 <input type="text" name="labour_id" id="labour">
        <label class="mt-4">Select Package</label>
        <div class="all_checkbox6">
                  @foreach($ads as $area)
                 <div type="button" class="input_checkbox6 ml-3 p-2 mt-2">
                     <label class="total">{{$area['total_ads']}}</label>
                     <label >{{$area['item_name']}}</label>
                       <input type="checkbox" name="ads_id" value="{{$area['id']}}" class="check_btn6 " >
                       <span class="text-danger">@error ('areaunit') {{$message}}@enderror</span>
                   </div>
                  @endforeach
          </div>
          <span id="message" class="text-danger mt-4"></span><br>
         <label class="mt-4">Number Of Ads To This User</label>
         <input type="text" name="total_ads" class="form-control" id="new_ads">
         
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
   })

  $('#new_ads').change(function(){
   
   let value=$(this).val();
   let total=$(this).siblings('.all_checkbox6').children('.input_checkbox6').find('input:checked').siblings('.total').text();
   if(!parseInt(total))
   {
       $('#message').text('please Select At least One Package')
   }{
     if(value >= parseInt(total))
     {
    
      $(this).css('border','1px solid red');
       $('.create').prop('disabled',true);
     }else
    {
       $(this).css('border','1px solid black');
       $('.create').prop('disabled',false);

     }
   }
  });

  });
</script>
@endsection