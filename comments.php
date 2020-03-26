<?php

if ( post_password_required() ) {
	return;
}

if ( $comments ) {
	?>

	<div class="comments" id="comments">

		<?php
		$comments_number = absint( get_comments_number() );
		?>

		<div class="comments-header section-inner small max-percentage">

			<h2 class="comment-reply-title">
			<?php
			if ( ! have_comments() ) {
				_e( 'Leave a comment', 'simple-dining' );
			} elseif ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( 'One reply on &ldquo;%s&rdquo;', 'comments title', 'simple-dining' ), esc_html( get_the_title() ) );
			} else {
				echo sprintf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s reply on &ldquo;%2$s&rdquo;',
						'%1$s replies on &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'simple-dining'
					),
					number_format_i18n( $comments_number ),
					esc_html( get_the_title() )
				);
			}

			?>
			</h2><!-- .comments-title -->

		</div><!-- .comments-header -->

		<ul class="comments-inner section-inner thin max-percentage">

            <?php
            
			wp_list_comments();

			$comment_pagination = paginate_comments_links(
				array(
					'echo'      => false,
					'end_size'  => 0,
					'mid_size'  => 0,
					'next_text' => __( 'Newer Comments', 'simple-dining' ) . ' <span aria-hidden="true">&rarr;</span>',
					'prev_text' => '<span aria-hidden="true">&larr;</span> ' . __( 'Older Comments', 'simple-dining' ),
				)
			);

			if ( $comment_pagination ) {
				$pagination_classes = '';

				// If we're only showing the "Next" link, add a class indicating so.
				if ( false === strpos( $comment_pagination, 'prev page-numbers' ) ) {
					$pagination_classes = ' only-next';
				}
				?>

				<nav class="comments-pagination pagination<?php echo $pagination_classes;  ?>" aria-label="<?php esc_attr_e( 'Comments', 'simple-dining' ); ?>">
					<?php echo wp_kses_post( $comment_pagination ); ?>
				</nav>

				<?php
			}
			?>

		</ul><!-- .comments-inner -->

	</div><!-- comments -->

	<?php
}

if ( comments_open() || pings_open() ) {
    comment_form();
} 
elseif ( is_single() ) {
	?>
        <div class="comment-respond" id="respond">

            <p class="comments-closed"><?php _e( 'Comments are closed.', 'simple-dining' ); ?></p>

        </div><!-- #respond -->
	<?php
}
