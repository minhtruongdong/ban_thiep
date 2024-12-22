@extends('client.master')

@push('js')
<script type="text/javascript">


let cart = {};

function addToCart(id, name, price, image) {
    if (cart[id]) {
        cart[id].quantity++;
    } else {
        cart[id] = { name: name, price: price, quantity: 1, image: image };
    }
    updateCart();
}

function removeFromCart(id) {
    delete cart[id];
    updateCart();
}

function increaseQuantity(id) {
    cart[id].quantity++;
    updateCart();
}

function decreaseQuantity(id) {
    if (cart[id].quantity > 1) {
        cart[id].quantity--;
    } else {
        removeFromCart(id);
    }
    updateCart();
}

function updateCart() {
    let cartElement = document.getElementById('cart-items');
    let total = 0;
    cartElement.innerHTML = '';

    for (let id in cart) {
        let item = cart[id];
        total += item.price * item.quantity;

        let itemElement = document.createElement('div');
        itemElement.className = 'cart-item';
        itemElement.innerHTML = `
            <img src="${item.image}" alt="${item.name}">
            <div class="cart-item-info">
                <h3>${item.name}</h3>
                <p>$${item.price} x ${item.quantity}</p>
            </div>
            <div class="quantity-controls">
                <button onclick="decreaseQuantity(${id})">-</button>
                <span>${item.quantity}</span>
                <button onclick="increaseQuantity(${id})">+</button>
            </div>
            <button class="remove" onclick="removeFromCart(${id})">Remove</button>
        `;
        cartElement.appendChild(itemElement);
    }

    document.getElementById('total').innerText = `Total: $${total.toFixed(2)}`;
}


</script>

@endpush
@section('content')
<div class="container">
    <h1>Shopping Cart</h1>
    <div class="flex-container">
        <div class="product-list">
            <h2>Products</h2>

            @for($i=1 ; $i<=5 ; $i++)
            <div class="product">
                <img src="{{asset('administrator/img/shop/item-7-4.jpg')}}" alt="Product 1">
                <div class="product-info">
                    <h3>Product 1</h3>
                    <p>$10</p>
                </div>
                <button onclick="addToCart(1, 'Product 1', 10, '/placeholder.svg?height=80&width=80')">Add to Cart</button>
            </div>
            @endfor


        <div class="cart">
            <h2>Cart</h2>
            <div id="cart-items"></div>
            <div id="total">Total: $0</div>
        </div>
    </div>
</div>


@endsection