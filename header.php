<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
    <div class="header-inner">
        <h1>
            <a href="<?php echo esc_url(home_url('/')); ?>">Handicraft Store</a>
        </h1>
        <div class="header-actions">
            <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="cart-link">
                🛒 Cart
                <?php if (function_exists('WC')) : ?>
                    <span class="cart-badge"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                <?php endif; ?>
            </a>
            <?php get_search_form(); ?>
        </div>
    </div>
</header>
<nav>
    <?php
    // Register menu if not already in functions.php
    if (function_exists('register_nav_menus')) {
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'handicrafts-theme')
        ));
    }
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'menu_class' => 'nav-menu',
        'container' => false,
        'fallback_cb' => false
    ));
    ?>
</nav>