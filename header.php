<header id="header">
    <?php
        the_custom_logo();

        $main_menu = wp_nav_menu(
            [
                'menu' => 'main-menu',
                'container' => 'nav',
                'container_id' => 'main-nav',
                'echo' => false
            ]
        );

        if( $main_menu ){
            echo $main_menu;
            get_template_part( 'template-parts/header/mobile-icons' );
        }
    ?>
</header>
