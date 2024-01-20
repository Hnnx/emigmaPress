<?php
/**
 * Custom post types and taxonomies can be added here.
 * Provided example is just boilerplate and is not getting called
 *
 * @package EmigmaPress
 */

?>

<?php
/**
 * Implements hook_help().
 */
function create_posttype() {
	register_post_type(
		'news',
		// CPT Options.
		array(
			'labels'      => array(
				'name'          => __( 'news' ),
				'singular_name' => __( 'news' ),
			),
			'public'      => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'news' ),
		)
	);
}
// Uncomment this to add CPT.
// add_action( 'init', 'create_posttype' );.
