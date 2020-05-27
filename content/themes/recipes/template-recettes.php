<?php
/*
Template Name: Page des recettes

Pour la définir, dans le BO, Pages > Page concernée (ici, Recettes) > Attributs de page > Modèle > le nom du template (ici: Page des recettes)
*/
?>

<?php get_header(); ?>

<main class='main-recipes'>
    <?php

    $args = [
        'post_type' => 'recettes', // Custom Post Type (ici, recettes)
    ];

    $wp_query = new WP_Query($args);

    if($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post();

        get_template_part('template-parts/article/article', 'card');

    endwhile; endif;

    wp_reset_postdata();
    ?>

</main>

<?php get_footer(); ?>
