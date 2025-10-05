<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <section class="featured-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php _e('Latest Products', 'fabify-shop'); ?></h2>
            </div>
            <div class="products-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="product-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="product-image-container">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', array('class' => 'product-image')); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="product-info">
                            <h3 class="product-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            
                            <div class="product-price">
                                <?php echo get_post_meta(get_the_ID(), '_price', true); ?>
                            </div>
                            
                            <div class="product-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <button class="add-to-cart" data-product-id="<?php the_ID(); ?>">
                                <i class="fas fa-shopping-cart"></i> <?php _e('Add to Cart', 'fabify-shop'); ?>
                            </button>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php else : ?>
    <section class="featured-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php _e('No Products Found', 'fabify-shop'); ?></h2>
            </div>
            <p><?php _e('Sorry, no products matched your criteria.', 'fabify-shop'); ?></p>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>