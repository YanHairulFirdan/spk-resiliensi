@extends('layouts.app')
@section('content')
    <h3><b>Hai {{ auth()->user()->name }}, ini hasil test kamu</b></h3>
@endsection