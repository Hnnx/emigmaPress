<?php

/**
 * Template Name: Full Width
 *
 *  Use this to break free from .containers
 *
 * @package EmigmaPress
 */

get_header();
?>

<div class="wrapper py-0" id="page-wrapper">

    <div id="content" tabindex="-1">


        <main class="site-main" id="main">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <?php while (have_posts()) :
                            the_post(); ?>
                            <?php the_content(); ?> 
                        <?php endwhile; // end of the loop. ?>
                    </div>
                </div>
            </div>

        </main><!-- #main -->

    </div> <!-- .row -->

</div><!-- Container end -->
<?php get_footer(); ?>
