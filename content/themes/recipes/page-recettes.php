<?php 
/*
Template Name: Modèle de page de recettes
*/ 
?>

<?php get_header(); ?>

<section class="recipes-list" style="color: black">

<!-- Affiche mes recettes sur la front-page -->
    <?php 

    $args = [
        'post_type' => 'recettes'
    ];

    $wp_query = new WP_Query($args);

    if($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post();

        get_template_part('template-parts/recettes');

endwhile; endif;

wp_reset_postdata();
?>
</section>
<?php get_footer(); ?>