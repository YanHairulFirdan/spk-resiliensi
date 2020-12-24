@extends('layout.layout')
@section('content')
<div class="wrapper create-pizza">
    <h1>create a new pizza</h1>
    <form action="/pizzas" method="post">
        @csrf
        <label for="name" >Your name</label>
        <input type="text" name="name" id="name">
        <label for="price" >Price</label>
        <input type="text" name="price" id="price">
        <label for="type">Choose pizza type</label>
        <select name="type" id="type">
            <option value="margherita">Margherita</option>
            <option value="hawaiian">hawaiian</option>
            <option value="veg supreme">Veg supreme</option>
            <option value="volcano">Volcano</option>
        </select>
        <label for="base">Choose a base type : </label>
        <select name="base" id="base">
            <option value="cheesy crust">Cheesy Crust</option>
            <option value="hawaiian">hawaiian</option>
            <option value="garlic crust">Garlic Crust</option>
            <option value="thin & crispy">Thin & Crispy</option>
            <option value="thick">Thick</option>
        </select>
        <input type="submit" value="Order For Pizza"/>
    </form>
</div>
@endsection