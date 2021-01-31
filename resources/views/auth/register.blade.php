@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-bold">{{ __('Registrasi dulu yuk!') }}</div>
                    <div class="card-body">
                        @include('components.registerForm')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
