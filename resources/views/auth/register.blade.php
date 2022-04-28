
@extends('admin.master')

@section('content')
<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
.grid{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh;
  width: 100%;
  place-items: center;
  background: linear-gradient(to right, #1e548f 0%, #154578 100%);
}
::selection{
  background: #ff80bf;

}
.container{
  background: #fff;
  max-width: 450px;
  width: 100%;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 10px 10px rgba(0, 0, 0, 0.15);
}
.container form .title{
  font-size: 30px;
  font-weight: 600;
  margin: 20px 0 10px 0;
  position: relative;
}
.container form .title:before{
  content: '';
  position: absolute;
  height: 4px;
  width: 33px;
  left: 0px;
  bottom: 3px;
  border-radius: 5px;
  background: linear-gradient(to right, #99004d 0%, #ff0080 100%);
}
.container form .input-box{
  width: 100%;
  height: 45px;
  margin-top: 25px;
  position: relative;
}
.container form .input-box input{
  width: 100%;
  height: 100%;
  outline: none;
  font-size: 16px;
  border: none;
}
.container form .underline::before{
  content: '';
  position: absolute;
  height: 2px;
  width: 100%;
  background: #ccc;
  left: 0;
  bottom: 0;
}
.container form .underline::after{
  content: '';
  position: absolute;
  height: 2px;
  width: 100%;
   background: linear-gradient(to right, #1e548f 0%, #154578 100%);
  left: 0;
  bottom: 0;
  transform: scaleX(0);
  transform-origin: left;
  transition: all 0.3s ease;
}
.container form .input-box input:focus ~ .underline::after,
.container form .input-box input:valid ~ .underline::after{
  transform: scaleX(1);
  transform-origin: left;
}
.container form .button{
  margin: 40px 0 20px 0;
}
.container .input-box input[type="submit"]{
    background: linear-gradient(to right, #1e548f 0%, #154578 100%);
  font-size: 17px;
  color: #fff;
  border-radius: 5px;
  cursor: pointer;
  transition: all 0.3s ease;
}
.container .input-box input[type="submit"]:hover{
  letter-spacing: 1px;
    background: linear-gradient(to left, #1e548f 0%, #154578 100%);
}

/*.container .facebook a,*/
 .twitter a{
  display: block;
  height: 45px;
  width: 100%;
  font-size: 15px;
  text-decoration: none;
  padding-left: 20px;
  padding-right: 20px;
  line-height: 45px;
  color: #fff;
  border-radius: 5px;
  transition: all 0.3s ease;
}

/*.container .facebook i,*/
 .twitter i{
  padding-right: 12px;
  font-size: 20px;
}
 .twitter a{
  background: linear-gradient(to right, #99004d 0%, #ff0080 100%);
  margin: 20px 0 15px 0;
}
 .twitter a:hover{
  background: linear-gradient(to left, #99004d 0%, #ff0080 100%);
  margin: 20px 0 15px 0;
}


</style>


<div class="grid">
    
       

    <div class="container">
     

<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
      @csrf
        <div class="title">Register</div>
        
        <div class="row">
          <div class="col-md-12">
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
       <div class="col-md-12">
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
 
         
       <div class="col-md-12">
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

       <div class="col-md-12">
        <div class="input-box">
          <input id="password" type="password" class="@error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password" placeholder="Conform Password">
          <div class="underline"></div>
          @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
         @enderror
        </div>
       </div>
         
     

       <div class="col-md-12">
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

        <div class="col-md-12">
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
       
    

        
       </div>
    
         

    

        <div class="input-box button">
          <input type="submit" name="" value="Continue">
        </div>
      </form>
    
        
     
    </div>
 </div>


@endsection

