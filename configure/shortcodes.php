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
 * Simply call <?php echo do_shortcode( '[boilerplate_shortcode arg_name=41998]');?> anywhere in the code or
 * [boilerplate_shortcode arg_name=41998] on the frontend.
 *
 * Return ob_get_clean helps with certain site builders
 *
 * @param argument $argument if no argument is passed, a default can be set.
 */
function boilerplate_shortcode( $argument )
{

    $args = shortcode_atts(
        array(
        'arg_name' => 'default_value',
        ),
        $argument
    );
    ob_start();

    ?>

    <?php lvar_dump($argument); ?>


    <?php
    return ob_get_clean();
}
add_shortcode('boilerplate_shortcode', 'boilerplate_shortcode');