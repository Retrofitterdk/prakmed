<?php
if ( has_post_thumbnail() ) :
	if ( is_singular() ) :
		?>
		<div class="entry-media singuler">
			<?php
			the_post_thumbnail();
			else :
				?>
				<div class="entry-media">
					<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
						<?php
						the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) );
					endif;
					?>
				</div>
				<?php
			endif;
