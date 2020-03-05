<?php

while ( have_posts() ) :
    the_post();
    ?>				
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Menu">
       
        <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header>

        <?php the_content(); ?>

    </article>
    <?php 
endwhile; 