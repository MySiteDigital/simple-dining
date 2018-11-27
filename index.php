<div class="container">
    <?php
        if ( have_posts() ) {

            while ( have_posts() ) {
                 the_post();
                 //replace this
                // echo '<h1>'.get_the_title().'</h1>';
                // echo '<div id="content">';
                // the_content();
                // echo '</div>';
                // with something like the following:
                //get_template_part( 'template-parts/content/content' );
            }
            //// Previous/next page navigation. - I guess this will probably be needed too
            //twentynineteen_the_posts_navigation();
        }
        else {
			// If no content, include the "No posts found" template.
            //get_template_part( 'template-parts/content/content', 'none' );
		}
    ?>
</div>
