<?php 

if (!function_exists('recipes_scripts')):

 function recipes_scripts() 
 {
     // chargement des styles css
    wp_enqueue_style(
        'recipes_style',
        get_theme_file_uri('/public/css/style.css'),
        [], // Pas de dépendances
        '1.0.0'
    );

    // Chargement du JS
    wp_enqueue_style(
        'recipes-app',
        get_theme_file_uri('public/js/app.js'),
        [],
        '0.0.1',
        true
    );
 }


endif;

add_action('wp_enqueue_script', 'recipe_scripts');
