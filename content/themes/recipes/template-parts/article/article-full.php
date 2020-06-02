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
    <p><?php the_content(); ?></p>
    <div>
        <strong>Visible dans : </strong>
        <?= get_recipe_styles(get_the_ID()); // Voir dans /inc/theme-template-tags.php ?>
    </div>

    <!-- Fonction qui me permet de repasser sur le BO pour éditer la recette si je suis connectée-->
    <?php if (current_user_can('edit_recettes')) : ?>

        <a href="<?= admin_url('post.php?post='.get_the_ID().'&action=edit' ); ?>">Editer la recette</a>

    <?php endif; ?>
</article>