<?php

// Récupère les informations supplémentaires aux recettes ACF (créateur, préparation,  cuisson)
// C'est ACF qui permet donc de créer nos meta informations
function get_first_meta($post_id, $meta_name) 
{
    return get_post_meta($post_id, $meta_name, true);
}

// Récupère donc le nom de créateur de l'article
function get_creator($post_id)
{
    return get_first_meta($post_id, 'createur');
}

// Son temps de préparation
function get_preparation($post_id)
{
    return get_first_meta($post_id, 'preparation'). 'min';
}

// Son temps de cuisson
function get_cuisson($post_id)
{
    return get_first_meta($post_id, 'temps_de_cuisson'). 'min';
}

// Ses ingrédients
function get_recipe_ingredients($post_id)
{
    $html = '';

    $array_ingredients = wp_get_post_terms($post_id, "ingredient");
   // Wp_get_post_terms : méthode qui récupère les taxonomies d'un contenu
//    print_r($array_ingredients);


    foreach ($array_ingredients as $wp_term) 
    {

        $html .= '<a href="'.get_term_link($wp_term).'">';
        $html .= ucfirst($wp_term->name);
        $html .= '</a> ';

    }

    return $html;
}

// Ses types
function get_recipe_styles($post_id)
{
    $html = '';

    $array_style = wp_get_post_terms($post_id, "style");
   // Wp_get_post_terms : méthode qui récupère les taxonomies d'un contenu
   // print_r($array_style);


    foreach ($array_style as $wp_term) 
    {

        $html .= '<a href="'.get_term_link($wp_term).'">';
        $html .= ucfirst($wp_term->name);
        $html .= '</a> ';

    }
    return $html;
}

// Affiche la liste des catégories parents (ex : Plats, Entrées, Desserts)

function get_styles_list()
{

    $html = ''; 

    $list = get_terms([
        'taxonomy'      => 'style',
        'parent'        => 0, 
        'hide_empty'    => false // On veut TOUS les styles parents, même ceux qui n'ont pas de contenus associés
    ]);

        
    foreach ($list as $wp_term) 
    {

        $html .= '<a href="'.get_term_link($wp_term).'">';
        $html .= ucfirst($wp_term->name);
        $html .= '</a> ';

    }
    return $html;
}