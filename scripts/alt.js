// Cart
let cartIcon = document.querySelector("#cart-icon");
let cart = document.querySelector(".cart");
let closeCart = document.querySelector("#close-cart");
// Open Cart
cartIcon.onclick = () => {
    cart.classList.add("active");
};
// Close Cart
closeCart.onclick = () => {
    cart.classList.remove("active");
};
// Cart working JS
if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready);
} else {
    ready();
}

//Function
function ready() {
    //Remove item from cart
    var removeCartButtons = document.getElementsByClassName('cart-remove');
    console.log(removeCartButtons);
    for (var i = 0; i < removeCartButtons.length; i++) {
        var button = removeCartButtons[i];
        button.addEventListener('click', removeCartItem);
    }
    //increment item amount 
    var plusCartButton = document.getElementsByClassName('cart-increment');
    for (var i = 0; i < plusCartButton.length; i++) {
        var button = plusCartButton[i];
        button.addEventListener('click', increaseCartItemAmount);
    }
    // Quantity Changes
    var quantityInputs = document.getElementsByClassName('cart-quantity');
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i];
        input.addEventListener("change", quantityChanged);
    }
    // Add to cart
    var addCart = document.getElementsByClassName('add-cart');
    for (var i = 0; i < addCart.length; i++) {
        var button = addCart[i];
        button.addEventListener('click', addCartClicked);
    }
    // Buy button work
    document.getElementsByClassName('btn-buy')[0].addEventListener('click', buyButtonClicked);
}
// fx buy button
function buyButtonClicked() {
    alert('Your Order is Placed')
    var cartContent = document.getElementsByClassName('cart-content')[0];
    while (cartContent.hasChildNodes()) {
        insertCartData();
        cartContent.removeChild(cartContent.firstChild);
    }
    updateTotal();
}
// remove Item from cart
function removeCartItem(event) {
    var buttonClicked = event.target;
    buttonClicked.parentNode.parentNode.remove();
    updateTotal();
}
//increase item amount
function increaseCartItemAmount(event) {
    var button = event.target;
    var quantityInput = button.parentNode.parentNode.querySelector('.cart-quantity');
    quantityInput.value++;

    updateTotal();
}

// Quantity changes
function quantityChanged(event) {
    var input = event.target
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1;
    }
    updateTotal();
}
// fx Add to Cart
function addCartClicked(event) {
    var button = event.target;
    var shopProducts = button.parentElement
    var title = shopProducts.getElementsByClassName('product-title')[0].innerText;
    var price = shopProducts.getElementsByClassName('price')[0].innerText;
    var productImg = shopProducts.getElementsByClassName('product-img')[0].src;
    addProductToCart(title, price, productImg);
    updateTotal();
}
function addProductToCart(title, price, productImg) {
    var cartShopBox = document.createElement("div");
    cartShopBox.classList.add('cart-box');
    var cartItems = document.getElementsByClassName('cart-content')[0];
    var cartItemsNames = cartItems.getElementsByClassName('cart-product-title');
    var item_name = cartItemsNames;
    for (var i = 0; i < cartItemsNames.length; i++) {
        if (cartItemsNames[i].innerText == title) {
            alert("Already add this item to cart");
            return;
        }
    }
    var cartBoxContent = `
                    <img src="${productImg}" alt="" class="cart-img">
                    <div class="detail-box">
                        <div class="cart-product-title">${title}</div>
                        <div class="cart-price">${price}</div>
                        <input type="number" value="1" class="cart-quantity">
                    </div>
                    <div class="quantity-container">
                    <i class='bx bx-plus-circle cart-increment' ></i>
                    <!-- Remove Cart -->
                    <i class='bx bx-minus-circle cart-remove'></i>;
                    </div>`;
                  
    cartShopBox.innerHTML = cartBoxContent;
    cartItems.append(cartShopBox);
    cartShopBox.getElementsByClassName('cart-increment')[0]
        .addEventListener('click', increaseCartItemAmount);
    cartShopBox.getElementsByClassName('cart-remove')[0]
        .addEventListener('click', removeCartItem);
    cartShopBox.getElementsByClassName('cart-quantity')[0]
        .addEventListener('change', quantityChanged);
}

// Update total
function updateTotal() {
    var cartContent = document.getElementsByClassName('cart-content')[0];
    var cartBoxes = cartContent.getElementsByClassName('cart-box');
    var total = 0;
    for (var i = 0; i < cartBoxes.length; i++) {
        var cartBox = cartBoxes[i];
        var priceElement = cartBox.getElementsByClassName('cart-price')[0];
        var quantityElement = cartBox.getElementsByClassName('cart-quantity')[0];
        var price = parseFloat(priceElement.innerText.replace("RM", ""));
        var quantity = quantityElement.value;
        total = total + (price * quantity);
    }
    // If price have cents or float value
    total = Math.round(total * 100) / 100;
    var price = total;

    document.getElementsByClassName('total-price')[0].innerText = "RM" + total;

}

// Insert items into cartdb
function insertCartData(var itemName, var quantity) {
    // Get the item name, quantity, and price from the cart
    var item_name = document.getElementById('item_name').value;
    var quantity = document.getElementById('quantity').value;
  
    // Create a new FormData object
    var formData = new FormData();
    formData.append('item_name', item_name);
    formData.append('quantity', quantity);
    formData.append('price', price);
  
    // Call the PHP script to insert the cart data into the database
    $.ajax({
      url: 'phpfile/processCart.php',
      type: 'POST',
      data: formData,
      success: function(data) {
        // Do something with the success response
      },
      error: function(error) {
        // Do something with the error response
      }
    });
  }