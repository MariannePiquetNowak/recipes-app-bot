<?php
/*
Template Name: Page Au Hasard
*/
?>

<?php get_header(); ?>

<main class='main-recipes'>
    <?php

    $args = [
        'post_type'     => 'recettes', // Custom Post Type (ici, recettes)
        'posts_per_page' => 1,
        'orderby'       => 'rand' // Random
    ];

    $wp_query = new WP_Query($args);

    if($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post();

        get_template_part('template-parts/article/article', 'full');

    endwhile; endif;

    ?>

</main>

<?php get_footer(); ?>