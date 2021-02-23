<?php get_header(); ?>

<div class="parallax_container">
  <div class="parallax_blog" style="background-image: linear-gradient(to top,rgba(8,129,210,0.4) 1%,rgba(8,129,210,0.4) 6%), url(<?php the_field("imagem_blog")?>">
  	<p class="blog_titulo"> <?php the_field("titulo_blog"); ?></p>
  </div>
</div>

<section id="post">
<?php $lastposts = get_posts( array(
    'posts_per_page' => 600
) );
 
if ( $lastposts ) {
    foreach ( $lastposts as $post ) :
        setup_postdata( $post ); ?>
            <div class="caixa_post">
                <img class="post_imagem" src="<?php echo get_the_post_thumbnail_url(); ?>">
                <div class="conteudo_post">
                    <p class="titulo_post"><?php the_title(); ?></p>
                    <p class="data_post"><?php the_date();?></p>
                    <p class="content_post"><?php
                        $content = get_the_content();
                        $resumo = substr($content, 0, 300).' …';
                        echo $resumo;
                    ?>
                </div>
                <div class="saiba_button header_btn">
                    <a class="waves-effect waves-light btn hoverable z-depth-2" href="<?php the_permalink(); ?>" target="_blank"><div id="leia_mais">Leia mais</div></a>
                </div>
            </div>
    <?php
    endforeach; 
    wp_reset_postdata();
}?>
</section>
<?php get_footer(); ?>