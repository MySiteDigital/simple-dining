<footer id="site-footer" class="clearfix">
    <?php
        if ( is_active_sidebar( 'footer-content' ) ) {
            echo '<ul id="footer-content" class="widget-area">';
                dynamic_sidebar( 'footer-content' );
            echo '</ul>';
        }
    ?>
    <a href="/" id="copyright">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24">
            <use xlink:href="<?php icons(); ?>#copyright"/>
        </svg>
        <span>
            <?php echo date('Y') . ' ' . get_bloginfo('name'); ?>
        </span>
    </a>
</footer>
