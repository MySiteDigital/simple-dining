<div class="container">
    <?php
        if ( have_posts() ) {

            while ( have_posts() ) {
                the_post();
                get_template_part( 'template-parts/content/content', 'excerpt' );
            }
            get_template_part( 'template-parts/navigation/pagination' );
        }
    ?>
</div>
