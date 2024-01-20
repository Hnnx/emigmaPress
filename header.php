<?php
/**
 * Default header - must include wp_head in <head> tags.
 * right after the opening <body> tag include wp_body_open
 *
 * @package EmigmaPress
 */

?>

<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header id="masthead" class="site-header">

		<div class="header-wrapper d-flex align-items-center px-2 px-lg-10 justify-content-between">

			<!-- .site-branding -->
			<div class="site-branding">
				<?php if ( has_custom_logo() ) : ?>
						<?php the_custom_logo(); ?>
				<?php else : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

				<?php endif; ?>

			</div>

			<!-- #site-navigation -->
			<nav id="site-navigation" class="main-navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-main',
						'menu_id'        => 'menu-main',
					)
				);
				?>
			</nav>
		</div>

	</header>

	<div id="content" class="site-content">
