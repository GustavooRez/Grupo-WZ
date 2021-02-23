<?php
$services = get_posts([
	'post_type' 	=> 'servicos',
	'numberposts' 	=> -1, 
]);
get_header();?>
<header>
  <div class="parallax_servicos" style="background-image: linear-gradient(to top,rgba(14,14,14,0.5) 1%,rgba(8,129,210,0.4) 6%), url(<?php (has_post_thumbnail()) ? the_post_thumbnail_url() : "" ?>);?>);">
  	<p class="servicos_titulo"> <?php the_title();?></p>
  </div>
</header>

<div class="titulo_servicos"><?php echo $post->post_content; ?></div>

<main class="services_body">
<?php if($services) : foreach($services as $service) :  ?>
<section id="<?php echo strtolower(remove_caracter($service->post_title)); ?>">
	<h3 class="titulo_servicos"> <?php echo $service->post_title; ?> </h3>

	<div class="flex_servicos">
			<div class="flex_servicos_image"><img class="imagem_servicos" src="<?php echo get_the_post_thumbnail_url($service) ?>"></div>

			<div class="flex_servicos_description">
				<img class="imagem_topografia" src="<?php the_field('logo_do_servico', $service->ID);?>">
				<div class="servicos_texto1">
					<?php echo $service->post_content; ?>
				</div>
			</div>
	</div>	
</section>

<?php endforeach; endif; ?>
<?php wp_reset_postdata(); ?>
</main>

<?php get_footer(); ?>