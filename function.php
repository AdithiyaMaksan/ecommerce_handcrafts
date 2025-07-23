<?php
// Enable WooCommerce support
function handicrafts_theme_setup() {
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'handicrafts_theme_setup');

// Enqueue scripts
function handicrafts_theme_scripts() {
    wp_enqueue_script(
        'product-filter',
        get_template_directory_uri() . '/js/product-filter.js',
        array('jquery'),
        null,
        true
    );
    wp_localize_script('product-filter', 'custom_ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'handicrafts_theme_scripts');

// AJAX handler
add_action('wp_ajax_filter_products_by_price', 'filter_products_by_price');
add_action('wp_ajax_nopriv_filter_products_by_price', 'filter_products_by_price');

function filter_products_by_price() {
    $price = isset($_POST['price']) ? floatval($_POST['price']) : 0;
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => '_price',
                'value' => $price,
                'compare' => '<=',
                'type' => 'NUMERIC'
            )
        )
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            wc_get_template_part('content', 'product');
        }
    } else {
        echo '<p>No products found under this price.</p>';
    }
    wp_die();
}
?>
