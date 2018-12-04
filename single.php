<div class="container">
	<?php
        while ( have_posts() ) {
             the_post();

			 get_template_part( 'template-parts/content/content', 'page' );

        }
    ?>
</div>
