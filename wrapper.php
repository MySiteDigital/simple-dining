<?php use MySiteDigital\SimpleDining\Theme\Wrapper; ?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <?php
            $title = wp_title( '|' , false, 'right' ) . get_bloginfo( 'name' );
            if( is_front_page() ){
                if( is_home() ){
                    $title .= ' - Latest Posts';
                }
                else {
                    $title .= ' - ' . get_bloginfo( 'description' );
                }
            }
            echo '<title>' . $title . '</title>';
        ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
    	<meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- wordpress head functions -->
        <link href="https://fonts.googleapis.com/css?family=Oswald:500,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <?php
            global $post;
            $slug = $post ? $post->post_name : '';
            //get_header();
            echo '<main id="main" class="'.$slug.'">';
                include Wrapper::$main_template;
            echo '</main>';
            get_footer();
            wp_footer();
        ?>
    </body>
</html>
