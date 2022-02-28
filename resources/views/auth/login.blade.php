@extends('admin.master')

@section('content')

<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow " style="border: 1.2px solid #002F34;">
                
                <div class="card-header text-center login">{{ __('Welcome ') }}</div>

                <div class="card-body">
                    <x-logincomponent />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
