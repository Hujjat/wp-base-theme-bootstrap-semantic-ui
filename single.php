<?php
/**
 * The template for displaying all single posts.
 *
 * @package THEMENAME
 */
get_header(); ?>

<div class="container top-space">
		<div class="row">
			<div class="col col-md-9 col-lg-9 col-sm-8">
				<div id="primary" class="content-area">	
					<div class="ui piled segment">
					<main id="main" class="site-main" role="main">
					<?php while ( have_posts() ) : the_post(); ?>
						
						<?php get_template_part( 'content', 'single' ); ?>


						<?php
							// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || '0' != get_comments_number() ) :
								comments_template();
							endif;
						?>

						<?php endwhile; // end of the loop. ?>

						</main><!-- #main -->
					</div>
				</div><!-- #primary -->
		</div>	
					<?php get_sidebar();?>
	</div>
	</div> <!-- Container -->
<?php get_footer(); ?>