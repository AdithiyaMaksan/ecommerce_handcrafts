<?php get_header(); ?>

<h1>Our Handicraft Products</h1>
<label for="price-range">Filter by Price:</label>
<select id="price-range">
    <option value="500">Under ₹500</option>
    <option value="1000">Under ₹1000</option>
    <option value="2000">Under ₹2000</option>
</select>

<div id="product-list">
    <?php
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1
    );
    $products = new WP_Query($args);
    if ($products->have_posts()) :
        while ($products->have_posts()) : $products->the_post();
            wc_get_template_part('content', 'product');
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No products found.</p>';
    endif;
    ?>
</div>

<?php get_footer(); ?>
