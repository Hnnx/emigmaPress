<?php
/**
 * Shortcodes.
 *
 * @package EmigmaPress
 */

?>

<?php

/**
 * Example of a shortcode with parameters.
 * Call <?php echo do_shortcode( '[boilerplate_shortcode arg_name=41998]');?> anywhere in the code or
 * [boilerplate_shortcode arg_name=41998] on the frontend.
 *
 * Return ob_get_clean helps with some site builders
 *
 * @param argument $argument if no argument is passed, a default can be set.
 */
function boilerplate_shortcode( $argument ) {

	$args = shortcode_atts(
		array(
			'arg_name' => 'default_value',
		),
		$argument
	);
	ob_start();

	?>


<div class="container">
	<div class="row">
		<div class="col-12 col-lg-4 mx-auto">
			<h2 class="text-primary">I Should be blue</h2>
		</div>
	</div>
</div>

	<?php var_dumpl( $argument ); ?>


	<?php
	return ob_get_clean();
}
add_shortcode( 'boilerplate_shortcode', 'boilerplate_shortcode' );




/**
 * Simple SC
 */
function simple_sc() {

	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => 4,
		'order'          => 'DESC',
	);

	$query = new WP_Query( $args );

	ob_start();

	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) : $query->the_post();
			get_template_part( 'template-loop/content', 'post' );
		endwhile;
		wp_reset_postdata();
	else :
		echo 'No posts found';
	endif;

	return ob_get_clean();
}
add_shortcode( 'simple_sc', 'simple_sc' );
