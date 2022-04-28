

<form method="POST" action="{{ route('company.register') }}" enctype="multipart/form-data">
      @csrf
        <div class="title">Register</div>
        
        <div class="row">
          <div class="col-md-6">
        <div class="input-box underline">
          <input  type="text" class="" @error('name')  is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="name" autofocus >
          <div class="underline"></div>
          @error('name')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
        </div>
       </div>
       <div class="col-md-6">
        <div class="input-box underline">
          <input  id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocu placeholder="Enter Your Email" >
          <div class="underline"></div>
          @error('email')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
        </div>
   
   </div>
 
         
       <div class="col-md-6">
        <div class="input-box">
          <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
          <div class="underline"></div>
          @error('password')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
         @enderror
        </div>
       </div>
         
     

       <div class="col-md-6">
        <div class="input-box">
          <input id="phone" type="number"  name="phone" required  placeholder="Phone" value="{{ old('phone') }}">
          <div class="underline"></div>
          @error('phone')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
         @enderror
        </div>
        </div>

        <div class="col-md-6">
        <div class="input-box">
           <input id="image" type="file" class=" border-secondary form-control" name="image" required >
           <small class="text-danger">Profile Image</small>
          <div class="underline"></div>
          @error('image')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
         @enderror
        </div>
       </div>
       <div class="col-md-6"></div>
       <div class="title">Comapny</div>

        
       </div>
       <div class="row">
         <div class="col-md-6">
        <div class="input-box">
           <input  type="text"  name="company_name" value="{{old('company_name')}}" required  placeholder="Company Name">
          <div class="underline"></div>
          @error('company_name')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
         @enderror
        </div>
       </div>

       <div class="col-md-6">
        <div class="input-box">
           <input  type="text"  name="licenece_no" value="{{old('licenece_no')}}" required  placeholder="Liecense No ">
          <div class="underline"></div>
          @error('licenece_no')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
         @enderror
        </div>
       </div>

       <div class="col-md-6">
        <div class="input-box">
           <input  type="text"  name="company_address" value="{{old('company_address')}}" required  placeholder="Company Address ">
          <div class="underline"></div>
          @error('company_address')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
         @enderror
        </div>
       </div>

       <div class="col-md-6">
        <div class="input-box">
           <input  type="text"  name="city" value="{{old('city')}}" required  placeholder="City  ">
          <div class="underline"></div>
          @error('city')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
         @enderror
        </div>
       </div>

       <div class="col-md-6">
        <div class="input-box">
           <input  type="text"  name="zip_code" value="{{old('zip_code')}}" required  placeholder="Postal/zip code  ">
          <div class="underline"></div>
          @error('zip_code')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
         @enderror
        </div>
       </div>
       <div class="col-md-6">
        <div class="input-box">
           <input  type="file"  name="licenece_image" value="{{old('licenece_image')}}" required  placeholder="Company Licence   ">
           <small class="text-danger">Company Licence Image</small>
          <div class="underline"></div>
          @error('licenece_image')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
         @enderror
        </div>
       </div>

       

     </div>
         

    

        <div class="input-box button">
          <input type="submit" name="" value="Continue">
        </div>
      </form>


