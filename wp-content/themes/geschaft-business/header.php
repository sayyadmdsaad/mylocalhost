<?php
/**
 * The header for our theme
 *
 * @package WordPress
 * @subpackage Geschaft Business
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'geschaft-business' ) ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}
?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'geschaft-business' ); ?></a>

	<div id="page" class="site">
	<div id="header">
		<div class="wrap_figure">
			<div class="toggle-menu gb_menu">
	        	<button onclick="gb_Menu_open()"><i class="fas fa-ellipsis-h"></i><p><?php esc_html_e('Menu','geschaft-business'); ?></p><span class="screen-reader-text"><?php esc_html_e('Menu','geschaft-business'); ?></span></button>
		    </div>
			<div class="container">
				<div class="main-top">
					<div class="row">
						<div class="col-lg-3 col-md-3">
							<div class="logo">
						        <?php if( has_custom_logo() ){ geschaft_business_the_custom_logo();
						           }else{ ?>
						          <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						          <?php $description = get_bloginfo( 'description', 'display' );
						          if ( $description || is_customize_preview() ) : ?> 
						            <p class="site-description"><?php echo esc_html($description); ?></p>
						        <?php endif; }?>
						    </div>
						</div>
						<div class="col-lg-9 col-md-9">
						   	<?php get_template_part('template-parts/navigation/navigation-top'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>