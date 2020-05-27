<!-- HEADER -->
<?php get_header(); ?>


    <!-- MAIN -->
    <main class="main">

        <!-- Affiche mes recettes sur la front-page -->
            <?php 

            $args = [
                'post_type' => 'recettes', // Cpt recettes
                'posts_per_page' => 1
            ];

            $wp_query = new WP_Query($args);

            if($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post();

                get_template_part('template-parts/article/article', 'excerpt'); // Charge article-excerpt.php

        endwhile; endif;

        wp_reset_postdata();
        ?>

</main>
    <!-- FOOTER -->
   
<?php get_footer(); ?>