<?php
/**
 * The Top Bar for our theme.
 *
 * Display all information related to top bar
 *
 * @package Advocate Lite
 */

$advtpbrhide = get_theme_mod('adv_tpbr_hide','1');

if( empty( $advtpbrhide ) ) {

	$advtpbradd = get_theme_mod('adv_tpbr_add');
	$advtpbrhrs = get_theme_mod('adv_tpbr_hrs');

	$advtpbrfb = get_theme_mod('adv_tpbr_fb');
	$advtpbrtw = get_theme_mod('adv_tpbr_tw');
	$advtpbryt = get_theme_mod('adv_tpbr_yt');
	$advtpbrin = get_theme_mod('adv_tpbr_in');
	$advtpbrpi = get_theme_mod('adv_tpbr_pin');
 
	if( !empty( $advtpbradd || $advtpbrhrs || $advtpbrfb || $advtpbrtw || $advtpbryt || $advtpbrin || $advtpbrpi ) ){
?>
	<div class="topbar">
		<div class="wrap">
			<div class="flexbox">
				<?php 
					if( !empty( $advtpbradd || $advtpbrhrs ) ){
						echo '<div class="topbar-left">';
							if( !empty( $advtpbradd ) ){
								echo '<span class="tpbr-add"><i class="fa fa-map-marker"></i> '.esc_html($advtpbradd).'</span>';
							} if( !empty( $advtpbrhrs ) ){
								echo '<span class="tpbr-hrs"><i class="fa fa-clock-o"></i> '.esc_html($advtpbrhrs).'</span>';
							}
						echo '</div>';
					} if( !empty( $advtpbrfb || $advtpbrtw || $advtpbryt || $advtpbrin || $advtpbrpi ) ){ 
						echo '<div class="topbar-right"><div class="topbar-social">';
							if( !empty( $advtpbrtw ) ){
								echo '<a href="'.esc_url( $advtpbrtw ).'" target="_blank" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
							}
							if( !empty( $advtpbrfb ) ){
								echo '<a href="'.esc_url( $advtpbrfb ).'" target="_blank" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
							}
							if( !empty( $advtpbryt ) ){
								echo '<a href="'.esc_url( $advtpbryt ).'" target="_blank" title="YouTube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>';
							}
							if( !empty( $advtpbrin ) ){
								echo '<a href="'.esc_url( $advtpbrin ).'" target="_blank" title="Linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>';
							}
							if( !empty( $advtpbrpi ) ){
								echo '<a href="'.esc_url( $advtpbrpi ).'" target="_blank" title="Pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>';
							}
						echo '</div><!-- social --></div><!-- topbar left -->';
					}
					?>
			</div><!-- flex -->
		</div><!-- wrap -->
	</div><!-- top bar -->
<?php 
	}
}