<?php

if (!function_exists('recipes_setup')) :

    function recipes_setup() {

        // Ajout de la balise title
        add_theme_support('title-tag');

        // Ajout du support des posts thumbnails
        add_theme_support('post-thumbnails');

        // // Je déclare à WP que mon thème supporte les menus
        // add_theme_support('menu');

        // // Comme je fait un register_nav_menus, le add_theme_support est automatiquement exe
        // register_nav_menus([
        //     'menu_header' => 'Menu de navigation en haut de la page'
        // ]);



    }

endif;

add_action('after_setup_theme', 'recipes_setup');