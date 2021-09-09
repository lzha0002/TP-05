<?php
/**
 * Advocate Lite Theme Customizer
 *
 * @package Advocate Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function advocate_lite_customize_register( $wp_customize ) {
	
	function advocate_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
	
	$wp_customize->get_setting( 'blogname' )->tranport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->tranport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
	    'selector' => 'h1.site-title',
	    'render_callback' => 'advocate_lite_customize_partial_blogname',
	) );

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
	    'selector' => 'p.site-description',
	    'render_callback' => 'advocate_lite_customize_partial_blogdescription',
	) );

	/***************************************
	** Color Scheme
	***************************************/
	$wp_customize->add_setting('color_scheme', array(
		'default' => '#1d2339',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','advocate-lite'),
			'description' => __('Select color from here.','advocate-lite'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);

	$wp_customize->add_setting('adv_headerbg_color', array(
		'default' => '#ffffff',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'adv_headerbg_color',array(
			'label' => __('Header Background color','advocate-lite'),
			'description'	=> __('Select background color for header.','advocate-lite'),
			'section' => 'colors',
			'settings' => 'adv_headerbg_color'
		))
	);

	$wp_customize->add_setting('adv_navbar_bg', array(
		'default' => '#dcb161',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'adv_navbar_bg',array(
			'label' => __('Nav Bar Background color','advocate-lite'),
			'description'	=> __('Select background color for navigation bar.','advocate-lite'),
			'section' => 'colors',
			'settings' => 'adv_navbar_bg'
		))
	);

	$wp_customize->add_setting('adv_footer_color', array(
		'default' => '#dcb161',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'adv_footer_color',array(
			'label' => __('Footer Background Color','advocate-lite'),
			'description' => __('Select background color for footer.','advocate-lite'),
			'section' => 'colors',
			'settings' => 'adv_footer_color'
		))
	);

	/***************************************
	** Top Bar
	***************************************/
	$wp_customize->add_section(
        'adv_topbar_info',
        array(
            'title' => __('Setup Top Bar', 'advocate-lite'),
            'priority' => null,
			'description'	=> __('Add top bar information here','advocate-lite'),	
        )
    );

    $wp_customize->add_setting('adv_tpbr_add',array(
			'sanitize_callback'	=> 'wp_filter_nohtml_kses'
	));
	
	$wp_customize->add_control('adv_tpbr_add',array(
			'type'	=> 'text',
			'label'	=> __('Add Company Address here.','advocate-lite'),
			'section'	=> 'adv_topbar_info'
	));

	$wp_customize->add_setting('adv_tpbr_hrs',array(
			'sanitize_callback'	=> 'wp_filter_nohtml_kses'
	));
	
	$wp_customize->add_control('adv_tpbr_hrs',array(
			'type'	=> 'text',
			'label'	=> __('Add Working Hours here.','advocate-lite'),
			'section'	=> 'adv_topbar_info'
	));

	$wp_customize->add_setting('adv_tpbr_fb',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('adv_tpbr_fb',array(
			'type'	=> 'url',
			'label'	=> __('Add Facebook link here.','advocate-lite'),
			'section'	=> 'adv_topbar_info'
	));

	$wp_customize->add_setting('adv_tpbr_tw',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('adv_tpbr_tw',array(
			'type'	=> 'url',
			'label'	=> __('Add Twitter link here.','advocate-lite'),
			'section'	=> 'adv_topbar_info'
	));

	$wp_customize->add_setting('adv_tpbr_yt',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('adv_tpbr_yt',array(
			'type'	=> 'url',
			'label'	=> __('Add Youtube link here.','advocate-lite'),
			'section'	=> 'adv_topbar_info'
	));

	$wp_customize->add_setting('adv_tpbr_in',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('adv_tpbr_in',array(
			'type'	=> 'url',
			'label'	=> __('Add Linkedin link here.','advocate-lite'),
			'section'	=> 'adv_topbar_info'
	));

	$wp_customize->add_setting('adv_tpbr_pin',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('adv_tpbr_pin',array(
			'type'	=> 'url',
			'label'	=> __('Add Pinterest link here.','advocate-lite'),
			'section'	=> 'adv_topbar_info'
	));

	$wp_customize->add_setting('adv_tpbr_hide',array(
			'default' => true,
			'sanitize_callback' => 'advocate_lite_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'adv_tpbr_hide', array(
		   'settings' => 'adv_tpbr_hide',
    	   'section'   => 'adv_topbar_info',
    	   'label'     => __('Check this to hide Top Bar.','advocate-lite'),
    	   'type'      => 'checkbox'
     ));

	/***************************************
	** Main Header Information
	***************************************/
	$wp_customize->add_section(
        'adv_mainhead_info',
        array(
            'title' => __('Setup Main Header Information', 'advocate-lite'),
            'priority' => null,
			'description'	=> __('Add main header information here','advocate-lite'),	
        )
    );

    $wp_customize->add_setting('adv_mainhead_maillbl',array(
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('adv_mainhead_maillbl',array(
			'type'	=> 'text',
			'label'	=> __('Add Company Email label here.','advocate-lite'),
			'section'	=> 'adv_mainhead_info'
	));

    $wp_customize->add_setting('adv_mainhead_mail',array(
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('adv_mainhead_mail',array(
			'type'	=> 'text',
			'label'	=> __('Add Company Email Address here.','advocate-lite'),
			'section'	=> 'adv_mainhead_info'
	));

	$wp_customize->add_setting('adv_mainhead_phplbl',array(
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('adv_mainhead_phplbl',array(
			'type'	=> 'text',
			'label'	=> __('Add Company Phone label here.','advocate-lite'),
			'section'	=> 'adv_mainhead_info'
	));

    $wp_customize->add_setting('adv_mainhead_phn',array(
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('adv_mainhead_phn',array(
			'type'	=> 'text',
			'label'	=> __('Add Company Phone Number here.','advocate-lite'),
			'section'	=> 'adv_mainhead_info'
	));

	/***************************************
	** Slider Section
	***************************************/
	$wp_customize->add_section(
        'adv_slider_section',
        array(
            'title' => __('Setup Slider', 'advocate-lite'),
            'priority' => null,
			'description'	=> __('Recommended image size (1600x700). Slider will work only when you select the static front page.','advocate-lite'),	
        )
    );

    $wp_customize->add_setting('slide1',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('slide1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','advocate-lite'),
			'section'	=> 'adv_slider_section'
	));

	$wp_customize->add_setting('slide2',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('slide2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','advocate-lite'),
			'section'	=> 'adv_slider_section'
	));

	$wp_customize->add_setting('slide3',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('slide3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','advocate-lite'),
			'section'	=> 'adv_slider_section'
	));

	$wp_customize->add_setting('slide_more',array(
		'default'	=> __('Read More','advocate-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('slide_more',array(
		'label'	=> __('Add slider link button text.','advocate-lite'),
		'section'	=> 'adv_slider_section',
		'setting'	=> 'slide_more',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('adv_hide_slider',array(
		'default' => true,
		'sanitize_callback' => 'advocate_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	)); 

	$wp_customize->add_control( 'adv_hide_slider', array(
	   'settings' => 'adv_hide_slider',
	   'section'   => 'adv_slider_section',
	   'label'     => __('Check this to hide slider.','advocate-lite'),
	   'type'      => 'checkbox'
    ));

    /***************************************
	** First Section
	***************************************/
	$wp_customize->add_section(
        'adv_whyus_section',
        array(
            'title' => __('Setup Why Choose Us Section', 'advocate-lite'),
            'priority' => null,
			'description'	=> __('Select page for homepage fisrt section. This section will be displayed only when you select the static front page.','advocate-lite'),	
        )
    );

    $wp_customize->add_setting('adv_frstsec_ttl',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adv_frstsec_ttl',array(
		'type'	=> 'text',
		'label'	=> __('Add Section Title Here','advocate-lite'),
		'section'	=> 'adv_whyus_section'
	));

    $wp_customize->add_setting('whyus1',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('whyus1',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for first column','advocate-lite'),
		'section'	=> 'adv_whyus_section'
	));

	$wp_customize->add_setting('whyus2',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('whyus2',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for second column','advocate-lite'),
		'section'	=> 'adv_whyus_section'
	));

	$wp_customize->add_setting('whyus3',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('whyus3',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for third column','advocate-lite'),
		'section'	=> 'adv_whyus_section'
	));

	$wp_customize->add_setting('whyus_more',array(
		'default'	=> __('Read More','advocate-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('whyus_more',array(
		'label'	=> __('Add why us more button text.','advocate-lite'),
		'section'	=> 'adv_whyus_section',
		'setting'	=> 'whyus_more',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('adv_hide_whyus',array(
		'default' => true,
		'sanitize_callback' => 'advocate_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	)); 

	$wp_customize->add_control( 'adv_hide_whyus', array(
	   'settings' => 'adv_hide_whyus',
	   'section'   => 'adv_whyus_section',
	   'label'     => __('Check this to hide first section.','advocate-lite'),
	   'type'      => 'checkbox'
    ));

    /***************************************
	** First Section
	***************************************/
	$wp_customize->add_section(
        'adv_welc_section',
        array(
            'title' => __('Setup About Us Section', 'advocate-lite'),
            'priority' => null,
			'description'	=> __('Select page for homepage second section. This section will be displayed only when you select the static front page.','advocate-lite'),	
        )
    );

    $wp_customize->add_setting('welcome_page',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('welcome_page',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for this section','advocate-lite'),
		'section'	=> 'adv_welc_section'
	));

	$wp_customize->add_setting('welcome_more',array(
		'default'	=> __('Read More','advocate-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('welcome_more',array(
		'label'	=> __('Add read more button text.','advocate-lite'),
		'section'	=> 'adv_welc_section',
		'setting'	=> 'welcome_more',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('adv_hide_welcome',array(
		'default' => true,
		'sanitize_callback' => 'advocate_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	)); 

	$wp_customize->add_control( 'adv_hide_welcome', array(
	   'settings' => 'adv_hide_welcome',
	   'section'   => 'adv_welc_section',
	   'label'     => __('Check this to hide second section.','advocate-lite'),
	   'type'      => 'checkbox'
    ));


}
add_action( 'customize_register', 'advocate_lite_customize_register' );

function advocate_lite_css_func(){ ?>
<style>
	a,
	.tm_client strong,
	.postmeta a:hover,
	#sidebar ul li a:hover,
	.blog-post h3.entry-title,
	a.blog-more:hover,
	#commentform input#submit,
	input.search-submit,
	.nivo-controlNav a.active,
	.blog-date .date,
	.sitenav ul li.current_page_item a,
	.sitenav ul li a:hover, 
	.sitenav ul li.current_page_item ul li a:hover,
	h2.section_title,
	.whyus-box .why-more{
		color:<?php echo esc_attr(get_theme_mod('color_scheme','#1d2339'));?>;
	}
	h3.widget-title,
	.nav-links .current,
	.nav-links a:hover,
	p.form-submit input[type="submit"],
	.whyus-thumb,
	.read-more,
	.nivo-controlNav a,
	.main-slider .inner-caption .sliderbtn,
	.header-info .head-icon,
	.topbar{
		background-color:<?php echo esc_attr(get_theme_mod('color_scheme','#1d2339'));?>;
	}
	#header{
		background-color:<?php echo esc_attr(get_theme_mod('adv_headerbg_color','#ffffff'));?>;
	}
	#navigation,
	.sitenav ul li.menu-item-has-children:hover > ul,
	.sitenav ul li.menu-item-has-children:focus > ul,
	.sitenav ul li.menu-item-has-children.focus > ul,
	.nivo-controlNav a.active{
		background-color:<?php echo esc_attr(get_theme_mod('adv_navbar_bg','#dcb161'));?>;
	}
	p.site-description,
	.header-info span,
	.header-info .head-icon{
		color:<?php echo esc_attr(get_theme_mod('adv_navbar_bg','#dcb161'));?>;
	}
	.copyright-wrapper{
		background-color:<?php echo esc_attr(get_theme_mod('adv_footer_color','#dcb161'));?>;
	}
</style>
<?php }
add_action('wp_head','advocate_lite_css_func');

function advocate_lite_customize_preview_js() {
	wp_enqueue_script( 'advocate-lite-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'advocate_lite_customize_preview_js' );