<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Advocate Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php if(is_singular() && pings_open()) { ?>
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' )); ?>">
<?php } ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
	//wp_body_open hook from WordPress 5.2
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
?>
<a class="skip-link screen-reader-text" href="#sitemain">
	<?php _e( 'Skip to content', 'advocate-lite' ); ?>
</a>

<?php
	/*****************************
	** Get Top Bar
	*****************************/
	get_template_part('header/top','bar');

	$gethdmllbl = esc_html(get_theme_mod('adv_mainhead_maillbl'));
	$gethdml = esc_html(get_theme_mod('adv_mainhead_mail'));

	$gethdphnlbl = esc_html(get_theme_mod('adv_mainhead_phplbl'));
	$gethdphn = esc_html(get_theme_mod('adv_mainhead_phn'));
?>
<header id="header" class="header">
	<div class="wrap">
		<div class="flexbox">
			<div class="head-left<?php if( empty( $gethdmllbl || $gethdml ) ){ echo ' hideonmobile'; } ?>">
				<?php if( !empty( $gethdmllbl || $gethdml ) ){ ?>
				<div class="header-info">
					<div class="flexbox">
						<div class="head-icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
						<div class="head-mail"><span><?php echo $gethdmllbl; ?></span><h5><?php echo $gethdml; ?></h5></div>
					</div><!-- flex -->
				</div><!-- header info -->
				<?php } else {
						echo '<div class="getspace"></div>';
					}
				?>
			</div>
			<div class="head-center">
				<div class="site-logo">
					<?php if ( has_custom_logo() ) { ?>
						<div class="custom-logo">
							<?php advocate_lite_the_custom_logo(); ?>
						</div><!-- cutom logo -->
					<?php } ?>
					<div class="site-title-desc">
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a>
						</h1>
						<?php
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) :
								echo '<p class="site-description">'.esc_html($description).'</p>';
							endif;
						?>
					</div><!-- site-title-desc -->
				</div><!-- site-logo -->
			</div>
			<div class="head-right<?php if( empty( $gethdphnlbl || $gethdphn ) ){ echo ' hideonmobile'; } ?>">
				<?php if( !empty( $gethdphnlbl || $gethdphn ) ){ ?>
					<div class="header-info">
						<div class="flexbox">
							<div class="head-icon"><i class="fa fa-phone-square" aria-hidden="true"></i></div>
							<div class="head-mail"><span><?php echo $gethdphnlbl; ?></span><h5><?php echo $gethdphn; ?></h5></div>
						</div><!-- flex -->
					</div><!-- header info -->
				<?php } else {
						echo '<div class="getspace"></div>';
					}
				?>
			</div>
		</div><!-- flexbox -->
	</div><!-- wrap -->
</header><!-- header -->
<?php
	/*****************************
	** Get Navigation
	*****************************/
	get_template_part('header/navigation');
?>