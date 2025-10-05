<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <!-- Header -->
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                    <i class="fas fa-crown"></i>
                    <?php bloginfo('name'); ?>
                </a>
                
                <div class="search-container">
                    <div class="search-bar">
                        <i class="fas fa-search" style="margin: 0 1rem; color: var(--gray-500);"></i>
                        <?php get_search_form(); ?>
                        <button class="search-btn"><?php _e('Search', 'fabify-shop'); ?></button>
                    </div>
                </div>
                
                <div class="nav-links">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-link active">
                        <i class="fas fa-home nav-icon"></i>
                        <?php _e('Home', 'fabify-shop'); ?>
                    </a>
                    <a href="#" class="nav-link">
                        <i class="fas fa-percent nav-icon"></i>
                        <?php _e('Deals', 'fabify-shop'); ?>
                    </a>
                    <a href="#" class="nav-link" id="cartIcon">
                        <i class="fas fa-shopping-cart nav-icon"></i>
                        <span class="cart-count">0</span>
                    </a>
                    <a href="#" class="nav-link">
                        <i class="fas fa-user nav-icon"></i>
                        <?php _e('Account', 'fabify-shop'); ?>
                    </a>
                </div>
            </nav>
        </div>
    </header>