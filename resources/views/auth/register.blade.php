@extends('admin.master')

@section('content')
<style type="text/css">
     
    .login{
        font-family: ;
        font-size: 2rem;
        font-weight: 650;
    }
     .btn_color{
        background: #002F34;
        color: #ffffff;
    }
</style>
<div style="background-color:#30E3CA;height: 100rem;">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow" style="border: 1.2px solid #002F34; margin-top:8%">
                 <div class="card-header text-center ">
                   <h4> {{ __('Register ') }}</h4>
                   <p class="mb-0">Enter Your Creidential To Register</p>
                </div>
                <div class="card-body" id="user">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <x-Registercomponent />
                        <div class="d-flex mb-3">
                <button type="button" class="btn btn_color w-50 mr-2 active" id="user_form" disabled>Register as User</button>
                <button type="button" class="btn btn_color w-50 "  id="vendor_form">Register as Vendor</button>
            </div>
                        <input type="hidden" name="type" value="0" id="type">
                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn_color w-100">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                
            </div>
        </div>
    </div>
</div>

</div>
@endsection
