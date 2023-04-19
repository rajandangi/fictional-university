<?php
get_header(); //get header.php
while ( have_posts() ) : //loop through posts
	the_post(); //get post data
	pageBanner();
	?>
	<div class="container container--narrow page-section">
		<div class="metabox metabox--position-up metabox--with-home-link">
			<p>
				<a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link( 'event' ); ?>"><i
						class="fa fa-home" aria-hidden="true"></i> Events Home</a> <span
					class="metabox__main"><?php the_title(); ?></span>
			</p>
		</div>
		<div class="generic-content">
			<?php the_content(); ?>
		</div>
		
		<?php
		// Get the related programs from ACF
		$relatedPrograms = get_field( 'related_programs' );
		// Check if related programs exist
		if ( $relatedPrograms ) {
			echo '<hr class="section-break">';
			echo '<h2 class="headline headline--medium">Related Program(s)</h2>';
			echo '<ul class="link-list min-list">';
			// Loop through related programs
			foreach ( $relatedPrograms as $program ) {
				?>
				<!-- Output related program -->
				<li><a href="<?php echo get_the_permalink( $program ); ?>"> <?php echo get_the_title( $program ); ?></a>
				</li>
			<?php }
			echo '</ul>';
		} ?>
	</div>
<?php
endwhile;
get_footer(); //get footer.php
