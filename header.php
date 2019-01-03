<header id="header">
    <?php
        if( the_custom_logo() ) {
            the_custom_logo();
        }
        else {
            echo '<a href="/" class="site-title custom-logo-link">' . get_bloginfo( 'name' ) . '</a>';
        }

        ThemeMenus::main_menu();

        get_template_part( 'template-parts/header/open-icon' );

        ThemeMenus::call_now_button();
    ?>
</header>

<header id="hidden-menu">
    <?php
        if( the_custom_logo() ) {
            the_custom_logo();
        }
        else {
            echo '<a href="/" class="site-title custom-logo-link">' . get_bloginfo( 'name' ) . '</a>';
        }

        get_template_part( 'template-parts/header/close-icon' );

        ThemeMenus::main_menu( 'mobile-nav' );
    ?>
</header>
