@extends('vendor.admin')
      
@section('content')

<form action="{{route('profile.update',['id'=>Auth::user()->id])}}" method="POST" enctype="multipart/form-data">
   @csrf
   @method('PUT')
   <div class="row justify-content-center">
      <div class="col-md-12 text-center">
          <i class="fas fa-boxes fa-3x icn"></i>
          <h2 class="h2 mt-3">Update Profile</h2>
      </div>
      <div class="col-md-11">
         <div class="card card_color shadow">
            <div class="card-body ">
              
               <div class="row">
                <div class="col-md-12 col-12">
                        <label for="" class="font-weight-bold mt-2">
                     Name <span class="text-danger">*</span>
                  </label>
                  <input type="text" class="form-control input_border" name="user_name"  value="{{Auth::user()->user_name}}">
                  <span class="text-danger">@error ('user_name') {{$message}}@enderror</span>
                </div>
               </div>
               <div class="form-group">
                  <label for="" class="font-weight-bold mt-4">
                     About Me <span class="text-danger">*</span>
                  </label>
                <textarea class="form-control input_border" name="about_me" rows="5" >{{Auth::user()->about_me}}</textarea>   
                <span class="text-danger">@error ('about_me') {{$message}}@enderror</span>

               <div class="row">
                 <div class="col-md-6">
                   <label for="" class="font-weight-bold mt-4">
                       Phone Number<span class="text-danger">*</span>
                   </label>
                   <input type="text" class="form-control input_border" name="phone"  value="{{Auth::user()->phone}}">
                   <span class="text-danger">@error ('phone') {{$message}}@enderror</span>
                 </div>
                 <div class="col-md-6">
                  <label for="" class="font-weight-bold mt-4">
                       Your Email<span class="text-danger">*</span>
                   </label>
                   <input type="text" class="form-control input_border" name="email"  value="{{Auth::user()->email}}">
                   <span class="text-danger">@error ('email') {{$message}}@enderror</span>     
                 </div>
               </div>
                
               <label for="" class="font-weight-bold mt-3">
                 Select  Images <span class="text-danger">*</span>
               </label>
               <input type="file" class="form-control input_border" name="user_image"  >
               <span class="text-danger ">@error ('user_image') {{$message}}@enderror</span><br>
                <img src="{{asset('uploads/img/'.Auth::user()->user_image)}}" width="10%">
               </div>
               <hr class="card_color2">
               <div class="">
                  <button class="btn btn_ads  mt-3">Save</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</form>

@endsection