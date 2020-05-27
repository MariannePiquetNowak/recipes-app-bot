<!--
    ====================================================== 
    ======== Articles présents sur la front-page =========
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
    <aside>
    <h3>Ingrédients</h3>
    <ul>
        <?= get_recipe_ingredients(get_the_ID()); ?>
    </ul>
    </aside>
    <div>
        <strong>Visible dans : </strong>
        <?= get_recipe_types(get_the_ID()); ?>
    </div>
    <a href="<?php the_permalink(); ?>">Lire la recette</a>
</article>