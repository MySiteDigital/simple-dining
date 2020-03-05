<?php use MySiteDigital\Assets\SVG; ?>

<a href="tel:<?php echo $tel_link; ?>" class="button call-now-button full-size">
    <?php 
        SVG::icon( 'phone', 'phone-icon' ); 
        echo $button_text; 
    ?>
</a>