<?php 

/*
Plugin Name: Custom Post Type Recettes de bot
Description : Création d'un CPT pour rassembler nos recettes
Version: 1.0.0
*/

// Source pour création de Custom Post Field : https://codex.wordpress.org/Function_Reference/register_post_type

// On empêche l'exécution du plugin en dehors du contexte
if (!defined('WPINC')) {die();}

// Inclusion des différentes classes nécessaire au plugin
require plugin_dir_path(__FILE__) . 'inc/recipe_cpt.php';

// CPT RECETTES + TAXO 
$recipes_cpt = new Recipes_Cpt();

register_activation_hook(__FILE__, [$recipes_cpt, 'recipes_activate']);
register_deactivation_hook(__FILE__, [$recipes_cpt, 'recipes_desactivate']); 