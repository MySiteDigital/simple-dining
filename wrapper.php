<?php use MySiteDigital\SimpleDining\Theme\Wrapper; ?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
    	<meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- wordpress head functions -->
        <link href="https://fonts.googleapis.com/css?family=Oswald:500,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <a class="skip-link screen-reader-text screen-reader-focusable" href="#main">Skip to the content</a>
        <?php
            global $post;
            $slug = $post ? $post->post_name : '';
            get_header();
            echo '<main id="main" class="'.$slug.'">';
                include Wrapper::$main_template;
            echo '</main>';
            get_footer();
            wp_footer();
        ?>
    </body>
</html>
