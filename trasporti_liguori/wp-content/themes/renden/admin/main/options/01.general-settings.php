<?php
/**
 * General settings functions.
 *
 * @package ThinkUpThemes
 */

/* ----------------------------------------------------------------------------------
	Logo Settings
---------------------------------------------------------------------------------- */

function thinkup_custom_logo() {

	$output = NULL;

    // Get logo image url if image has been assigned.
	$check_logoset = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );

	if ( ! empty( $check_logoset[0] ) ) {
	   if ( function_exists( 'the_custom_logo' ) ) {
			$output = get_custom_logo();
		}
	} else {
		$output .= '<a rel="home" href="' . esc_url( home_url( '/' ) ) . '">';
		$output .= '<h1 rel="home" class="site-title" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</h1>';
		$output .= '<h2 class="site-description" title="' . esc_attr( get_bloginfo( 'description', 'display' ) ) . '">' . esc_html( get_bloginfo( 'description' ) ) . '</h2>';
		$output .= '</a>';
	}

	// Output logo is set
	if ( ! empty( $output ) ) {
		return $output;
	}
}


/* ----------------------------------------------------------------------------------
	Page Layout
---------------------------------------------------------------------------------- */

/* Add Custom Sidebar css */
function thinkup_sidebar_css($classes) {

// Get theme options values.
$thinkup_homepage_layout = thinkup_var ( 'thinkup_homepage_layout' );
$thinkup_general_layout  = thinkup_var ( 'thinkup_general_layout' );
$thinkup_blog_layout     = thinkup_var ( 'thinkup_blog_layout' );
$thinkup_post_layout     = thinkup_var ( 'thinkup_post_layout' );

	$class_sidebar = NULL;

	if ( is_front_page() ) {
		if ( $thinkup_homepage_layout == "option1" or empty( $thinkup_homepage_layout ) ) {
			$class_sidebar = '';
		} else if ( $thinkup_homepage_layout == "option2" ) {
			$class_sidebar = 'layout-sidebar-left';
		} else if ( $thinkup_homepage_layout == "option3" ) {
			$class_sidebar = 'layout-sidebar-right';
		}
	} else if ( is_page() ) {
			if ( $thinkup_general_layout == "option1" or empty( $thinkup_general_layout ) ) {
				$class_sidebar = '';
			} else if ( $thinkup_general_layout == "option2" ) {
				$class_sidebar = 'layout-sidebar-left';
			} else if ( $thinkup_general_layout == "option3" ) {
				$class_sidebar = 'layout-sidebar-right';
			}
	} else if ( thinkup_check_isblog() and ! is_single() ) {
		if ( $thinkup_blog_layout == "option1" or empty( $thinkup_blog_layout ) ) {
			$class_sidebar = '';
		} else if ( $thinkup_blog_layout == "option2" ) {
			$class_sidebar = 'layout-sidebar-left';
		} else if ( $thinkup_blog_layout == "option3" ) {
			$class_sidebar = 'layout-sidebar-right';
		}
	} else if ( is_single() ) {
		if ( $thinkup_post_layout == "option1" or empty( $thinkup_post_layout ) ) {
			$class_sidebar = '';
		} else if ( $thinkup_post_layout == "option2" ) {
			$class_sidebar = 'layout-sidebar-left';
		} else if ( $thinkup_post_layout == "option3" ) {
			$class_sidebar = 'layout-sidebar-right';
		} else {
			$class_sidebar = '';
		}
	} else if ( is_search() ) {
		if ( $thinkup_general_layout == "option1" or empty( $thinkup_general_layout ) ) {
			$class_sidebar = '';
		} else if ( $thinkup_general_layout == "option2" ) {
			$class_sidebar = 'layout-sidebar-left';
		} else if ($thinkup_general_layout == "option3") {
			$class_sidebar = 'layout-sidebar-right';
		}
	}

	// Output sidebar class
	if( ! empty( $class_sidebar ) ) {
		$classes[] = $class_sidebar;
	} else {
		$classes[] = 'layout-sidebar-none';
	}
	return $classes;
}
add_action( 'body_class', 'thinkup_sidebar_css' );

/* Add Custom Sidebar html */
function thinkup_sidebar_html() {

// Get theme options values.
$thinkup_homepage_layout           = thinkup_var ( 'thinkup_homepage_layout' );
$thinkup_general_layout            = thinkup_var ( 'thinkup_general_layout' );
$thinkup_blog_layout               = thinkup_var ( 'thinkup_blog_layout' );
$thinkup_post_layout               = thinkup_var ( 'thinkup_post_layout' );
$thinkup_portfolio_layout          = thinkup_var ( 'thinkup_portfolio_layout' );
$thinkup_project_layout            = thinkup_var ( 'thinkup_project_layout' );
$thinkup_woocommerce_layout        = thinkup_var ( 'thinkup_woocommerce_layout' );
$thinkup_woocommerce_layoutproduct = thinkup_var ( 'thinkup_woocommerce_layoutproduct' );

do_action('thinkup_sidebar_html');

	if ( is_front_page() ) {
		if ( $thinkup_homepage_layout == "option1" or empty( $thinkup_homepage_layout ) ) {
				echo '';
		} else if ( $thinkup_homepage_layout == "option2" ) {
				echo get_sidebar();
		} else if ( $thinkup_homepage_layout == "option3" ) {
				echo get_sidebar();
		}
	} else if ( is_page() ) {
		if ( $thinkup_general_layout == "option1" or empty( $thinkup_general_layout ) ) {
			echo '';
		} else if ( $thinkup_general_layout == "option2" ) {
			echo get_sidebar();
		} else if ( $thinkup_general_layout == "option3" ) {
			echo get_sidebar();
		}
	} else if ( thinkup_check_isblog() and ! is_single() ) {
		if ( $thinkup_blog_layout == "option1" or empty( $thinkup_blog_layout ) ) {
			echo '';
		} else if ( $thinkup_blog_layout == "option2" ) {
			echo get_sidebar();
		} else if ( $thinkup_blog_layout == "option3" ) {
			echo get_sidebar();
		}
	} else if ( is_single() ) {
		if ( $thinkup_post_layout == "option1" or empty( $thinkup_post_layout ) ) {
			echo '';
		} else if ( $thinkup_post_layout == "option2" ) {
			echo get_sidebar();
		} else if ( $thinkup_post_layout == "option3" ) {
			echo get_sidebar();
		} else {
			echo '';
		}
	} else if ( is_search() ) {
		if ( $thinkup_general_layout == 'option1' or empty( $thinkup_general_layout ) ) {
			echo '';
		} else if ( $thinkup_general_layout == "option2" ) {
			get_sidebar();
		} else if ( $thinkup_general_layout == "option3" ) {
			get_sidebar();
		}
	}
}


/* ----------------------------------------------------------------------------------
	Select a Sidebar
---------------------------------------------------------------------------------- */

/* Add Selected Sidebar To Specific Pages */
function thinkup_input_sidebars() {

// Get theme options values.
$thinkup_general_sidebars  = thinkup_var ( 'thinkup_general_sidebars' );
$thinkup_homepage_sidebars = thinkup_var ( 'thinkup_homepage_sidebars' );
$thinkup_blog_sidebars     = thinkup_var ( 'thinkup_blog_sidebars' );
$thinkup_post_sidebars     = thinkup_var ( 'thinkup_post_sidebars' );

	if ( is_front_page() ) {
		$output = $thinkup_homepage_sidebars;
	} else if ( is_page() ) {
		$output = $thinkup_general_sidebars;
	} else if ( thinkup_check_isblog() and ! is_single() ) {
		$output = $thinkup_blog_sidebars;
	} else if ( is_single() ) {
		$output = $thinkup_post_sidebars;
	} else if ( is_search() ) {
		$output = $thinkup_general_sidebars;
	}

	if ( empty( $output ) or $output == 'Select a sidebar:' ) {
		$output = 'Sidebar';
	}

	return $output;
}


/* ----------------------------------------------------------------------------------
	Intro Default options
---------------------------------------------------------------------------------- */

/* Add custom intro section [Extend for more options in future update] */
function thinkup_custom_intro() {
$class_intro = NULL;

	// Input additional class if breadcrumb is present
	if ( thinkup_input_breadcrumbswitch() != '' ) {
		$class_intro = 'option2';
	}

	// Output page title and breadcrumb
	if ( ! is_front_page() ) {
		echo	'<div id="intro" class="' . esc_attr( $class_intro ) . '"><div class="wrap-safari"><div id="intro-core">',
				'<h1 class="page-title"><span>',
				thinkup_title_select(),
				'</span></h1>',
				thinkup_input_breadcrumbswitch(),
				'</div></div></div>';
	} else {
		echo '';
	}
}


/* ----------------------------------------------------------------------------------
	Enable Breadcrumbs
---------------------------------------------------------------------------------- */

/* Toggle Breadcrumbs */
function thinkup_input_breadcrumbswitch() {

	if( ! is_front_page() ) {
		return thinkup_input_breadcrumb();
	}
}


/* ----------------------------------------------------------------------------------
	Enable Responsive Layout
---------------------------------------------------------------------------------- */

/* http://wordpress.stackexchange.com/questions/27497/how-to-use-wp-nav-menu-to-create-a-select-menu-dropdown */
class thinkup_nav_menu_responsive extends Walker_Nav_Menu{

	function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="res-menu-item-'. esc_attr( $item->ID ) . '"' . $value . $class_names .'>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_url( $item->url ) .'"' : '';

        // Insert title for top level
		$title = ( $depth == 0 )
			? '<span>' . apply_filters( 'the_title', $item->title, $item->ID ) . '</span>' : apply_filters( 'the_title', $item->title, $item->ID );

        // Insert sub-menu titles
		if ( $depth > 0 ) {
			$title = str_repeat('&#45; ', $depth ) . esc_html( $item->title );
		}

        // Structure of output
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

// Fallback responsive menu when custom header menu has not been set.
function thinkup_input_responsivefall() {

	$output = wp_list_pages('echo=0&title_li=');

	echo '<div id="header-responsive-inner" class="responsive-links nav-collapse collapse"><ul>',
		 $output,
		 '</ul></div>';
}

function thinkup_input_responsivehtml1() {

// Get theme options values.
$thinkup_general_fixedlayoutswitch = thinkup_var ( 'thinkup_general_fixedlayoutswitch' );

	if ( $thinkup_general_fixedlayoutswitch !== '1' ) {

		echo '<div id="header-nav">',
		     '<a class="btn-navbar" data-toggle="collapse" data-target=".nav-collapse">',
		     '<span class="icon-bar"></span>',
		     '<span class="icon-bar"></span>',
		     '<span class="icon-bar"></span>',
		     '</a>',
		     '</div>';
	}
}

function thinkup_input_responsivehtml2() {

// Get theme options values.
$thinkup_general_fixedlayoutswitch = thinkup_var ( 'thinkup_general_fixedlayoutswitch' );

	if ( $thinkup_general_fixedlayoutswitch !== '1' ) {

		$args =  array(
			'container_class' => 'responsive-links nav-collapse collapse',
			'container_id'    => 'header-responsive-inner',
			'menu_class'      => '',
			'theme_location'  => 'header_menu',
			'walker'          => new thinkup_nav_menu_responsive(),
			'fallback_cb'     => 'thinkup_input_responsivefall',
		);

		echo '<div id="header-responsive">',
		     wp_nav_menu( $args ),
		     '</div>';
	}
}

function thinkup_input_responsivecss() {

// Get theme options values.
$thinkup_general_fixedlayoutswitch = thinkup_var ( 'thinkup_general_fixedlayoutswitch' );

	if ( $thinkup_general_fixedlayoutswitch !== '1' ) {
		wp_enqueue_style ( 'thinkup-responsive' );
	}
}
add_action( 'wp_enqueue_scripts', 'thinkup_input_responsivecss', '12' );

function thinkup_input_responsiveclass($classes){

// Get theme options values.
$thinkup_general_fixedlayoutswitch = thinkup_var ( 'thinkup_general_fixedlayoutswitch' );

	if ( $thinkup_general_fixedlayoutswitch == '1' ) {
		$classes[] = 'layout-fixed';
	} else {
		$classes[] = 'layout-responsive';
	}
	return $classes;
}
add_action( 'body_class', 'thinkup_input_responsiveclass');


/* ----------------------------------------------------------------------------------
	BACK UP OPTIONS TO PAGE "THINKUP CREATED CONTENT BACKUP"
---------------------------------------------------------------------------------- */

function thinkup_backup_options() {
global $wp_customize;

	// Get theme options values.
	$thinkup_general_backupswitch = thinkup_var ( 'thinkup_general_backupswitch' );

	// Only backup options is the backup option is enabled
	if ( $thinkup_general_backupswitch == '1' ) {

		// Set output variable to avoid php errors
		$output_header  = NULL;
		$output_content = NULL;

		// Create post array
		$postarray = array();

		// Get ThinkUp options array.
		$thinkup_redux_variables        = get_option( 'thinkup_redux_variables' );

		// Create array of ThinkUp content options currently used
		foreach ( $thinkup_redux_variables as $key => $value ) {
		
			// Get options type and label
			$type  = $wp_customize->get_control( $key )->type;
			$label = $wp_customize->get_control( $key )->label;
		
			// Create output content for "text" and "textarea" options
			if ( $type == 'text' or $type == 'textarea' ) {

				if (strpos($label, 'HIDDEN_LABEL_') !== false) {
					$label = str_replace( 'HIDDEN_LABEL_', '', $label );
				}

				$output_content .= '<h3>' . $label . ' (option: ' . $key . ')</h3>' . "\n";
				$output_content .= '<ul><li>' . $value . '</li></ul>' . "\n" . "\n";
			}
		}

		// Create content for start of backup page
		$output_header   = '';
		$output_header  .= '<-----------------------------------------------------------' . "\n";
		$output_header  .= esc_html__( 'ThinkUp Created Content Backup', 'renden' ) . "\n";
		$output_header  .= esc_html__( 'This page contains a backup of content created by the ThinkUp WordPress Theme. ', 'renden' );
		$output_header  .= esc_html__( 'The purpose for the backup is to prevent content loss on theme switch.', 'renden' );
		$output_header  .= esc_html__( 'When a user switches themes this content will still be available to the user when setting up their site on the new theme.', 'renden' ) . "\n";
		$output_header  .= esc_html__( 'Please note the following : ', 'renden' ) . "\n";
		$output_header  .= ' * ' . esc_html__( 'Leave this page as private, available only to users with admin privledges.', 'renden' ) . "\n";
		$output_header  .= ' * ' . esc_html__( 'You can delete this page any time and regenerate it from within the ThinkUp options menu, General section.', 'renden' ) . "\n";
		$output_header  .= '----------------------------------------------------------->' . "\n";
		$output_header  .= "\n" . "\n";

		// Backup page setup.
		$postarray['post_title']     = 'ThinkUp Created Content Backup'; // translate ok.
		$postarray['post_type']      = 'page';
		$postarray['post_status']    = 'private';
		$postarray['comment_status'] = 'closed';
		$page                        = get_page_by_title( 'ThinkUp Created Content Backup' );
		if ( isset( $page ) && '' !== $page->ID ) {
			$postarray['ID']           = $page->ID;
			$postarray['post_content'] = $output_header . $output_content;
			wp_update_post( $postarray );
		} else {
			$postarray['ID']           = 0;
			$postarray['post_content'] = $output_header . $output_content;
			wp_insert_post( $postarray );
		}
	}
}
add_action( 'customize_save_after', 'thinkup_backup_options' );


?>