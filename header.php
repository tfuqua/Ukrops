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

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1769616103250587'); // Insert your pixel ID here.
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1769616103250587&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->
</head>

<body <?php body_class(); ?>>
	<a class="sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'ukrops' ); ?></a>

	<header role="banner" class="site-header <?= is_main_site() ? '' : 'child-site' ?> ">

		<?php if (!is_main_site()) { ?>
			<div class="extra-nav">
				<div class="container-fluid">
						<?php
							$args = array('theme_location' => 'extra-nav', 'menu_id' => 'extra-nav', 'menu_class' => 'list-inline');
	         		switch_to_blog(1);
	         		wp_nav_menu( $args );
	         		restore_current_blog();
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
