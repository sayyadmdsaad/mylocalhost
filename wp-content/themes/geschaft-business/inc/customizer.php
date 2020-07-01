<?php
/**
 * Geschaft Business: Customizer
 *
 * @package WordPress
 * @subpackage Geschaft Business
 * @since 1.0
 */

function geschaft_business_customize_register( $wp_customize ) {

	// Top Banner
    $wp_customize->add_section('geschaft_business_top_banner',array(
        'title' => __('Top Banner', 'geschaft-business'),
        'description'   => __('Banner Image Size (1420x567)','geschaft-business'),   
    ) );
    
    $wp_customize->add_setting('geschaft_business_banner',array(
        'default' => '0',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'geschaft_business_sanitize_dropdown_pages'
    ));    
    $wp_customize->add_control('geschaft_business_banner',array(
        'type'  => 'dropdown-pages',
        'label' => __('Select page for banner','geschaft-business'),
        'section'   => 'geschaft_business_top_banner'
    )); 

	// OUR Services
	$wp_customize->add_section('geschaft_business_service',array(
		'title' => esc_html__('Our Services','geschaft-business'),		
	));

	$wp_customize->add_setting('geschaft_business_our_services_title',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('geschaft_business_our_services_title',array(
		'label' => esc_html__('Section Title','geschaft-business'),
		'section' => 'geschaft_business_service',
		'setting' => 'geschaft_business_our_services_title',
		'type'    => 'text'
	));

	$wp_customize->add_setting('geschaft_business_our_services_subtitle',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('geschaft_business_our_services_subtitle',array(
		'label' => esc_html__('Section Sub-title','geschaft-business'),
		'section' => 'geschaft_business_service',
		'setting' => 'geschaft_business_our_services_subtitle',
		'type'    => 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
	if($i==0){
	  $default = $category->slug;
	  $i++;
	}
	$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('geschaft_business_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'geschaft_business_sanitize_select',
	));
	$wp_customize->add_control('geschaft_business_category_setting',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => esc_html__('Select Category to display Post','geschaft-business'),
		'section' => 'geschaft_business_service',
	));

	//Footer
    $wp_customize->add_section( 'geschaft_business_footer_copyright', array(
    	'title'      => esc_html__( 'Footer Text', 'geschaft-business' ),
	) );

    $wp_customize->add_setting('geschaft_business_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('geschaft_business_footer_text',array(
		'label'	=> esc_html__('Copyright Text','geschaft-business'),
		'section'	=> 'geschaft_business_footer_copyright',
		'type'		=> 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'geschaft_business_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'geschaft_business_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'geschaft_business_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'geschaft_business_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'geschaft-business' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'geschaft-business' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'geschaft_business_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'geschaft_business_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'geschaft_business_customize_register' );

function geschaft_business_customize_partial_blogname() {
	bloginfo( 'name' );
}

function geschaft_business_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


function geschaft_business_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function geschaft_business_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}