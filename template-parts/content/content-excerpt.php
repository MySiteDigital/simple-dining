<?php use MySiteDigital\Assets\SVG; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <h2 class="entry-title">
            <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h2>
	</header>

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div>

    <footer class="entry-footer">

        <span class="byline">

            <?php SVG::icon( 'person' ); ?>

            <span class="author vcard">
                <a class="url" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                    <?php echo esc_html( get_the_author() ); ?>
                </a>
            </span>

        </span>

        <span class="posted-on">

            <?php SVG::icon( 'calendar' ); ?>

            <time class="entry-date published updated" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
                <?php echo esc_html( get_the_date() ); ?>
            </time>

        </span>

        <?php
            if( current_user_can( 'edit_posts' ) ) {
                ?>
                <span class="edit-link">

                    <?php SVG::icon( 'edit' ); ?>

                    <a href="<?php echo get_edit_post_link( get_the_ID() ); ?>" target="_blank">
                        Edit Post
                    </a>
                </span>
                <?php
            }
        ?>

	</footer>

</article>
