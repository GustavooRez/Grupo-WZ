
<?php get_header(); ?>
<header>

  <div class="parallax_blog" style="background-image: linear-gradient(to top,rgba(14,14,14,0.5) 1%,rgba(8,129,210,0.4) 6%), url(<?php echo get_template_directory_uri(); ?>/img/header_blog.png)">
  	<p class="blog_titulo"> NOVIDADES</p>
  </div>
</header>
<section id="post">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="caixa_post">
    <img class="post_imagem" src="<?php the_field("imagem_post");?>">
    <br/>
      <div class="conteudo_post">
        <p class="titulo_post"><?php the_title(); ?></p>
        <p class="data_post"><?php the_date();?></p>
        <p class="content_post"><?php the_excerpt(); ?></p>
      </div>
      <div class="saiba_button header_btn">
        <a class="waves-effect waves-light btn hoverable z-depth-2" href="<?php the_permalink(); ?>" target="_blank"><div id="leia_mais">Leia mais</div></a>
      </div>

</div>
<?php endwhile;
        endif; ?>
</section>
<?php get_footer(); ?>