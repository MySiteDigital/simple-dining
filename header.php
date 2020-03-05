<?php use MySiteDigital\SimpleDining\Theme\Navigation; ?>

<header id="site-header" class="hidden-menu">
    <?php
        if( get_custom_logo() ) {
            the_custom_logo();
        }
        else {
            echo '<a href="/" class="site-title custom-logo-link">' . get_bloginfo( 'name' ) . '</a>';
        }

        Navigation::main_nav_menu();

        get_template_part( 'template-parts/header/open-button' );

        Navigation::call_now_button();
    ?>
</header>

<header id="hidden-menu" class="hidden-menu">
    <?php
        if( get_custom_logo() ) {
            the_custom_logo();
        }
        else {
            echo '<a href="/" class="site-title custom-logo-link">' . get_bloginfo( 'name' ) . '</a>';
        }

        get_template_part( 'template-parts/header/close-button' );

        Navigation::main_nav_menu( 'mobile-nav' );
    ?>
</header>
