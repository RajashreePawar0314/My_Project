<!DOCTYPE html>
<html>

<head>

<title>My Cart</title>

<style>

table {
    width: 80%;
    margin: auto;
    border-collapse: collapse;
}

th, td {
    border: 1px solid gray;
    padding: 10px;
    text-align: center;
}

img {
    width: 80px;
}

button {
    background: green;
    color: white;
    padding: 8px 12px;
    border: none;
}

</style>

</head>

<body>

<h2 style="text-align:center;">

My Shopping Cart

</h2>

@if(count($cartItems) > 0)

<table>

<tr>

<th>Image</th>
<th>Name</th>
<th>Price</th>
<th>Quantity</th>

</tr>

@foreach($cartItems as $item)

<tr>

<td>

<img src="{{ asset('storage/'.$item->image) }}">

</td>

<td>

{{ $item->name }}

</td>

<td>

₹ {{ $item->price }}

</td>

<td>

{{ $item->quantity }}

</td>

</tr>

@endforeach

</table>

@else

<h3 style="text-align:center; color:red;">

Cart is empty

</h3>

@endif

</body>

</html>