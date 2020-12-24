@extends('layouts.app')
@section('content')
    <div class="container"><h3><b>Hai {{ auth()->user()->name }}, ini hasil test kamu</b></h3></div>
@endsection