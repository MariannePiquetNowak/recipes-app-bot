<section class='recipes'>
    <a href=<?php the_permalink(); ?>><?php the_title(); ?></a>
    <p><?php the_excerpt(); ?></p>
    <div class='recipes-img'>
        <?php the_post_thumbnail(); ?>
    </div>
</section>