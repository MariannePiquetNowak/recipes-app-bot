<?php
/*
Template Name: Page des recettes
*/
?>

<?php get_header(); ?>

<main class='main-recipes'>
    <?php

    $args = [
        'post_type' => 'recettes', // Cpt recettes
    ];

    $wp_query = new WP_Query($args);

    if($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post();

        get_template_part('template-parts/article/article', 'card');

    endwhile; endif;

    wp_reset_postdata();
    ?>

</main>

<?php get_footer(); ?>
