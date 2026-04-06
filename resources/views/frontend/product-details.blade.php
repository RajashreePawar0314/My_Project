<!DOCTYPE html>
<html>

<head>

<title>Product Details</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

body {
    font-family: Arial;
    margin: 0;
}

/* FULL WIDTH IMAGE */

.product-image img {
    width: 100%;
    height: 400px;
    object-fit: cover;
}

/* DETAILS */

.details {
    padding: 20px;
}

.size-btn {
    padding: 8px 12px;
    margin: 5px;
    border: 1px solid black;
    cursor: pointer;
}

button {
    background: green;
    color: white;
    padding: 10px 20px;
    border: none;
}

button:hover {
    background: darkgreen;
}

</style>

</head>

<body>

<!-- FULL WIDTH IMAGE -->

<div class="product-image">

@if(isset($images[0]))
    <img src="{{ asset('storage/'.$images[0]->image) }}">
@endif

</div>

<!-- PRODUCT DETAILS -->

<div class="details">

<h2>
    {{ $product->name }}
</h2>

<p>
    <strong>Price:</strong>
    ₹ {{ $product->price }}
</p>

<p>
    {{ $product->description ?? 'No description available' }}
</p>

<h3>Select Size:</h3>

<button class="size-btn">S</button>
<button class="size-btn">M</button>
<button class="size-btn">L</button>
<button class="size-btn">XL</button>
<button class="size-btn">XXL</button>

<br><br>

<form action="/add-to-cart/{{ $product->id }}" method="POST">

@csrf

<button>
    Add to Cart
</button>

</form>

</div>

</body>

</html>