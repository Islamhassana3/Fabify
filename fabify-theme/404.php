<?php get_header(); ?>

<section class="featured-section" style="min-height: 60vh;">
    <div class="container">
        <div style="text-align: center; padding: 4rem 0;">
            <h1 style="font-size: 6rem; color: var(--gray-300); margin-bottom: 1rem;">404</h1>
            <h2 style="font-size: 2rem; margin-bottom: 1rem;"><?php _e('Page Not Found', 'fabify-shop'); ?></h2>
            <p style="font-size: 1.2rem; color: var(--gray-600); margin-bottom: 2rem;">
                <?php _e('Sorry, the page you are looking for could not be found.', 'fabify-shop'); ?>
            </p>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                <?php _e('Back to Home', 'fabify-shop'); ?>
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
