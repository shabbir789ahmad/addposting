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
.row{
  background: #fff;
  max-width: 600px;
  width: 100%;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 10px 10px rgba(0, 0, 0, 0.15);
}
.row .a{
 

  padding: 25px 30px;
 background: #F4007B;
}
.row .b{

  padding: 25px 30px;
 background: #002F34;
}
.row .b:hover{

 background: #002F34;
}
.row a{
  color: #fff;
  text-decoration: none;
}
.grid  .title{
  font-size: 4vw;
  font-weight: 600;
  margin: 0px 0 10px 0;
  position: relative;
  color: #fff;
}
.grid  .title:before{
  content: '';
  position: absolute;
  height: 4px;
  width: 60px;
  left: 0px;
  bottom: 7px;
  border-radius: 5px;
  background: linear-gradient(to right, #99004d 0%, #ff0080 100%);
}
</style>

<div class="grid">
    
       
    <div class="title">Login</div>
     
      <div class="row ">
         <div class="col-md-6 a text-center">
            @if (Route::has('register'))
             <a class="btn btn-link" href="{{ route('login') }}">
               <span class="font-weight-bold ">Login as User </span>
             </a>
             @endif
          </div>
          <div class="col-md-6 b  text-center">
            @if (Route::has('register'))
             <a class="btn btn-link" href="{{ route('company.login') }}">
               <span class="font-weight-bold ">Login as Agent</span>
             </a>
             @endif
          </div>
      </div>
        
     
   
 </div>


@endsection
