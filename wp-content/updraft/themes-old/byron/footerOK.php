<?php

$menuLocations = get_nav_menu_locations();
$menuID = $menuLocations['social'];
$socialItems = wp_get_nav_menu_items($menuID); 
?>


<!-- 
    Arquivo para o código do footer da página,
    footer = rodapé da página
-->
<footer class="page-footer">
	<div class="footer">
		<div class="esquerda_footer">
			<div class="fale-conosco"><?php echo strtoupper(get_theme_mod('section_title_settings')); ?></div>
			<div class="padfoter"><p class="contato_footer"><i class="fas fa-phone"></i><?php echo get_theme_mod('phone_settings'); ?></p></div>
			<div class="padfoter"><p class="contato_footer"><i class="fas fa-phone"></i><?php echo get_theme_mod('cellphone_settings'); ?></p></div>			
			<div class="padfoter"><p class="contato_footer"><i class="fas fa-envelope-square"></i><?php echo get_theme_mod('email_settings'); ?></p></div>			
			<div class="padfoter"><p class="contato_footer"><i class="fas fa-map-marker-alt"> </i> <?php echo get_theme_mod('address_settings');?></p></div>
		</div>

		<div class="direita_footer">
			<div><img class="logo_footer" src="<?php echo get_theme_mod('footer_logo_settings')?>"></div>
			<div>
				<?php if($socialItems) : foreach($socialItems as $item) :  ?>
					<a href="<?php echo $item->url ?>" target="_blank">
						<?php echo SocialIcons::getSocialIcon($item->title); ?>
					</a>
				<?php endforeach; endif; ?>
			<div>
		</div>            
</footer>			

	



	<footer>

		<div class="footer-copyright">
			<div class="desenvolvido">
				<p> Desenvolvido por: </p>
				<a href="https://byronsolutions.com" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/logo_byron.png"></a>
			</div>
		</div>

	</footer>

<?php wp_footer() ?>
</body>
</html>