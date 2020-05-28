<?php
/*
Template Name : Galerie
*/

?>

<?php get_header(); ?>

<main class='galerie'>
    <?php
        $args = [
            'post_type' => 'recettes'
        ];

        $wp_query = new WP_Query($args);

        if($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post();

            get_template_part('template-parts/galerie/galerie', 'card');

        endwhile; endif;
    ?>
</main>

<?php get_footer(); ?>

