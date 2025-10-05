<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search millions of products...', 'placeholder', 'fabify-shop'); ?>" value="<?php echo get_search_query(); ?>" name="s" id="searchInput" />
</form>
