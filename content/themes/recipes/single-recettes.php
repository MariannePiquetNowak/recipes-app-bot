<?php
/*
    ====================================================== 
    ===== Affiche l'article de la recette en question ====
    ATTENTION : toujours nommé le template single-$cpt.php 
            bien marquer le nom complet du cpt
    ====================================================== 
*/
?>

<?php get_header(); ?>

<main class="main-recette">
    <?php
        if(have_posts()): while(have_posts()): the_post();

            get_template_part('template-parts/article/article', 'full');

        endwhile; endif; 
    ?>
</main>

<?php get_footer(); ?>