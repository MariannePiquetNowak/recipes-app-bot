<?php 
/*
Affiche les archives des recettes 
Permet donc d'être reliée par types, ingrédients
*/ 
?>

<?php get_header(); ?>

<main class="main-archive">
    <?php
        if(have_posts()): while(have_posts()): the_post();

            get_template_part('template-parts/article/article', 'archive');

        endwhile; endif; 
    ?>
</main>

<?php get_footer(); ?>


