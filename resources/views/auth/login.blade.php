@extends('admin.master')

@section('content')
<div style="background-color:#30E3CA;height: 100rem;">
<div class="container mt-0" >
    <div class="row justify-content-center" >
        <div class="col-md-5">
            <div class="card shadow " style="border: 1.2px solid #002F34; margin-top: 25%;">
                
                <div class="card-header text-center ">
                   <h4> {{ __('Login ') }}</h4>
                   <p class="mb-0">Enter Your Creidential To Login</p>
                </div>

                <div class="card-body">
                    <x-logincomponent />
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
