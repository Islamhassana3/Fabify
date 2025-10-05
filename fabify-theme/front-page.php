<?php get_header(); ?>

<!-- Hero Carousel -->
<section class="hero">
    <div class="hero-slide active" style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('<?php echo get_template_directory_uri(); ?>/assets/images/hero1.jpg');">
        <div class="hero-content">
            <h1><?php _e('Summer Sale Up To 70% Off', 'fabify-shop'); ?></h1>
            <p><?php _e('Discover amazing deals on electronics, fashion, and home essentials', 'fabify-shop'); ?></p>
            <a href="#" class="btn btn-primary"><?php _e('Shop Now', 'fabify-shop'); ?></a>
            <a href="#" class="btn btn-outline"><?php _e('See All Deals', 'fabify-shop'); ?></a>
        </div>
    </div>
    <div class="hero-slide" style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('<?php echo get_template_directory_uri(); ?>/assets/images/hero2.jpg');">
        <div class="hero-content">
            <h1><?php _e('New Arrivals Just For You', 'fabify-shop'); ?></h1>
            <p><?php _e('Be the first to shop our latest collection of premium products', 'fabify-shop'); ?></p>
            <a href="#" class="btn btn-primary"><?php _e('Explore New', 'fabify-shop'); ?></a>
            <a href="#" class="btn btn-outline"><?php _e('View Collection', 'fabify-shop'); ?></a>
        </div>
    </div>
    <div class="hero-slide" style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('<?php echo get_template_directory_uri(); ?>/assets/images/hero3.jpg');">
        <div class="hero-content">
            <h1><?php _e('Free Shipping On Orders Over $35', 'fabify-shop'); ?></h1>
            <p><?php _e('Fast delivery to your doorstep with no extra cost', 'fabify-shop'); ?></p>
            <a href="#" class="btn btn-primary"><?php _e('Start Shopping', 'fabify-shop'); ?></a>
            <a href="#" class="btn btn-outline"><?php _e('Learn More', 'fabify-shop'); ?></a>
        </div>
    </div>
    <div class="carousel-indicators">
        <div class="indicator active" data-slide="0"></div>
        <div class="indicator" data-slide="1"></div>
        <div class="indicator" data-slide="2"></div>
    </div>
</section>

<!-- Categories Bar -->
<section class="categories-bar">
    <div class="container">
        <div class="categories-grid">
            <div class="category-item">
                <div class="category-icon">
                    <i class="fas fa-laptop"></i>
                </div>
                <h4><?php _e('Electronics', 'fabify-shop'); ?></h4>
            </div>
            <div class="category-item">
                <div class="category-icon">
                    <i class="fas fa-tshirt"></i>
                </div>
                <h4><?php _e('Fashion', 'fabify-shop'); ?></h4>
            </div>
            <div class="category-item">
                <div class="category-icon">
                    <i class="fas fa-home"></i>
                </div>
                <h4><?php _e('Home', 'fabify-shop'); ?></h4>
            </div>
            <div class="category-item">
                <div class="category-icon">
                    <i class="fas fa-heartbeat"></i>
                </div>
                <h4><?php _e('Beauty', 'fabify-shop'); ?></h4>
            </div>
            <div class="category-item">
                <div class="category-icon">
                    <i class="fas fa-gamepad"></i>
                </div>
                <h4><?php _e('Toys', 'fabify-shop'); ?></h4>
            </div>
            <div class="category-item">
                <div class="category-icon">
                    <i class="fas fa-car"></i>
                </div>
                <h4><?php _e('Auto', 'fabify-shop'); ?></h4>
            </div>
            <div class="category-item">
                <div class="category-icon">
                    <i class="fas fa-dumbbell"></i>
                </div>
                <h4><?php _e('Sports', 'fabify-shop'); ?></h4>
            </div>
            <div class="category-item">
                <div class="category-icon">
                    <i class="fas fa-book"></i>
                </div>
                <h4><?php _e('Books', 'fabify-shop'); ?></h4>
            </div>
        </div>
    </div>
</section>

<!-- Deals Banner -->
<section class="deals-banner">
    <div class="container">
        <p><i class="fas fa-bolt"></i> <?php _e('FLASH SALE: Extra 20% off sitewide - Limited time only!', 'fabify-shop'); ?> <a href="#"><?php _e('Shop Now', 'fabify-shop'); ?></a></p>
    </div>
</section>

<!-- Featured Products -->
<section class="featured-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php _e("Today's Top Picks", 'fabify-shop'); ?></h2>
            <a href="#" class="view-all"><?php _e('View All', 'fabify-shop'); ?> <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="products-grid" id="featuredProducts">
            <?php
            $featured_products = new WP_Query(array(
                'post_type' => 'product',
                'posts_per_page' => 8,
                'meta_query' => array(
                    array(
                        'key' => '_featured',
                        'value' => 'yes'
                    )
                )
            ));
            
            if ($featured_products->have_posts()) :
                while ($featured_products->have_posts()) : $featured_products->the_post();
                    ?>
                    <div class="product-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="product-image-container">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', array('class' => 'product-image')); ?>
                                </a>
                                <?php if (get_post_meta(get_the_ID(), '_sale_price', true)) : ?>
                                    <div class="product-badge"><?php _e('Sale', 'fabify-shop'); ?></div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="product-info">
                            <h3 class="product-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            
                            <div class="product-price">
                                <?php echo get_post_meta(get_the_ID(), '_price', true); ?>
                                <?php if (get_post_meta(get_the_ID(), '_regular_price', true) && get_post_meta(get_the_ID(), '_sale_price', true)) : ?>
                                    <span class="product-original-price"><?php echo get_post_meta(get_the_ID(), '_regular_price', true); ?></span>
                                    <span class="product-discount"><?php echo round((get_post_meta(get_the_ID(), '_regular_price', true) - get_post_meta(get_the_ID(), '_price', true)) / get_post_meta(get_the_ID(), '_regular_price', true) * 100); ?>% off</span>
                                <?php endif; ?>
                            </div>
                            
                            <div class="product-rating">
                                <div class="stars">
                                    <?php
                                    $rating = get_post_meta(get_the_ID(), '_average_rating', true);
                                    $full_stars = floor($rating);
                                    $half_star = ($rating - $full_stars) >= 0.5;
                                    $empty_stars = 5 - ceil($rating);
                                    
                                    for ($i = 0; $i < $full_stars; $i++) {
                                        echo '<i class="fas fa-star"></i>';
                                    }
                                    if ($half_star) {
                                        echo '<i class="fas fa-star-half-alt"></i>';
                                    }
                                    for ($i = 0; $i < $empty_stars; $i++) {
                                        echo '<i class="far fa-star"></i>';
                                    }
                                    ?>
                                </div>
                                <span class="rating-count">(<?php echo get_post_meta(get_the_ID(), '_review_count', true); ?>)</span>
                            </div>
                            
                            <?php
                            global $product;
                            if ($product && $product->is_purchasable() && $product->is_in_stock()) {
                                woocommerce_template_loop_add_to_cart();
                            }
                            ?>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Services Bar -->
<section class="services-bar">
    <div class="container">
        <div class="services-grid">
            <div class="service-item">
                <div class="service-icon">
                    <i class="fas fa-truck"></i>
                </div>
                <div class="service-content">
                    <h4><?php _e('Free Shipping', 'fabify-shop'); ?></h4>
                    <p><?php _e('On orders over $35', 'fabify-shop'); ?></p>
                </div>
            </div>
            <div class="service-item">
                <div class="service-icon">
                    <i class="fas fa-undo"></i>
                </div>
                <div class="service-content">
                    <h4><?php _e('Easy Returns', 'fabify-shop'); ?></h4>
                    <p><?php _e('30-day return policy', 'fabify-shop'); ?></p>
                </div>
            </div>
            <div class="service-item">
                <div class="service-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div class="service-content">
                    <h4><?php _e('Secure Payment', 'fabify-shop'); ?></h4>
                    <p><?php _e('100% secure payment', 'fabify-shop'); ?></p>
                </div>
            </div>
            <div class="service-item">
                <div class="service-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <div class="service-content">
                    <h4><?php _e('24/7 Support', 'fabify-shop'); ?></h4>
                    <p><?php _e('Dedicated customer care', 'fabify-shop'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize carousel
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
});
</script>

<?php get_footer(); ?>