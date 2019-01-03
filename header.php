<header id="header">
    <?php
        if( the_custom_logo() ) {
            the_custom_logo();
        }
        else {
            echo '<a href="/" id="site-title" class="custom-logo-link">' . get_bloginfo( 'name' ) . '</a>';
        }

        ThemeMenus::main_menu();

        ThemeMenus::call_now_button();
    ?>
</header>
