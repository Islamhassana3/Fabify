    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <div class="footer-column">
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (is_active_sidebar('footer-2')) : ?>
                    <div class="footer-column">
                        <?php dynamic_sidebar('footer-2'); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (is_active_sidebar('footer-3')) : ?>
                    <div class="footer-column">
                        <?php dynamic_sidebar('footer-3'); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (is_active_sidebar('footer-4')) : ?>
                    <div class="footer-column">
                        <?php dynamic_sidebar('footer-4'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All rights reserved.', 'fabify-shop'); ?></p>
            </div>
        </div>
    </footer>

    <!-- Cart Sidebar -->
    <div class="cart-sidebar" id="cartSidebar">
        <div class="cart-header">
            <h3><?php _e('Your Shopping Cart', 'fabify-shop'); ?></h3>
            <button class="close-cart" id="closeCart">&times;</button>
        </div>
        <div class="cart-items" id="cartItems">
            <p id="emptyCartMessage" style="text-align: center; color: var(--gray-500); padding: 2rem;"><?php _e('Your cart is empty', 'fabify-shop'); ?></p>
        </div>
        <div class="cart-total">
            <div class="total-row">
                <span class="total-label"><?php _e('Subtotal:', 'fabify-shop'); ?></span>
                <span class="total-value">$<span id="cartSubtotal">0.00</span></span>
            </div>
            <div class="total-row">
                <span class="total-label"><?php _e('Shipping:', 'fabify-shop'); ?></span>
                <span class="total-value">$<span id="cartShipping">0.00</span></span>
            </div>
            <div class="total-row">
                <span class="total-label"><?php _e('Tax:', 'fabify-shop'); ?></span>
                <span class="total-value">$<span id="cartTax">0.00</span></span>
            </div>
            <div class="total-row" style="font-size: 1.1rem; border-top: 1px solid var(--gray-300); padding-top: 0.5rem; margin-top: 0.5rem;">
                <span class="total-label"><?php _e('Total:', 'fabify-shop'); ?></span>
                <span class="total-value">$<span id="cartTotal">0.00</span></span>
            </div>
            <button class="checkout-btn"><?php _e('Proceed to Checkout', 'fabify-shop'); ?></button>
        </div>
    </div>

    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- Toast Notification -->
    <div class="toast" id="toast">
        <i class="fas fa-check-circle toast-icon"></i>
        <span id="toastMessage"><?php _e('Item added to cart!', 'fabify-shop'); ?></span>
    </div>

    <?php wp_footer(); ?>
</body>
</html>