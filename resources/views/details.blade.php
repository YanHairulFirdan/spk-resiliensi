@extends('layout.layout')
@section('content')
<div class=" content">
    <div class="wrapper pizza-details">
        <h2>Order For - {{$pizza->name}}</h2>
        <p class="type">Type - {{ $pizza->type}}</p>
        <p class="base">Base - {{$pizza->base}}</p>
    </div>
    <a href="/pizza" class="back">Back to all pizza</a>
</div>
@endsection