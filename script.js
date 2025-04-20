





//Carrito
// Inicialización del carrito+
 
document.addEventListener('DOMContentLoaded', () => {
    const cartSidebar = document.getElementById('cart-sidebar');
    const cartItems = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
    const toggleCartButton = document.getElementById('toggleCart');
    const closeCartButton = document.getElementById('cart-close-button');
    const overlay = document.getElementById('overlay');
    let cart = [];

    const openCart = () => {
        cartSidebar.classList.add('open');
        overlay.classList.add('active');
    };

    const closeCart = () => {
        cartSidebar.classList.remove('open');
        overlay.classList.remove('active');
    };

    toggleCartButton.addEventListener('click', (event) => {
        event.preventDefault(); 
        openCart();
    });

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', () => {
            const name = button.getAttribute('data-name');
            const price = parseFloat(button.getAttribute('data-price'));
            const image = button.getAttribute('data-image');  

            const existingItem = cart.find(item => item.name === name);
            if (existingItem) {
                existingItem.quantity++;
            } else {
                cart.push({ name, price, quantity: 1, image });  
            }

            updateCart();
            openCart();
        });
    });

    closeCartButton.addEventListener('click', closeCart);
    overlay.addEventListener('click', closeCart);

    
    const updateCart = () => {
        cartItems.innerHTML = ''; 
        let total = 0;

        if (cart.length === 0) {
            cartItems.innerHTML = '<p style="text-align: center; color: gray;">Tu carrito está vacío. ¡Agrega productos para empezar a comprar!</p>';
            cartTotal.textContent = `Total: $0.00`;
            return; 

        }


        cart.forEach((item, index) => {
            total += item.price * item.quantity;

            const li = document.createElement('li');
            li.innerHTML = `
                <img src="${item.image}" alt="${item.name}" class="cart-item-image"> <!-- Mostrar la imagen -->
                <span>${item.name} - $${item.price.toFixed(2)}</span>
                <input type="number" class="quantity-input" value="${item.quantity}" min="1" data-index="${index}" onchange="updateQuantity(event)">
                <button class="remove-item" data-index="${index}">X</button>
            `;

            cartItems.appendChild(li);

        });

        cartTotal.textContent = `Total: $${total.toFixed(2)}`;

    
        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('input', e => {
            const index = e.target.getAttribute('data-index');
            cart[index].quantity = parseInt(e.target.value, 10) || 1;
            updateCart();
        });
    });

    document.querySelectorAll('.remove-item').forEach(button => {
        button.addEventListener('click', e => {
            const index = e.target.getAttribute('data-index');
            cart.splice(index, 1); 
            updateCart(); 
        });
    });

    document.querySelectorAll('.remove-item').forEach(button => {
        button.addEventListener('click', e => {
            const index = parseInt(e.target.getAttribute('data-index'), 10); 
            const confirmDelete = confirm("¿Estás seguro de eliminar este producto?");
            if (confirmDelete) {
                cart.splice(index, 1); 
                updateCart(); 
            }
        });
    });
};


    const updateQuantity = (event) => {
        const index = event.target.getAttribute('data-index');
        cart[index].quantity = parseInt(event.target.value, 10) || 1;
        updateCart();

    };
});

document.getElementById("menu-toggle").addEventListener("click", () => {
    const navLinks = document.getElementById("nav-links");
    navLinks.classList.toggle("active"); 
});

document.querySelectorAll('.nav-links a').forEach(link => {
    link.addEventListener('click', () => {
        const navLinks = document.getElementById("nav-links");
        navLinks.classList.remove("active"); 
    });
});

document.addEventListener('click', (event) => {
    const navLinks = document.getElementById("nav-links");
    const menuToggle = document.getElementById("menu-toggle");

    if (!navLinks.contains(event.target) && !menuToggle.contains(event.target)) {
        navLinks.classList.remove("active"); 
    }
});

const modal = document.getElementById("modal");
const modalMessage = document.getElementById("modal-message");
const closeModalButton = document.getElementById("close-modal");

function showModal(message) {
    modalMessage.textContent = message; 
    modal.style.display = "block"; 
}

closeModalButton.addEventListener("click", () => {
    modal.style.display = "none"; 
});

window.addEventListener("click", (event) => {
    if (event.target === modal) {
        modal.style.display = "none"; 
    }
});

document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', () => {
        const productName = button.getAttribute('data-name');
        showModal(`"${productName}" agregado al carrito`); 
    });
});


document.addEventListener("DOMContentLoaded", () => {
    const checkoutButton = document.getElementById("checkout-button");
    const cartItems = document.getElementById("cart-items");
    const modal = document.getElementById("modal");
    const modalMessage = document.getElementById("modal-message");
    const closeModalButton = document.getElementById("close-modal");

    closeModalButton.addEventListener("click", () => {
        modal.style.display = "none";
    });

    checkoutButton.addEventListener("click", () => {
        if (cartItems.children.length > 0) {
            window.location.href = "/checkout.html";
        } else {
            modalMessage.textContent = "El carrito está vacío. Por favor, agrega productos antes de pagar.";
            modal.style.display = "block";
        }
    });
});


document.addEventListener("DOMContentLoaded", () => {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    
    const cartItemsContainer = document.getElementById("cart-items");

    // Mostrar los productos del carrito en el checkout
    if (cart.length > 0) {
        cart.forEach(item => {
            const productElement = document.createElement("div");
            productElement.classList.add("cart-item");

            productElement.innerHTML = `
                <img src="${item.image}" alt="${item.title}">
                <h4>${item.title}</h4>
                <p>${item.price}</p>
            `;
            cartItemsContainer.appendChild(productElement);
        });
    } else {
        cartItemsContainer.innerHTML = "<p>Tu carrito está vacío.</p>";
    }
});

/*para ver los iconos en la hambun*/

document.addEventListener("DOMContentLoaded", function() {
    const toggleCartButton = document.getElementById("toggleCart");
    const cartSidebar = document.getElementById("cart-sidebar");
    const overlay = document.getElementById("overlay");
    const cartCloseButton = document.getElementById("cart-close-button");

    // Abrir carrito
    toggleCartButton.addEventListener("click", function() {
        cartSidebar.style.display = "block";
        overlay.style.display = "block";
    });

    // Cerrar carrito
    cartCloseButton.addEventListener("click", function() {
        cartSidebar.style.display = "none";
        overlay.style.display = "none";
    });

    // Cerrar el carrito cuando se haga clic en el overlay
    overlay.addEventListener("click", function() {
        cartSidebar.style.display = "none";
        overlay.style.display = "none";
    });
});

