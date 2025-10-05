<?php
/**
 * Fabify Shop Theme Functions
 */

// Theme setup
function fabify_shop_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_theme_support('responsive-embeds');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'fabify-shop'),
        'footer' => __('Footer Menu', 'fabify-shop'),
    ));
    
    // Set content width
    if (!isset($content_width)) {
        $content_width = 1140;
    }
}
add_action('after_setup_theme', 'fabify_shop_setup');

// Enqueue scripts and styles
function fabify_shop_scripts() {
    // Enqueue styles
    wp_enqueue_style('fabify-shop-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style('fabify-shop-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap', array(), '1.0.0');
    wp_enqueue_style('fabify-shop-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    
    // Enqueue scripts
    wp_enqueue_script('fabify-shop-custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'fabify_shop_scripts');

// Register widget areas
function fabify_shop_widgets_init() {
    register_sidebar(array(
        'name'          => __('Main Sidebar', 'fabify-shop'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'fabify-shop'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 1', 'fabify-shop'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in footer area 1.', 'fabify-shop'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 2', 'fabify-shop'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in footer area 2.', 'fabify-shop'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 3', 'fabify-shop'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in footer area 3.', 'fabify-shop'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 4', 'fabify-shop'),
        'id'            => 'footer-4',
        'description'   => __('Add widgets here to appear in footer area 4.', 'fabify-shop'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'fabify_shop_widgets_init');

// Custom excerpt length
function fabify_shop_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'fabify_shop_excerpt_length');

// Custom excerpt more
function fabify_shop_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'fabify_shop_excerpt_more');

// WooCommerce support
if (class_exists('WooCommerce')) {
    function fabify_shop_woocommerce_setup() {
        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
    }
    add_action('after_setup_theme', 'fabify_shop_woocommerce_setup');
}

// Customizer additions
function fabify_shop_customize_register($wp_customize) {
    // Add section for theme options
    $wp_customize->add_section('fabify_shop_options', array(
        'title'    => __('Fabify Shop Options', 'fabify-shop'),
        'priority' => 30,
    ));
    
    // Add setting for primary color
    $wp_customize->add_setting('fabify_shop_primary_color', array(
        'default'           => '#4a6cf7',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    // Add control for primary color
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'fabify_shop_primary_color', array(
        'label'    => __('Primary Color', 'fabify-shop'),
        'section'  => 'fabify_shop_options',
        'settings' => 'fabify_shop_primary_color',
    )));
}
add_action('customize_register', 'fabify_shop_customize_register');

// Update cart fragments for AJAX cart updates
if (class_exists('WooCommerce')) {
    function fabify_shop_cart_fragments($fragments) {
        ob_start();
        $cart_count = WC()->cart->get_cart_contents_count();
        if ($cart_count > 0) {
            echo '<span class="cart-count">' . esc_html($cart_count) . '</span>';
        }
        $fragments['.cart-count'] = ob_get_clean();
        return $fragments;
    }
    add_filter('woocommerce_add_to_cart_fragments', 'fabify_shop_cart_fragments');
}
?>