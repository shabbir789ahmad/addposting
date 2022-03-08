@extends('admin.master')

@section('content')

<div class="login-box row" style="overflow:hidden">
 <div class="col-md-4"></div>
    <div class="card card-outline card-primary col-md-4 " style="margin-top:10%;overflow:hidden"> 
        @if(session()->has('adminerror'))
            <div class="alert alert-danger">
           <strong>Error!</strong>{{session()->get('adminerror')}}
            </div>
            @endif
        <div class="card-header text-center">
            <a href="#" class="h1">Admin Login </a>
        </div>
        <div class="card-body">

            <p class="login-box-msg text-center">Sign in to start your session</p>

            <form id="login-form" action="{{ route('admin.authenticate') }}" method="post">
                @csrf
                <div class="row">
                 <div class="col-12 col-md-12">
                   <label for="">
                        <i class="fa fa-fw fa-envelope"></i>
                        Email
                    </label>
                    <input type="email" class="form-control" name="email" />
                 </div>
                 <div class="col-12 col-md-12 mt-2">
                    <label for="">
                        <i class="fa fa-fw fa-key"></i>
                        Password
                    </label>
                    <input type="password" class="form-control" name="password"/>
                 </div>
                  <div class="col-12 col-md-12 mt-2" >
                       <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                     <label class="form-check-label" for="inlineCheckbox1">Forgot Password</label>
                      </div>
                     
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    
                </div>
                
             </form>

            

        </div>

        <div class="overlay d-none">
            <i class="fas fa-2x fa-spin fa-sync-alt"></i>
        </div>

    </div>

</div>

@endsection

@section('script')

@parent

<script>
    $(document).ready(function() {

        $('#login-form').submit(function() {
            
            $('.overlay').removeClass('d-none');

        });
        
    });
</script>

@endsection
