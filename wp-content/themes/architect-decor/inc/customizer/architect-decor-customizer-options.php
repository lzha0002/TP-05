<?php
/**
 * Customizer section options.
 *
 * @package Architect Decor
 *
 */

function architect_decor_customizer_theme_settings( $wp_customize ){
	
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	
		
		$wp_customize->add_setting(
			'designexo_footer_copright_text',
			array(
				'sanitize_callback' =>  'architect_decor_sanitize_text',
				'default' => __('Copyright &copy; 2021 | Powered by <a href="//wordpress.org/">WordPress</a> <span class="sep"> | </span> Architect Decor theme by <a target="_blank" href="//themearile.com/">ThemeArile</a>', 'architect-decor'),
				'transport'         => $selective_refresh,
			)	
		);
		$wp_customize->add_control('designexo_footer_copright_text', array(
				'label' => esc_html__('Footer Copyright','architect-decor'),
				'section' => 'designexo_footer_copyright',
				'priority'        => 10,
				'type'    =>  'textarea'
		));

}
add_action( 'customize_register', 'architect_decor_customizer_theme_settings' );

function architect_decor_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
}