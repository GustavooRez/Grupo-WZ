<?php get_header(); ?>
    <div class="post_container container">
        <?php         if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <p class="titulo_single"><?php the_title(); ?></p>
        <p class="content_single"><?php the_content () ?></p>
        <p class="seta_single"><i class="fas fa-arrow-left"><a href="localhost/GrupoWZ/blog">Ver todos os artigos.</a></p></i>

    <?php
    endwhile;
    endif ?>
    </div>

<?php get_footer(); ?>