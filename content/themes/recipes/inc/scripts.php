<?php

if (!function_exists('recipes_scripts')) :

    function recipes_scripts() {


        wp_enqueue_style(
            'recipes-style',
            get_theme_file_uri('public/css/style.css'),
            [],
            '1.0.1'
        );

        wp_enqueue_script(
            'recipes-app',
            get_theme_file_uri('public/js/app.js'),
            [],
            '0.0.1',
            true
        );

    }

endif;

add_action('wp_enqueue_scripts', 'recipes_scripts');