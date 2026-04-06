<!DOCTYPE html>
<html>

<head>
    <title>My Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
        }

        .header {
            background: #2ecc71;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h2 {
            margin: 0;
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

        .cart-container {
            max-width: 1000px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid gray;
            padding: 10px;
            text-align: center;
        }

        img {
            width: 80px;
            height: auto;
            border-radius: 5px;
        }

        .quantity-selector {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .quantity-selector button {
            padding: 5px 10px;
            font-size: 14px;
            cursor: pointer;
        }

        .quantity-selector input {
            width: 50px;
            text-align: center;
            margin: 0 5px;
        }

        .btn-main, .btn-secondary {
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin-right: 10px;
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

        .grand-total {
            font-size: 20px;
            font-weight: bold;
            text-align: right;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .cart-container {
                padding: 10px;
            }

            table, th, td {
                font-size: 14px;
            }

            .quantity-selector input {
                width: 40px;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>My Shopping Cart</h2>
        <div class="menu">
            <a href="/">Home</a>
            <a href="/cart">Cart</a>
            <a href="/profile">Profile</a>
        </div>
    </div>

    <div class="cart-container">
        @if(count($cartItems) > 0)
        <table>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Size</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Remove</th>
            </tr>

            @foreach($cartItems as $item)
            <tr data-id="{{ $item->id }}" data-price="{{ $item->price }}">
                <td><img src="{{ asset('storage/'.$item->image) }}" alt="Product"></td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->size }}</td>
                <td>₹ {{ $item->price }}</td>
                <td>
                    <div class="quantity-selector">
                        <button class="decrease">−</button>
                        <input type="number" class="quantity" value="{{ $item->quantity }}" min="1">
                        <button class="increase">+</button>
                    </div>
                </td>
                <td class="subtotal">₹ {{ $item->price * $item->quantity }}</td>
                <td>
                    <form action="/remove-from-cart/{{ $item->id }}" method="POST">
                        @csrf
                        <button type="submit">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

        <div class="grand-total">
            Grand Total: ₹ <span id="grand-total">0</span>
        </div>

        <div style="text-align:right;">
            <button class="btn-secondary" onclick="window.location.href='/'">Continue Shopping</button>
            <button class="btn-main" onclick="window.location.href='/checkout'">Checkout</button>
        </div>

        @else
        <h3 style="text-align:center; color:red;">
            Your cart is empty. Continue shopping to add products.
        </h3>
        @endif
    </div>

    <script>
        // Update Subtotal and Grand Total
        function updateTotals() {
            let grandTotal = 0;
            document.querySelectorAll('tr[data-id]').forEach(row => {
                const price = parseFloat(row.dataset.price);
                const qty = parseInt(row.querySelector('.quantity').value);
                const subtotal = price * qty;
                row.querySelector('.subtotal').textContent = '₹ ' + subtotal;
                grandTotal += subtotal;
            });
            document.getElementById('grand-total').textContent = grandTotal;
        }

        updateTotals();

        // Quantity Increase/Decrease
        document.querySelectorAll('tr[data-id]').forEach(row => {
            const decreaseBtn = row.querySelector('.decrease');
            const increaseBtn = row.querySelector('.increase');
            const qtyInput = row.querySelector('.quantity');

            decreaseBtn.addEventListener('click', () => {
                let val = parseInt(qtyInput.value);
                if(val > 1) qtyInput.value = val - 1;
                updateTotals();
            });

            increaseBtn.addEventListener('click', () => {
                qtyInput.value = parseInt(qtyInput.value) + 1;
                updateTotals();
            });

            qtyInput.addEventListener('input', () => {
                if(qtyInput.value < 1) qtyInput.value = 1;
                updateTotals();
            });
        });
    </script>
</body>
</html>