@extends('vendor.admin')
      
@section('content')

<form action="{{route('labour.store')}}" method="POST" enctype="multipart/form-data">
   @csrf

   <div class="row justify-content-center">
      <div class="col-md-12 text-center">
          <i class="fas fa-boxes fa-3x icn"></i>
          <h2 class="h2 mt-3">Create Employee</h2>
      </div>
      <div class="col-md-11">
         <div class="card card_color shadow">
            <div class="card-body ">
              
               <div class="row">
                <div class="col-md-12 col-12">
                        <label for="" class="font-weight-bold mt-2">
                     Name <span class="text-danger">*</span>
                  </label>
                  <input type="text" class="form-control input_border" name="employee_name"  value="{{old('employee_name')}}">
                  <span class="text-danger">@error ('employee_name') {{$message}}@enderror</span>
                </div>
               </div>
               <div class="form-group">
                  
              
               <div class="row">
                 <div class="col-md-6">
                   <label for="" class="font-weight-bold mt-4">
                       Phone Number<span class="text-danger">*</span>
                   </label>
                   <input type="text" class="form-control input_border" name="employee_phone"  value="{{old('employee_phone')}}">
                   <span class="text-danger">@error ('employee_phone') {{$message}}@enderror</span>
                 </div>
                 <div class="col-md-6">
                  <label for="" class="font-weight-bold mt-4">
                       Email<span class="text-danger">*</span>
                   </label>
                   <input type="text" class="form-control input_border" name="email"  value="{{old('email')}}">
                   <span class="text-danger">@error ('email') {{$message}}@enderror</span>     
                 </div>
               </div>
                
               <label for="" class="font-weight-bold mt-3">
                 Select  Images <span class="text-danger">*</span>
               </label>
               <input type="file" class="form-control input_border" name="image"  >
               <span class="text-danger ">@error ('image') {{$message}}@enderror</span><br>

               <label for="" class="font-weight-bold mt-2">
                     Password <span class="text-danger">*</span>
                  </label>
                  <input type="password" class="form-control input_border" name="employee_password"  >
                  <span class="text-danger">@error ('employee_password') {{$message}}@enderror</span>
                  
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