<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package EmigmaPress
 */

global $post, $post_type;

?>

<a href="<?php the_permalink(); ?>" class="post-item" id="post-<?php the_ID(); ?>" rel="article">

	<div class="content-wrapper d-flex position-relative flex-column">
		<p class="mb-1"> <?php the_date(); ?> </p>
		<h5><?php the_title(); ?></h5>            
		<span class="link"><?php esc_html_e( 'Preberite več', 'emigma' ); ?></span>            
	</div>
</a>
