<?php
get_header(); //get header.php
while ( have_posts() ) : //loop through posts
	the_post(); //get post data
	?>
	<div class="page-banner">
		<div class="page-banner__bg-image"
		     style="background-image: url(<?php echo get_theme_file_uri( 'images/ocean.jpg' ); ?>)"></div>
		<div class="page-banner__content container container--narrow">
			<h1 class="page-banner__title"><?php the_title(); ?></h1>
			<div class="page-banner__intro">
				<p>Learn how the school of your dreams got started.</p>
			</div>
		</div>
	</div>
	<div class="container container--narrow page-section">
		<div class="generic-content">
			<div class="row group">
				<div class="one-third">
					<?php the_post_thumbnail('professorPortrait'); ?>
				</div>
				<div class="two-third">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
		
		<?php
		// Get the related programs from ACF
		$relatedPrograms = get_field( 'related_programs' );
		// Check if related programs exist
		if ( $relatedPrograms ) {
			echo '<hr class="section-break">';
			echo '<h2 class="headline headline--medium">Subject(s) Taught</h2>';
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
