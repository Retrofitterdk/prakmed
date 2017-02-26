<?php
if ( is_singular() ) :
	?>
	<header class="entry-header singular">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>
<?php	else : ?>
	<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
		<header class="entry-header">
			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
		</header>
	</a>
<?php endif; ?>
<div class="entry-meta">
	<?php
	prakmed_entry_meta();
	prakmed_posted_by();
	prakmed_last_edit()
	?>
</div>
