<?php use MySiteDigital\Assets\SVG; ?>

<footer id="site-footer" class="clearfix">
    <?php
        if ( is_active_sidebar( 'footer-content' ) ) {
            echo '<ul id="footer-content" class="widget-area">';
                dynamic_sidebar( 'footer-content' );
            echo '</ul>';
        }
    ?>
    <a href="/" id="copyright">
        <?php SVG::icon( 'copyright' ); ?> 
        <span>
            <?php echo date('Y') . ' ' . get_bloginfo('name'); ?>
        </span>
    </a>
</footer>
