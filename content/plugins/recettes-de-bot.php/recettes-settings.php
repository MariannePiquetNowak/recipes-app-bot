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

// 1) mon CPT Recettes
require plugin_dir_path(__FILE__) . 'inc/recipe_cpt.php';

// 2) La création des rôles pour accéder au dashboard
require plugin_dir_path(__FILE__) . 'inc/role.php';

// 3) Rest API
require plugin_dir_path(__FILE__) . 'inc/rest-api.php';


// CPT RECETTES + TAXO 
$recipes_cpt = new Recipes_Cpt();

register_activation_hook(__FILE__, [$recipes_cpt, 'recipes_activate']);
register_deactivation_hook(__FILE__, [$recipes_cpt, 'recipes_desactivate']); 



// ROLES
// Source : https://codex.wordpress.org/fr:R%C3%B4les_et_Capacit%C3%A9s

$recipesRole = new RecipesRole();

register_activation_hook(__FILE__, [$recipesRole, 'role_activate']);
register_deactivation_hook(__FILE__, [$recipesRole, 'role_deactivate']); 


/// REST API 
// $recipesApi = new RecipesApi();
