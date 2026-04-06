<!--
<!DOCTYPE html>
<html>

<head>
    <title>Product Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
       .product-container {
    max-width: 600px;  /* container width */
    margin: 20px auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    text-align: center; /* center image and details */
}

.product-image img {
    width: 80%;      /* medium size, not full width */
    max-width: 400px;
    height: auto;
    border-radius: 10px;
    margin-bottom: 20px;
}

.details {
    text-align: center; /* all text centered */
}

.size-btn {
    padding: 8px 12px;
    margin: 5px 5px 5px 0;
    border: 1px solid black;
    cursor: pointer;
    background-color: white;
    transition: 0.2s;
}

.size-btn.selected {
    background-color: black;
    color: white;
}

.quantity-selector {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 15px 0;
}

.quantity-selector button {
    padding: 6px 12px;
    font-size: 16px;
    cursor: pointer;
}

.quantity-selector input {
    width: 50px;
    text-align: center;
    margin: 0 10px;
    font-size: 16px;
    padding: 5px;
}

.total-price {
    font-size: 18px;
    font-weight: bold;
    margin: 10px 0;
}

.btn-main, .btn-secondary {
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    margin: 5px;
}

.btn-main {
    background: green;
    color: white;
}

.btn-main:hover {
    background: darkgreen;
}

.btn-secondary {
    background: #555;
    color: white;
}

.btn-secondary:hover {
    background: #333;
}

.message {
    margin: 10px 0;
    color: red;
    font-weight: bold;
}
</style>
</head>

<body>
    
    <!-- FULL WIDTH IMAGE 
    <div class="product-container">
    <div class="product-image">
        @if(isset($images[0]))
        <img src="{{ asset('storage/'.$images[0]->image) }}" alt="Product Image">
        @endif
    </div>

    <div class="details">
        <h2>{{ $product->name }}</h2>
        <p><strong>Price:</strong> ₹ <span id="price">{{ $product->price }}</span></p>
        <p>{{ $product->description ?? 'No description available' }}</p>

        <h3>Select Size:</h3>
        <div id="sizes">
            <button type="button" class="size-btn">S</button>
            <button type="button" class="size-btn">M</button>
            <button type="button" class="size-btn">L</button>
            <button type="button" class="size-btn">XL</button>
            <button type="button" class="size-btn">XXL</button>
        </div>

        <div class="quantity-selector">
            <button type="button" id="decrease">−</button>
            <input type="number" id="quantity" value="1" min="1">
            <button type="button" id="increase">+</button>
        </div>

        <p class="total-price">Total: ₹ <span id="total-price">{{ $product->price }}</span></p>

        <p class="message" id="message"></p>

        <form id="cart-form" action="/add-to-cart/{{ $product->id }}" method="POST">
            @csrf
            <input type="hidden" name="size" id="selected-size" value="">
            <input type="hidden" name="quantity" id="selected-quantity" value="1">
            <button type="submit" class="btn-main">Add to Cart</button>
            <button type="button" class="btn-secondary" onclick="window.location.href='/'">Continue Shopping</button>
        </form>
    </div>
</div>
    <script>
        // Size Selection
       // Size Selection
const sizeButtons = document.querySelectorAll('.size-btn');
let selectedSize = '';
const messageEl = document.getElementById('message');
const sizeInput = document.getElementById('selected-size');

sizeButtons.forEach(btn => {
    btn.addEventListener('click', () => {
        sizeButtons.forEach(b => b.classList.remove('selected'));
        btn.classList.add('selected');
        selectedSize = btn.textContent;
        sizeInput.value = selectedSize;
        messageEl.textContent = '';
    });
});

// Quantity Selector
const decreaseBtn = document.getElementById('decrease');
const increaseBtn = document.getElementById('increase');
const quantityInput = document.getElementById('quantity');
const totalPriceEl = document.getElementById('total-price');
const pricePerItem = parseFloat(document.getElementById('price').textContent);

function updateTotal() {
    let qty = parseInt(quantityInput.value);
    if (qty < 1) quantityInput.value = 1;
    totalPriceEl.textContent = pricePerItem * quantityInput.value;
    document.getElementById('selected-quantity').value = quantityInput.value;
}

decreaseBtn.addEventListener('click', () => {
    quantityInput.value = parseInt(quantityInput.value) - 1;
    updateTotal();
});

increaseBtn.addEventListener('click', () => {
    quantityInput.value = parseInt(quantityInput.value) + 1;
    updateTotal();
});

quantityInput.addEventListener('input', updateTotal);

// Form Submit Validation
const cartForm = document.getElementById('cart-form');
cartForm.addEventListener('submit', function(e) {
    if (!selectedSize) {
        e.preventDefault();
        messageEl.textContent = 'Please select a size before adding to cart.';
    }
});
    </script>

</body>

</html>-->


<!DOCTYPE html>
<html>

<head>
    <title>Product Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .product-container {
            max-width: 600px;  
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        .product-image img {
            width: 80%;      
            max-width: 400px;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .details {
            text-align: center;
        }

        .size-btn {
            padding: 8px 12px;
            margin: 5px 5px 5px 0;
            border: 1px solid black;
            cursor: pointer;
            background-color: white;
            transition: 0.2s;
        }

        .size-btn.selected {
            background-color: black;
            color: white;
        }

        .quantity-selector {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 15px 0;
        }

        .quantity-selector button {
            padding: 6px 12px;
            font-size: 16px;
            cursor: pointer;
        }

        .quantity-selector input {
            width: 50px;
            text-align: center;
            margin: 0 10px;
            font-size: 16px;
            padding: 5px;
        }

        .total-price {
            font-size: 18px;
            font-weight: bold;
            margin: 10px 0;
        }

        .btn-main, .btn-secondary {
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin: 5px;
        }

        .btn-main {
            background: green;
            color: white;
        }

        .btn-main:hover {
            background: darkgreen;
        }

        .btn-secondary {
            background: #555;
            color: white;
        }

        .btn-secondary:hover {
            background: #333;
        }

        .message {
            margin: 10px 0;
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="product-container">
        <div class="product-image">
            @if(isset($images[0]))
                <img src="{{ asset('storage/'.$images[0]->image) }}" alt="Product Image">
            @endif
        </div>

        <div class="details">
            <h2>{{ $product->name }}</h2>
            <p><strong>Price:</strong> ₹ <span id="price">{{ $product->price }}</span></p>
            <p>{{ $product->description ?? 'No description available' }}</p>

            <h3>Select Size:</h3>
            <div id="sizes">
                <button type="button" class="size-btn">S</button>
                <button type="button" class="size-btn">M</button>
                <button type="button" class="size-btn">L</button>
                <button type="button" class="size-btn">XL</button>
                <button type="button" class="size-btn">XXL</button>
            </div>

            <div class="quantity-selector">
                <button type="button" id="decrease">−</button>
                <input type="number" id="quantity" value="1" min="1">
                <button type="button" id="increase">+</button>
            </div>

            <p class="total-price">Total: ₹ <span id="total-price">{{ $product->price }}</span></p>
            <p class="message" id="message"></p>

            <form id="cart-form" action="/add-to-cart/{{ $product->id }}" method="POST">
                @csrf
                <input type="hidden" name="size" id="selected-size" value="">
                <input type="hidden" name="quantity" id="selected-quantity" value="1">
                <button type="submit" class="btn-main">Add to Cart</button>
                <button type="button" class="btn-secondary" onclick="window.location.href='/'">Continue Shopping</button>
            </form>
        </div>
    </div>

    <script>
        // Size Selection
        const sizeButtons = document.querySelectorAll('.size-btn');
        let selectedSize = '';
        const messageEl = document.getElementById('message');
        const sizeInput = document.getElementById('selected-size');

        sizeButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                sizeButtons.forEach(b => b.classList.remove('selected'));
                btn.classList.add('selected');
                selectedSize = btn.textContent;
                sizeInput.value = selectedSize;
                messageEl.textContent = '';
            });
        });

        // Quantity Selector
        const decreaseBtn = document.getElementById('decrease');
        const increaseBtn = document.getElementById('increase');
        const quantityInput = document.getElementById('quantity');
        const totalPriceEl = document.getElementById('total-price');
        const selectedQuantityInput = document.getElementById('selected-quantity');
        const pricePerItem = parseFloat(document.getElementById('price').textContent);

        function updateTotal() {
            let qty = parseInt(quantityInput.value);
            if (qty < 1) qty = 1;
            quantityInput.value = qty;
            totalPriceEl.textContent = (pricePerItem * qty).toFixed(2);
            selectedQuantityInput.value = qty;
        }

        decreaseBtn.addEventListener('click', () => {
            quantityInput.value = parseInt(quantityInput.value) - 1;
            updateTotal();
        });

        increaseBtn.addEventListener('click', () => {
            quantityInput.value = parseInt(quantityInput.value) + 1;
            updateTotal();
        });

        quantityInput.addEventListener('input', updateTotal);

        // Form Submit Validation
        const cartForm = document.getElementById('cart-form');
        cartForm.addEventListener('submit', function(e) {
            if (!selectedSize) {
                e.preventDefault();
                messageEl.textContent = 'Please select a size before adding to cart.';
            }
        });
    </script>

</body>
</html>