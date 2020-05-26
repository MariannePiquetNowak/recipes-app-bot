<?php

if (!function_exists('recipes_setup')) :

    function recipes_setup() 
    {

        // Ajout de la balise title
        add_theme_support('title-tag');

        // Ajout du support des images
        add_theme_support('post-thumbnails');

       // Menu navbar 
       register_nav_menus([
           'menu_header' => 'Menu de navigation en haut de la page',
       ]);
    }

endif;

add_action('after_setup_theme', 'recipes_setup');