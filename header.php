<?php use MySiteDigital\SimpleDining\Theme\Menus; ?>

<header id="site-header">
    <?php
        if( get_custom_logo() ) {
            the_custom_logo();
        }
        else {
            echo '<a href="/" class="site-title custom-logo-link">' . get_bloginfo( 'name' ) . '</a>';
        }

        Menus::main_menu();

        get_template_part( 'template-parts/header/open-icon' );

        //Menus::call_now_button();
    ?>
</header>

<header id="hidden-menu">
    <?php
        if( get_custom_logo() ) {
            the_custom_logo();
        }
        else {
            echo '<a href="/" class="site-title custom-logo-link">' . get_bloginfo( 'name' ) . '</a>';
        }

        get_template_part( 'template-parts/header/close-icon' );

        Menus::main_menu( 'mobile-nav' );
    ?>
</header>
