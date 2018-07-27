<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Total WordPress Theme
 * @subpackage Templates
 * @version 4.5.4
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?><!DOCTYPE html>
<html <?php language_attributes(); ?><?php wpex_schema_markup( 'html' ); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wpex_outer_wrap_before(); ?>

<div id="outer-wrap" class="clr">

	<?php wpex_hook_wrap_before(); ?>

	<div id="wrap" class="clr">

		<header id="site-header" class="<?php echo wpex_header_classes(); ?>"<?php wpex_schema_markup( 'header' ); ?><?php wpex_aria_landmark( 'header' ); ?>>

			<?php wpex_hook_header_top(); ?>

			<div id="site-header-inner vc_row wpb_row vc_row-fluid" class="clr">
				<div class="cww-header-top clr">
					<div class="vc_col-sm-12">
						<div class="top-buttons clr">
							<?php dynamic_sidebar( 'top_header_area' ); ?>
						</div>
					</div>
				</div>
				<div class="clr"></div>
				<?php
				$total_bg_img = get_the_post_thumbnail_url( null, 'full' );
				if ( ! empty( $total_bg_img ) ) {
					$total_bg_style = 'style="background-image: url(' . $total_bg_img . ');"';
				} else {
					$total_bg_style = 'style="background-image: url(' . TOTAL_CHILD_THEME_DIR_URL . '/assets/fest-background.jpg);"';
				}
				?>
				<div class="cww-header-bottom vc_row wpb_row vc_row-fluid" <?php echo $total_bg_style; ?>>
					<div id="site-logo" class="<?php echo esc_attr( wpex_header_logo_classes() ); ?>">
						<div id="site-logo-inner" class="clr cww-logo">
							<?php if ( is_front_page() ) { ?>
								<span class="main-logo">
									<img src="<?php echo wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ); ?>"
									     alt="<?php bloginfo( 'title' ); ?>" class="logo-img">
								</span>
							<?php } else { ?>
								<a href="<?php bloginfo( 'url' ); ?>" rel="home" class="main-logo">
									<img src="<?php echo wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ); ?>"
									     alt="<?php bloginfo( 'title' ); ?>" class="logo-img">
								</a>
							<?php } ?>
						</div>
					</div>
					<?php wp_nav_menu( array(
						'theme_location' => 'main_menu',
						'depth'          => 1,
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'header-menu-mobile',
						'fallback_cb'    => false
					) ); ?>
					<div class="cww-sticky-header">
						<?php if ( is_front_page() ) { ?>
							<span class="sticky-logo">
								<img src="<?php echo wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ); ?>"
								     alt="<?php bloginfo( 'title' ); ?>" class="logo-img">
							</span>
						<?php } else { ?>
							<a href="<?php bloginfo( 'url' ); ?>" rel="home" class="sticky-logo">
								<img src="<?php echo wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ); ?>"
								     alt="<?php bloginfo( 'title' ); ?>" class="logo-img">
							</a>
						<?php }
						wp_nav_menu( array(
							'theme_location' => 'main_menu',
							'depth'          => 1,
							'menu_id'        => 'primary-sticky-menu',
							'menu_class'     => 'header-sticky-menu',
							'fallback_cb'    => false
						) ); ?>
					</div>
					<div class="adaptive-menu">
						<span class="fa fa-bars"></span>
					</div>
					<div id="site-logo-mobile" class="<?php echo esc_attr( wpex_header_logo_classes() ); ?>">
						<div id="site-logo-inner" class="clr cww-logo">
							<a href="<?php bloginfo( 'url' ) ?>" rel="home" class="main-logo">
								<img src="<?php echo wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ); ?>"
								     alt="<?php bloginfo( 'title' ) ?>" class="logo-img">
							</a>
						</div>
					</div>
					<div class="clr"></div>
					<?php dynamic_sidebar( 'header_fest_info_area' ); ?>
				</div>
			</div><!-- #site-header-inner -->

			<?php wpex_hook_header_bottom(); ?>

		</header><!-- #header -->

		<main id="main" class="site-main clr"<?php wpex_schema_markup( 'main' ); ?><?php wpex_aria_landmark( 'main' ); ?>>

