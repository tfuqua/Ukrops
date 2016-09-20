<?php
/**
 * @package ukrops
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header class="site-header" role="banner">
		<a class="sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'ukrops' ); ?></a>

		<a href="<?php echo site_url() ?>">
			<div class="brand">
				<img src="<?php header_image(); ?>" alt="" />
			</div>
		</a>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'list-inline') ); ?>
			<i class="fa fa-search"></i>
		</nav><!-- #site-navigation -->

			<div style="display:none">
			<?php get_search_form(); ?>
			</div>
		<div>


		</div>
	</header>

	<div id="content" class="site-content">
