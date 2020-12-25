@extends('layouts.app')
{{-- @include('components.formStepper') --}}
@section('content')
    <h3><b>Hai {{ auth()->user()->name }}, ini hasil test kamu</b></h3>
@endsection