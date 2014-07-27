<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package THEMENAME
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site container">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'themename' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
				<div class="navbar navbar-default navbar-fixed-top" role="navigation">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
						</div>
						      <?php
           						 wp_nav_menu( array(
            					    'menu'              => 'primary',
         					        'theme_location'    => 'primary',
        					        'depth'             => 2,
           						    'container'         => 'div',
            					    'container_class'   => 'collapse navbar-collapse',
   									'container_id'      => 'bs-example-navbar-collapse-1',
       						        'menu_class'        => 'nav navbar-nav',
       						        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
        					        'walker'            => new wp_bootstrap_navwalker())
       								     );
   							     ?>
					</div>
				</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
