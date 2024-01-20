<?php

/**
 * The template for displaying all single posts.
 *
 * @package EmigmaPress
 */

get_header();

?>


<div class="wrapper" id="single-wrapper">

    <div id="content" tabindex="-1">

        <div class="container">
            <div class="row">

            <?php while (have_posts()) :
                the_post(); ?>
                <div class="col-12">
                    <main class="site-main" id="main">
                        <?php get_template_part('template-loop/content-single', get_post_type()); ?>
                    </main>
                </div>
            
            <?php endwhile;
            wp_reset_postdata(); ?>

            </div>
        </div>

    </div>

</div>

<?php get_footer(); ?>
