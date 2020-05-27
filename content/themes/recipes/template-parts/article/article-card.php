<!--
    ====================================================== 
    ======= Articles présents sur la page recette ========
    ====================================================== 
-->

<article class='recipes'>
    <h2><?php the_title(); ?></h2>
    <div class='recipes-img'>
        <?php the_post_thumbnail(); ?>
    <div class='ingredient-list'>
        <h3>Ingrédients</h3>
        <div style="margin-bottom: 1em">
            <?= get_recipe_ingredients(get_the_ID()); ?>
        </div>
    </div>
    <div style="margin-bottom: 1em">
        <strong>Visible dans : </strong>
        <?= get_recipe_types(get_the_ID()); ?>
    </div>
    <a href="<?php the_permalink(); ?>">Lire la recette</a>
</article>