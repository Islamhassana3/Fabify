<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section class="featured-section">
        <div class="container">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="section-title" style="margin-bottom: 2rem;"><?php the_title(); ?></h1>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div style="margin-bottom: 2rem;">
                        <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: auto; border-radius: var(--border-radius-lg);')); ?>
                    </div>
                <?php endif; ?>
                
                <div class="entry-content" style="line-height: 1.8; font-size: 1.1rem;">
                    <?php the_content(); ?>
                </div>
            </article>
        </div>
    </section>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
