<?php
// Functions will here

if (! function_exists('recipes_scripts')) : 

    /**
     * Enqueues stylesheets : Charge les scripts scss
     **/

    function recipes_scripts() {
        wp_enqueue_style('recipes_scripts', get_stylesheet_uri('./app/assets/scss/index.scss'));
    }

    endif;

    add_action('wp_enqueue_scripts', 'recipes_scripts');