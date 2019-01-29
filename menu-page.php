<?php
/**
 * Template Name: Menu Page
 */
 ?>

 <div class="container menu-container">
     <?php
         if ( have_posts() ) {

             while ( have_posts() ) {
                  the_post();

                  get_template_part( 'template-parts/content/content', 'page' );
             }
         }
     ?>
 </div>
