<!doctype html>
    <head>
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- wordpress head functions -->
        <link href="https://fonts.googleapis.com/css?family=Oswald:500,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
        <?php wp_head(); ?>

        <script>
            <?php
                include 'assets/js/loadCSS.js';
                include 'assets/js/cssrelpreload.js';
            ?>
        </script>
    </head>
    <body <?php body_class(); ?>>
        <?php
            global $post;
            $slug = $post ? $post->post_name : '';
            get_header();
            echo '<main id="main" class="'.$slug.'">';
                    include my_template_path();
            echo '</main>';
            get_footer();
            wp_footer();
        ?>
    </body>
</html>
