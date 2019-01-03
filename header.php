<header id="header">
    <?php
        if( the_custom_logo() ) {
            the_custom_logo();
        }
        else {
            echo '<a href="/" id="site-title" class="custom-logo-link">' . get_bloginfo( 'name' ) . '</a>';
        }

        $main_menu = wp_nav_menu(
            [
                'theme_location' => 'main-menu',
                'container' => 'nav',
                'container_id' => 'main-nav',
                'echo' => false
            ]
        );

        if( $main_menu ){
            echo $main_menu;
            get_template_part( 'template-parts/header/mobile-icons' );
        }

        $call_now = wp_nav_menu(
            [
                'theme_location' => 'call-now-link',
                'container' => '',
                'depth' => 1 ,
                'echo' => false,
                'fallback_cb' => false,
                'walker' => new Call_Now_Menu_Walker()
            ]
        );

        if( $call_now ){
            echo preg_replace(
                [
                    '#^<ul[^>]*>#',
                    '#</ul>$#'
                ],
                '',
                $call_now
            );
        }
    ?>
</header>
