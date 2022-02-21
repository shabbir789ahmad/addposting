@extends('admin.master')

@section('content')
<style type="text/css">
     .container{
        margin-top:5%
    }
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="d-flex mt-4">
                <button type="button" class="btn btn_color w-50 mr-2 active" id="user_form" disabled>Register as User</button>
                <button type="button" class="btn btn_color w-50 "  id="vendor_form">Register as Vendor</button>
            </div>
                <div class="card-body" id="user">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <x-Registercomponent />
                        <input type="hidden" name="type" value="0">
                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn_color w-100">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-body" id="vendor" style="display: none;">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <x-Registercomponent />
                        <input type="hidden" name="type" value="1">
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
@endsection
