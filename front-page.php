<?php

/**
 * Template Name: Front Page Template
 *
 *
 * @package EmigmaPress
 */

get_header(); ?>

    <div id="primary" class="site-content">
        <div id="content" role="main">

        THIS IS FRONTPAGE STUFF

            <?php
            while (have_posts()) :
                the_post();
                ?>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="entry-page-image">
                    <?php the_post_thumbnail(); ?>
                    </div><!-- .entry-page-image -->
                <?php endif; ?>

            <?php endwhile; // End of the loop. ?>

        </div><!-- #content -->
    </div><!-- #primary -->

<?php get_footer(); ?>
