<?php get_header();

if(have_posts()):
    while(have_posts()):
        the_post();
        ?>
        <h2> <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a> </h2>
        <p><span><?php the_date() ?></span><span><?php the_author() ?></span><span><?php the_category() ?></span></p>
        <p><?php the_excerpt() ?></p>
        <?php
    endwhile;
else:
    echo 'no hay resultados para tu busqueda';

endif;

get_footer() ?>