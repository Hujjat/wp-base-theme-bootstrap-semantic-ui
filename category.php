<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package THEMENAME
 */

get_header(); ?>

<div class="container">
	<div class="row top-space">
		<div class="col col-9 col-md-9 col-sm-8">
			<section id="primary" class="content-area">
				<div id="content" class="site-content" role="main">

					<?php if ( have_posts() ) : ?>

					<header class="archive-header">
						<h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'windroidi' ), single_cat_title( '', false ) ); ?></h1>

					</header><!-- .archive-header -->

					<?php
							// Start the Loop.
							while ( have_posts() ) : the_post();

							/*
							 * Include the post format-specific template for the content. If you want to
							 * use this in a child theme, then include a file called called content-___.php
							 * (where ___ is the post format) and that will be used instead.
							 */
							?>

						<div class="ui piled segment">							
							<div class="row">
									<div class="col col-md-3 col-lg-3 col-sm-4 col-xs-4">
											<div class="post-box  win-tooltip" title="I well pust something funcy here">

												<?php 
													if ( has_post_thumbnail() ) {

															the_post_thumbnail('thumbnail', array('class' => 'media-object img-responsive'));
																			}
												?>
											</div>
									</div>

									<div class="col col-md-9 col-lg-9 col-sm-8 col-xs-8">
									<a class="float" href="<?php the_permalink(); ?>">
										<h3><?php the_title(); ?></h3>
									</a>
									<?php if ( 'post' == get_post_type() ) : ?>
										<div class="entry-meta">
											<?php themename_posted_on(); ?>
										</div><!-- .entry-meta -->
									<?php endif; ?>	
										<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
										<br>
										<?php echo excerpt(25); ?>
									</div>
									<a href="<?php the_permalink(); ?>"><div class="ui large bottom blue right attached label"> More...</div>.</a>
								</div>
							</div>
							<?php
								endwhile;
							// Previous/next page navigation.
							themename_paging_nav();

						else :
							// If no content, include the "No posts found" template.
							get_template_part( 'content', 'none' );

						endif;
					?>
				</div><!-- #content -->
			</section><!-- #primary -->
		</div> <!-- Col -->
		<?php get_sidebar();?>
	</div> <!-- Row -->
</div> <!-- Container -->
<?php
get_footer();
?>

