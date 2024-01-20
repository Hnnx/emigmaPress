<?php
/**
 * Template Name: Front Page Template
 *
 * @package EmigmaPress
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">		
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
