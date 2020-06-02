<!--
    ====================================================== 
    ======= Articles présents sur la page archives =======
    ====================================================== 
-->

<article class='recipes'>
    <h2><?php the_title(); ?></h2>
    <div class='recipes-img'>
        <?php the_post_thumbnail(); ?>
    </div>
    <p><strong>En résumé : </strong><?php the_excerpt(); ?></p>
    <ul>
        <li><strong>Créateur</strong> : <?= get_creator(get_the_ID()); ?></li> 
        <li><strong>Préparation</strong> : <?= get_preparation(get_the_ID()); ?></li> 
        <li><strong>Cuisson</strong> : <?= get_cuisson(get_the_ID()); ?></li> 
    </ul>
    <div class='ingredient-list'>
        <h3>Ingrédients</h3>
        <div style="margin-bottom: 1em">
            <?= get_recipe_ingredients(get_the_ID()); ?>
        </div>
    </div>
    <div style="margin-bottom: 1em">
        <strong>Visible dans : </strong>
        <?= get_recipe_styles(get_the_ID()); ?>
    </div>
    <a href="<?php the_permalink(); ?>">Lire la recette</a>
</article>