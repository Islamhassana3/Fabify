jQuery(document).ready(function($) {
    // DOM Elements
    const cartSidebar = $('#cartSidebar');
    const closeCart = $('#closeCart');
    const overlay = $('#overlay');
    const cartIcon = $('#cartIcon');
    const cartItems = $('#cartItems');
    const cartSubtotal = $('#cartSubtotal');
    const cartShipping = $('#cartShipping');
    const cartTax = $('#cartTax');
    const cartTotal = $('#cartTotal');
    const cartCount = $('.cart-count');
    const toast = $('#toast');
    const toastMessage = $('#toastMessage');
    const emptyCartMessage = $('#emptyCartMessage');

    // Cart state
    let cart = [];
    let cartOpen = false;

    // Initialize carousel
    function initCarousel() {
        const slides = document.querySelectorAll('.hero-slide');
        const indicators = document.querySelectorAll('.indicator');
        let currentSlide = 0;
        
        function showSlide(index) {
            slides.forEach(slide => slide.classList.remove('active'));
            indicators.forEach(indicator => indicator.classList.remove('active'));
            
            slides[index].classList.add('active');
            indicators[index].classList.add('active');
            currentSlide = index;
        }
        
        // Auto advance slides
        setInterval(() => {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }, 5000);
        
        // Manual slide control
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                showSlide(index);
            });
        });
    }

    // Update cart UI
    function updateCartUI() {
        // Update cart items
        cartItems.html('');
        
        if (cart.length === 0) {
            emptyCartMessage.show();
        } else {
            emptyCartMessage.hide();
            
            let subtotal = 0;
            
            cart.forEach(item => {
                const itemTotal = item.price * item.quantity;
                subtotal += itemTotal;
                
                const cartItemHtml = `
                    <div class="cart-item">
                        <img src="${item.image}" alt="${item.name}" class="cart-item-image">
                        <div class="cart-item-details">
                            <h4 class="cart-item-title">${item.name}</h4>
                            <div class="cart-item-price">$${item.price.toFixed(2)}</div>
                            <div class="cart-item-actions">
                                <button class="quantity-btn" data-product-id="${item.id}" data-action="decrease">-</button>
                                <input type="number" class="quantity-input" value="${item.quantity}" min="1" data-product-id="${item.id}">
                                <button class="quantity-btn" data-product-id="${item.id}" data-action="increase">+</button>
                                <button class="remove-btn" data-product-id="${item.id}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                cartItems.append(cartItemHtml);
            });
            
            // Calculate totals
            const shipping = subtotal > 0 ? Math.min(20, subtotal * 0.05) : 0;
            const tax = subtotal * 0.08;
            const total = subtotal + shipping + tax;
            
            // Update totals
            cartSubtotal.text(subtotal.toFixed(2));
            cartShipping.text(shipping.toFixed(2));
            cartTax.text(tax.toFixed(2));
            cartTotal.text(total.toFixed(2));
        }
        
        // Update cart count
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        if (totalItems > 0) {
            cartCount.text(totalItems).show();
        } else {
            cartCount.hide();
        }
    }

    // Toggle cart sidebar
    function toggleCart() {
        cartOpen = !cartOpen;
        cartSidebar.toggleClass('open', cartOpen);
        overlay.toggleClass('active', cartOpen);
        $('body').css('overflow', cartOpen ? 'hidden' : 'auto');
    }

    // Show toast notification
    function showToast(message, isError = false) {
        toastMessage.text(message);
        toast.addClass('show');
        if (isError) toast.addClass('error');
        
        setTimeout(() => {
            toast.removeClass('show error');
        }, 3000);
    }

    // Setup event listeners
    function setupEventListeners() {
        // Cart icon click
        cartIcon.on('click', function(e) {
            e.preventDefault();
            toggleCart();
        });
        
        // Close cart
        closeCart.on('click', function() {
            cartOpen = false;
            cartSidebar.removeClass('open');
            overlay.removeClass('active');
            $('body').css('overflow', 'auto');
        });
        
        overlay.on('click', function() {
            cartOpen = false;
            cartSidebar.removeClass('open');
            overlay.removeClass('active');
            $('body').css('overflow', 'auto');
        });

        // Add to cart buttons
        $(document).on('click', '.add-to-cart', function(e) {
            e.preventDefault();
            const productId = $(this).data('product-id');
            
            if (typeof fabify_ajax !== 'undefined') {
                // Use AJAX to add to cart
                $.ajax({
                    url: fabify_ajax.ajax_url,
                    type: 'POST',
                    data: {
                        action: 'fabify_add_to_cart',
                        product_id: productId,
                        nonce: fabify_ajax.nonce
                    },
                    success: function(response) {
                        if (response.success) {
                            showToast(response.data.message);
                        } else {
                            showToast(response.data.message, true);
                        }
                    },
                    error: function() {
                        showToast('Error adding product to cart', true);
                    }
                });
            }
        });

        // Quantity buttons
        $(document).on('click', '.quantity-btn', function() {
            const productId = $(this).data('product-id');
            const action = $(this).data('action');
            const input = $(`.quantity-input[data-product-id="${productId}"]`);
            let quantity = parseInt(input.val());

            if (action === 'increase') {
                quantity++;
            } else if (action === 'decrease' && quantity > 1) {
                quantity--;
            }

            input.val(quantity);
            updateQuantity(productId, quantity);
        });

        // Quantity input change
        $(document).on('change', '.quantity-input', function() {
            const productId = $(this).data('product-id');
            const quantity = parseInt($(this).val());
            updateQuantity(productId, quantity);
        });

        // Remove button
        $(document).on('click', '.remove-btn', function() {
            const productId = $(this).data('product-id');
            removeFromCart(productId);
        });
    }

    // Update quantity in cart
    function updateQuantity(productId, newQuantity) {
        if (newQuantity <= 0) {
            removeFromCart(productId);
            return;
        }
        
        const item = cart.find(item => item.id === productId);
        if (item) {
            item.quantity = newQuantity;
            updateCartUI();
        }
    }

    // Remove from cart
    function removeFromCart(productId) {
        cart = cart.filter(item => item.id !== productId);
        updateCartUI();
    }

    // Initialize
    initCarousel();
    updateCartUI();
    setupEventListeners();
});
