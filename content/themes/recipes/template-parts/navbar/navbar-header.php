<!-- <a href="#">Recettes</a>
<a href="#">Au Hasard</a>
<a href="#">Galerie</a>
<a href="#">Concours</a> -->

<?php 
// Création du menu dynamique : 

$menu = wp_nav_menu([
    'theme_location'    => 'menu_header', // visible dans theme-setup.php
    'container_class'   => 'navbar-header', // le container est par défaut une <div> et on lui donne la class navbar-header
    'echo'              => false // On lui demande de ne pas afficher le menu mais de nous le donner
]);

$menu = strip_tags($menu, '<a><div>'); 
// On lui demande de tout enlever sauf les éléments de type <a> et <div>

$menu = str_replace('a href', 'a class="navbar-item" href', $menu);
// pour chaque élément "a href" du menu, on lui ajoute une class

echo $menu;
?>

<?php 
/*
Dans le BO : Apparence > Menus > Options de l'écran > cocher Recettes
Il apparait dans "Ajouter des éléments de menus"
Cliquer sur Recettes > Afficher tout > Cocher "Archives des recettes" => Il s'affiche dans "Structure du menu", le renommer. 
On peut ajouter les pages, les articles etc.
Cocher "Menu de navigation en haut de la page"

source wp_nav_menu() => https://developer.wordpress.org/reference/functions/wp_nav_menu/
*/
?>