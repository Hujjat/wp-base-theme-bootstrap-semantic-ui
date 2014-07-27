<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package THEMENAME
 */

get_header(); ?>

<div class="container">
	<div class="row top-space">
		<div class="col col-9 col-md-9 col-sm-8">
			<section id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h1 class="page-title">
							<?php
								if ( is_category() ) :
									single_cat_title();

								elseif ( is_tag() ) :
									single_tag_title();

								elseif ( is_author() ) :
									printf( __( 'Author: %s', 'themename' ), '<span class="vcard">' . get_the_author() . '</span>' );

								elseif ( is_day() ) :
									printf( __( 'Day: %s', 'themename' ), '<span>' . get_the_date() . '</span>' );

								elseif ( is_month() ) :
									printf( __( 'Month: %s', 'themename' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'themename' ) ) . '</span>' );

								elseif ( is_year() ) :
									printf( __( 'Year: %s', 'themename' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'themename' ) ) . '</span>' );

								elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
									_e( 'Asides', 'themename' );

								elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
									_e( 'Galleries', 'themename');

								elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
									_e( 'Images', 'themename');

								elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
									_e( 'Videos', 'themename' );

								elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
									_e( 'Quotes', 'themename' );

								elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
									_e( 'Links', 'themename' );

								elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
									_e( 'Statuses', 'themename' );

								elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
									_e( 'Audios', 'themename' );

								elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
									_e( 'Chats', 'themename' );

								else :
									_e( 'Archives', 'themename' );

								endif;
							?>
						</h1>
						<?php
							// Show an optional term description.
							$term_description = term_description();
							if ( ! empty( $term_description ) ) :
								printf( '<div class="taxonomy-description">%s</div>', $term_description );
							endif;
						?>
					</header><!-- .page-header -->

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

							<div class="ui piled segment">
							<div class="row">
								
									<div class="col col-md-3 col-lg-3 col-sm-4 col-xs-4">
											<div class="post-box  win-tooltip" title="<?php the_title(); ?>">

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
								<hr>
					<?php endwhile; ?>

					<?php themename_paging_nav(); ?>

				<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>

				</main><!-- #main -->
			</section><!-- #primary -->
		</div>  <!-- Col -->
<?php get_sidebar(); ?>
</div> <!-- Row -->
</div> <!-- Container -->
<?php get_footer(); ?>
