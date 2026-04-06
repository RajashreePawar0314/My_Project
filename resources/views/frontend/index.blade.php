<!DOCTYPE html>
<html>

<head>

<title>MakeDream</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
body {
    font-family: Arial;
    margin: 0;
}

.main-container {
    display: flex;
}

.sidebar {
    width: 250px;
    background: #f5f5f5;
    padding: 15px;
}

.category-box {
    margin-bottom: 15px;
}

.subcategory {
    margin-left: 15px;
    margin-top: 5px;
}

.product-section {
    flex: 1;
    padding: 20px;
}

.products {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.product-card {
    width: 200px;
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}

.product-card img {
    width: 100%;
    height: 150px;
    object-fit: cover;
}

button {
    background: green;
    color: white;
    padding: 8px;
    border: none;
    cursor: pointer;
}

button:hover {
    background: darkgreen;
}

.search-bar {
    background: #f8f8f8;
    padding: 15px;
    text-align: center;
}

.search-bar input {
    width: 300px;
    padding: 8px;
}

.search-bar button {
    padding: 8px 15px;
    background: green;
    color: white;
    border: none;
    cursor: pointer;
}

.search-bar button:hover {
    background: darkgreen;
}

.header {
    background: #2ecc71;
    color: white;
    padding: 15px;

    display: flex;
    justify-content: space-between;
    align-items: center;
}

.menu a {
    color: white;
    text-decoration: none;
    margin-left: 20px;
    font-weight: bold;
}

.menu a:hover {
    text-decoration: underline;
}

    </style>

</head>

<body>

<!-- Header -->

<div class="header">

    <div class="logo">
        <h2>MakeDream</h2>
    </div>

    <div class="menu">

        <a href="/">
            Home
        </a>

        <a href="/cart">
            Cart
        </a>

        <a href="/profile">
            Profile
        </a>

    </div>

</div>

<!-- Sidebar Menu -->


<div class="search-bar">
    <form action="/search" method="GET">
        <input
            type="text"
            name="keyword"
            placeholder="Search products..."
            required
        >
        <button type="submit">
            Search
        </button>
    </form>
</div>


<div class="main-container">

    <!-- LEFT SIDEBAR -->
    <div class="sidebar">

        <h3>Categories</h3>

        @foreach($categories as $category)

            <div class="category-box">

                <a href="/category/{{ $category->id }}">
                    <strong>{{ $category->name }}</strong>
                </a>

                <!-- Subcategories -->

                @foreach($subcategories as $subcategory)

                    @if($subcategory->parent_id == $category->id)

                        <div class="subcategory">

                            <a href="/subcategory/{{ $subcategory->id }}">
                                {{ $subcategory->name }}
                            </a>

                        </div>

                    @endif

                @endforeach

            </div>

        @endforeach

    </div>


    <!-- PRODUCTS AREA -->

 <div class="product-section">

    <h2>Our Products</h2>

    @if(count($products) > 0)

        <div class="products">

            @foreach($products as $product)

                <div class="product-card">
                    <a href="/product/{{ $product->id }}">

                        <img src="{{ asset('storage/'.$product->image) }}">

                        <!-- DEBUG: shows image name -->


                        <h4>
                            {{ $product->name }}
                        </h4>

                    </a>

                    <p>
                        ₹ {{ $product->price }}
                    </p>

                </div>

            @endforeach

                </div>


        </div>

    @else

        No products found

    @endif

</div>
</div>


</body>

</html>