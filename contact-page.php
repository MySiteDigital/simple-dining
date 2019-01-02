<?php
/**
 * Template Name: Contact Page
 */
 ?>

 <div class="container">
     <?php
         if ( have_posts() ) {

             while ( have_posts() ) {
                  the_post();

                  get_template_part( 'template-parts/content/content', 'page' );
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
