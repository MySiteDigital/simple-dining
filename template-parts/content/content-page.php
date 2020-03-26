<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
	</header>

	<div class="entry-content">
		<?php
			the_content();
		?>
	</div>

	<?php 
		if(has_tag()){
			echo '<div class="entry-footer">';
					the_tags();
			echo '</div>';
		}
	?>
</article>

<?php get_template_part( 'template-parts/navigation/link-pages' ); ?>
