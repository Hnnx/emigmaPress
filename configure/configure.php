<?php
/**
 * Various theme functionalities.
 *
 * @package EmigmaPress
 */

/**
 * MENUS
 */
function _custom_theme_register_menu() {
	register_nav_menus(
		array(
			'menu-main'   => __( 'Main menu' ),
			'menu-footer' => __( 'Footer footer' ),
		)
	);
}
add_action( 'init', '_custom_theme_register_menu' );

/**
 * SETUP
 */
function custom_setup() {
	// Images.
	add_theme_support( 'post-thumbnails' );

	// Custom logo.
	add_theme_support( 'custom-logo' );

	// Title tags.
	add_theme_support( 'title-tag' );

	// Languages.
	load_theme_textdomain( 'emigma', get_template_directory() . '/languages' );

	// HTML 5 - Example : deletes type="*" in scripts and style tags.
	add_theme_support( 'html5', array( 'script', 'style' ) );

	// Remove SVG and global styles.
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
	remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

	// Remove wp_footer actions which add's global inline styles.
	remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );

	// Remove render_block filters which adds unnecessary stuff.
	remove_filter( 'render_block', 'wp_render_duotone_support' );
	remove_filter( 'render_block', 'wp_restore_group_inner_container' );
	remove_filter( 'render_block', 'wp_render_layout_support_flag' );

	// Remove useless WP image sizes.
	remove_image_size( '1536x1536' );
	remove_image_size( '2048x2048' );
}
add_action( 'after_setup_theme', 'custom_setup' );


/**
 * Remove default image sizes to avoid overcharging server - comment line if you need size.
 *
 * @param sizes $sizes to remove.
 */
function remove_default_image_sizes( $sizes ) {
	unset( $sizes['large'] );
	unset( $sizes['medium'] );
	unset( $sizes['medium_large'] );
	return $sizes;
}
add_filter( 'intermediate_image_sizes_advanced', 'remove_default_image_sizes' );

// disabling big image sizes scaled.
add_filter( 'big_image_size_threshold', '__return_false' );

/**
 * Credits
 */
function remove_footer_admin() {
	echo 'EmigmaPress is built by <a href="https://emigma.com/" target="_blank">Emigma</a>';
}
add_filter( 'admin_footer_text', 'remove_footer_admin' );


// Remove WP Emoji.
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'wp_generator' );

/**
 * Delete wp-embed.js from footer.
 */
function my_deregister_scripts() {
	wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

/**
 * Delete jquery migrate.
 * Reference: https://stackoverflow.com/questions/18421404/how-do-i-stop-wordpress-loading-jquery-and-jquery-migrate
 *
 * @param scripts $scripts see reference.
 */
function dequeue_jquery_migrate( &$scripts ) {
	if ( ! is_admin() ) {
		$scripts->remove( 'jquery' );
		$scripts->add( 'jquery', 'https://code.jquery.com/jquery-3.6.1.min.js', null, null, true );
	}
}
add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );

/**
 * Add SVG to allowed file uploads.
 *
 * @param $mime_types $mime_types allowed types.
 */
function add_file_types_to_uploads( $mime_types ) {
	$mime_types['svg'] = 'image/svg+xml';
	return $mime_types;
}
add_action( 'upload_mimes', 'add_file_types_to_uploads', 1, 1 );

/**
 * Disable update emails.
 */
add_filter( 'auto_plugin_update_send_email', '__return_false' );
add_filter( 'auto_theme_update_send_email', '__return_false' );



/**
 * EMIGMA CUSTOM
 */

if ( ! function_exists( 'var_dumpl' ) ) {
	/**
	 * Outputs formatted dump for better legiblity
	 */
	function var_dumpl() {
		if ( isset( $_SERVER['REMOTE_ADDR'] ) ) {
			if ( '89.212.119.6' === $_SERVER['REMOTE_ADDR'] || true ) {
				$args = func_get_args();
				foreach ( $args as $a ) {
					echo '<pre class="dump">';
					array_map( 'var_dump', $args );
					echo '</pre>';
				}
			}
		}
	}
}


/**
 * Completely remove comments
 */
add_action(
	'admin_init',
	function () {
		// Redirect any user trying to access comments page.
		global $pagenow;

		if ( 'edit-comments.php' === $pagenow ) {
			wp_safe_redirect( admin_url() );
			exit;
		}

		// Remove comments metabox from dashboard.
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );

		// Disable support for comments and trackbacks in post types.
		foreach ( get_post_types() as $post_type ) {
			if ( post_type_supports( $post_type, 'comments' ) ) {
				remove_post_type_support( $post_type, 'comments' );
				remove_post_type_support( $post_type, 'trackbacks' );
			}
		}
	}
);

// Close comments on the front-end.
add_filter( 'comments_open', '__return_false', 20, 2 );
add_filter( 'pings_open', '__return_false', 20, 2 );

// Hide existing comments.
add_filter( 'comments_array', '__return_empty_array', 10, 2 );

// Remove comments page in menu.
add_action(
	'admin_menu',
	function () {
		remove_menu_page( 'edit-comments.php' );
	}
);

// Remove comments links from admin bar.
add_action(
	'init',
	function () {
		if ( is_admin_bar_showing() ) {
			remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
		}
	}
);
