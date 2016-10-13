<?php
/**
 * @package ukrops
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/6900534/6628972/css/fonts.css" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a class="sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'ukrops' ); ?></a>

	<header role="banner" class="site-header <?= is_main_site() ? '' : 'child-site' ?> ">

		<?php if (!is_main_site()) { ?>
			<div class="extra-nav">
				<div class="container-fluid">
					<?php
						wp_nav_menu( array( 'theme_location' => 'extra-nav', 'menu_id' => 'extra-nav', 'menu_class' => 'list-inline'));
					?>
					<div id="searchForm" class="search-form">
						<button id="searchToggle" class="search-toggle">
							<i class="fa fa-search"></i>
						</button>

						<div class="search-fields">
							<?php get_search_form(); ?>
						</div>
					</div>
				</div>
			</div>
		<?php }?>

		<div class="header-container">
			<div class="brand">
				<a href="<?php echo site_url() ?>">
					<img src="<?php header_image(); ?>" alt="" />
				</a>
			</div>

		<button type="button" class="navbar-toggle" id="navbar-toggle">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="toggle-label">Menu</span>
		</button>

		<div class="nav-wrapper">

				<div id="searchForm" class="search-form">
					<button id="searchToggle" class="search-toggle">
						<i class="fa fa-search"></i>
					</button>

					<div class="search-fields">
						<?php get_search_form(); ?>
					</div>
				</div>

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php
				$args = array(
							'menu'              => 'primary',
							'theme_location'    => 'primary',
							'depth'            	=> 2,
							'menu_id'           => 'primary-menu',
							'fallback_cb'       => 'my_walker::fallback',
							'walker'            => new my_walker()
						);
				wp_nav_menu ($args);
				?>
			</nav><!-- #site-navigation -->

		</div>

		</div>
	</header>

	<div id="content" class="site-content">
