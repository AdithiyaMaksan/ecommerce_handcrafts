<footer>
    <div class="footer-inner">
        <p>&copy; <?php echo date('Y'); ?> Handicraft Store. All rights reserved.</p>
        <nav class="footer-nav">
            <?php
            // Optional: Add a footer menu if registered in functions.php
            if (has_nav_menu('footer')) {
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_class' => 'footer-menu',
                    'container' => false,
                    'fallback_cb' => false
                ));
            }
            ?>
        </nav>
        <div class="footer-contact">
            <p>
                <strong>Contact us:</strong> 
                <a href="mailto:info@handicraftstore.com">info@handicraftstore.com</a> | 
                <a href="tel:+911234567890">+91 12345 67890</a>
            </p>
            <p>
                <a href="<?php echo esc_url( home_url('/privacy-policy') ); ?>">Privacy Policy</a> | 
                <a href="<?php echo esc_url( home_url('/terms') ); ?>">Terms &amp; Conditions</a>
            </p>
        </div>
        <div class="footer-social">
            <a href="#" aria-label="Facebook" rel="noopener"><span>🔗</span> Facebook</a> |
            <a href="#" aria-label="Instagram" rel="noopener"><span>🔗</span> Instagram</a> |
            <a href="#" aria-label="Twitter" rel="noopener"><span>🔗</span> Twitter</a>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
