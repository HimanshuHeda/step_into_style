let cartItems = [];
let totalAmount = 0;

function addToCart(itemName, itemPrice, itemImage) {
    const item = {
        name: itemName,
        price: itemPrice,
        image: itemImage,
    };
    cartItems.push(item);
    totalAmount += itemPrice;
    displayCart();
}

function displayCart() {
    const cartList = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');

    cartList.innerHTML = '';
    cartItems.forEach((item, index) => {
        const listItem = document.createElement('li');
        listItem.innerHTML = `
    <img src="${item.image}" alt="${item.name}" width="50" height="50">
        <span>${item.name} - $${item.price.toFixed(2)}</span>
        <button onclick="removeFromCart(${index})">Remove</button>
        `;
        cartList.appendChild(listItem);
    });

    cartTotal.textContent = `$${totalAmount.toFixed(2)}`;
}

function removeFromCart(index) {
    const removedItem = cartItems.splice(index, 1)[0];
    totalAmount -= removedItem.price;
    displayCart();
}

const cart = document.querySelector('.cart');
const showCartButton = document.getElementById('showCartButton');

showCartButton.addEventListener('click', function (event) {
    event.preventDefault();
    cart.classList.add('show');
});