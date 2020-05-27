<!--
    ====================================================== 
    ====== Articles présents sur l'url de la recette =====
    ====================================================== 
-->

<article class='recipes'>
    <h2><?php the_title(); ?></h2>
    <div class='recipes-img'>
        <?php the_post_thumbnail(); ?>
    </div>
    <p><?php the_content(); ?></p>
    <ul>
        <li><strong>Créateur</strong> : <?= get_creator(get_the_ID()); ?></li> 
        <li><strong>Préparation</strong> : <?= get_preparation(get_the_ID()); ?></li> 
        <li><strong>Cuisson</strong> : <?= get_cuisson(get_the_ID()); ?></li> 
    </ul>
    <div class='ingredient-list'>
    <h3>Ingrédients</h3>
        <ul>
            <li>
                <?= get_recipe_ingredients(get_the_ID()); ?>
            </li>
        </ul>
    </class=>
    <div>
        <strong>Visible dans : </strong>
        <?= get_recipe_types(get_the_ID()); ?>
    </div>
</article>