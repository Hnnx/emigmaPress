<?php
/**
 * Template for displaying single posts
 *
 * @package EmigmaPress
 */

global $post;

?>

<div class="container">
	<div class="row">
		<div class="col-6 mx-auto">
			
			<h1>Contained</h1>

			<img src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" alt="">

		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-12 mx-auto p-0">
			<h1>Fullwidth</h1>
		</div>
	</div>
</div>




