<?php 

/*
Plugin Name: Custom Post Type Recettes
Description : Création d'un CPT pour rassembler nos recettes
Author: Marianne
Version: 1.0.0
*/

// Source pour création de Custom Post Field : https://codex.wordpress.org/Function_Reference/register_post_type

// Si pas de WPINC => On stop le script
if (!defined('WPINC')) {die();}

// class CptRecipes
// {
//     public function __constructor() 
//     {
//         add_action('init', [$this, 'register_cpt_recipes']);
        
//     }

//     public function register_cpt_recipes() 
//     {
//         $labels = [
//             "name"                  => "Recettes",
//             "singular_name"         => "Recette",
//             "menu_name"             => "Recettes",
//             "name_admin_bar"        => "Recette",
//             "add_new"               => "Ajouter une recette",
//             "add_new_item"          => "Ajouter une nouvelle recette",
//             "new_item"              => "Nouvelle recette",
//             "edit_item"             => "Editer la recette",
//             "view_item"             => "Voir la recette", 
//             "all_items"             => "Voir toutes les recettes",
//             "search_items"          => "Rechercher une recette",
//             "not_found"             => "Aucune recette trouvée",
//             "not_found_in_trash"    => "Aucune recette trouvée dans la corbeille",
//             "featured_media"        => "Image de la recette",
//             "set_featured_media"    => "Définir l'image de la recette",
//             "remove_featured_image" => "Retirer l'image de la recette",
//             "use_featured_media"    => "Utiliser l'image de la recette"
//         ];

//         $args = [
//             "labels"        => $labels,
//             "public"        => true, 
//             "menu_position" => 5,
//             "menu_icon"     => "dashicons-carrot",
//             "hierarchical"  => false,
//             "supports"      => [
//                 "title",
//                 "editor",
//                 "author",
//                 "thumbnail",
//                 "excerpt",
//                 "custom-fields"
//             ]
//         ];


//         register_post_type("recipes", $args);
//     }
// }

// $cptRecipes = new CptRecipes();

// La class ne fonctionne pas

function register_cpt_recipes() 
{
    $labels = [
        "name"                  => "Recettes",
        "singular_name"         => "Recette",
        "menu_name"             => "Recettes",
        "name_admin_bar"        => "Recette",
        "add_new"               => "Ajouter une recette",
        "add_new_item"          => "Ajouter une nouvelle recette",
        "new_item"              => "Nouvelle recette",
        "edit_item"             => "Editer la recette",
        "view_item"             => "Voir la recette", 
        "all_items"             => "Voir toutes les recettes",
        "search_items"          => "Rechercher une recette",
        "not_found"             => "Aucune recette trouvée",
        "not_found_in_trash"    => "Aucune recette trouvée dans la corbeille",
        "featured_media"        => "Image de la recette",
        "set_featured_media"    => "Définir l'image de la recette",
        "remove_featured_image" => "Retirer l'image de la recette",
        "use_featured_media"    => "Utiliser l'image de la recette"
    ];

    $args = [
        "labels"        => $labels,
        "public"        => true, 
        "menu_position" => 5,
        "menu_icon"     => "dashicons-carrot",
        "hierarchical"  => false,
        "supports"      => [
            "title",
            "editor",
            "author",
            "thumbnail",
            "excerpt",
            "custom-fields"
        ]
    ];


    register_post_type("recettes", $args);
}

add_action('init', 'register_cpt_recipes');
