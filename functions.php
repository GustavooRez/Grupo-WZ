<?php



/*
*    Arquivo para inserir as configurações do Wordpress
*    Existem diversas configurações que o Wordpress disponibiliza para criação de temas
*    e elas devem ser escritas nesse arquivo
*/


if (class_exists('Redux')) {
	require_once 'inc/theme-customizer-redux.php';
	require_once 'inc/theme-customizer-redux-sections.php';
}

function byron_styles(){
	// Inserir: outros arquivos css se necesśario
	wp_enqueue_style('materialize', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css', array(), '');
	wp_enqueue_style('material_icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', array(), '');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css', false);
	wp_enqueue_style('aos', get_template_directory_uri() . "/css/aos.css", array(), '');
	
	
	// Inserir: outros arquivos javascript se necesśario
	wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', array(), false, true );
	wp_enqueue_script( 'materialize_js', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array("jquery"), false, true );
	wp_enqueue_script( 'navbar_animation', get_template_directory_uri() . '/js/navbar_animation.js', array('jquery'), false, true);
	wp_enqueue_script( 'aos', get_template_directory_uri() . '/js/aos.js', array(), false, true );
	wp_enqueue_script('slick_js', get_template_directory_uri() . '/js/slick.min.js', array(), false, true);
	wp_enqueue_script('slick', "https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js", array(), false, true);
	wp_enqueue_script('fontawesome', "https://kit.fontawesome.com/dfb8742735.js", array(), false, true);
	
}

add_action('wp_enqueue_scripts', 'byron_styles');

function byron_menus() 
{
	register_nav_menus(
		array(
			'primary' 	=> 	__('Barra de Navegação'),
			'social'	=>	__('Menu Social'),
		)
	);
}
add_action( 'init', 'byron_menus' );

function get_excerpt(){
	$excerpt = get_the_content();
	$excerpt = preg_replace(" ([.*?])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, 20);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
	return $excerpt;
}

add_filter('jpeg_quality', function($arg){return 100;});

// Our custom post type function
function create_posttype() {

	register_post_type( 'servicos',
		// CPT Options
		array(
			'labels' => array(
				'name' 			=> __( 'Serviços' ),
				'singular_name' => __( 'Serviço' )
			),
			'public' 		=> true,
			'has_archive' 	=> false,
			'rewrite' 		=> array('slug' => 'servicos'),
			'supports' 		=> array('title', 'editor','thumbnail', 'excerpt'),
			'menu_icon'	=> 'dashicons-clipboard'
			)
	);

	register_post_type( 'clientes',
		// CPT Options
		array(
			'labels' => array(
				'name' 			=> __( 'Clientes' ),
				'singular_name' => __( 'Cliente' )
			),
			'public' 		=> true,
			'has_archive' 	=> false,
			'rewrite' 		=> array('slug' => 'clientes'),
			'supports' 		=> array('title', 'editor','thumbnail', 'excerpt'),
			'menu_icon'		=> 'dashicons-businessperson'
			)
	);

	register_post_type( 'bases',
	// CPT Options
	array(
		'labels' => array(
			'name' 			=> __( 'Bases' ),
			'singular_name' => __( 'Base' )
		),
		'public' 		=> true,
		'has_archive' 	=> false,
		'rewrite' 		=> array('slug' => 'bases'),
		'supports' 		=> array('title','thumbnail', 'excerpt'),
		'menu_icon'		=> 'dashicons-admin-multisite',
		'taxonomies'		=> array('category'),
	)
);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );


// Adding thumbnail support for the theme
if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

	// additional image sizes
	// delete the next line if you do not need additional image sizes
	add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
}

// Add a custom logo place to be puted
function themename_custom_logo_setup() {
	$defaults = array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

function remove_caracter($string) {
	$string = preg_replace(array("/á/","/à/","/â/","/ã/","/ä/"),"a", $string);
	$string = preg_replace(array("/Á/","/À/","/Â/","/Ã/","/Ä/"), "A", $string);
	$string = preg_replace(array("/é/", "/è/", "/ê/"), "e", $string);
	$string = preg_replace(array("/É/", "/È/", "/Ê/"), "E", $string);
	$string = preg_replace(array("/í/","/ì/"), "i", $string);
	$string = preg_replace(array("/Í/","/Ì/"), "I", $string);
	$string = preg_replace(array("/ó/","/ò/","/ô/","/õ/","/ö/"), "o", $string);
	$string = preg_replace(array("/Ó/","/Ò/","/Ô/","/Õ/","/Ö/"), "O", $string);
	$string = preg_replace(array("/ú/","/ù/","/ü/"), "u", $string);
	$string = preg_replace(array("/Ú/","/Ù/","/Ü/"), "U", $string);
	$string = preg_replace("/ç/", "c", $string);
	$string = preg_replace("/Ç/", "C", $string);
	//$string = preg_replace("/[][><}{)(:;,!?*%~^`@]/", "", $string);
		//$string = preg_replace("/ /", "_", $string);
	return $string;
}


class BaseCard{

	public $ID;
	public $post_name;
	public $post_title;
	public $category_main;
	public $category_sub;
	public $sede_description;
	public $equipe_description;
}

class BaseCategory{

	private $base_categories;
	private $base_id;
	private $categories;
	private $post_type = 'bases';
	private $base_category_titles = array();

	public function __construct($base_categories, $base_id){
		$this->base_categories = $base_categories;
		$this->base_id;
		$this->categories = $this->getCategoriesOfBases();	
		$this->base_category_titles = $this->getBaseCategoriesTitles($base_categories);
	}

	public function getMainCategoryTitle(){
			if(array_key_exists('sedes', $this->base_category_titles))
				return $this->base_category_titles['sedes'];
			elseif (array_key_exists('filial', $this->base_category_titles))
				return $this->base_category_titles['filial'];
			else
				return $this->base_category_titles['equipes'];
	}

	public function getSubCategoryTitle(){
		return $this->base_category_titles['equipes'];
	}

	
	private function getBaseCategoriesTitles($base_categories){
		$categories_titles = array();
		foreach($base_categories as $base_category)
			$categories_titles[$base_category->slug] = $base_category->name;
		return $categories_titles;
	}


	private function getCategoriesOfBases(){
		$args = array(
			'type'		=> $this->post_type,
			'taxonomy' 	=> 'category',
			'orderby' 	=> 'name',
			'order'   	=> 'ASC'
		);
		
		return get_categories($args);
	}
}

class BaseDescription{

	private $sede_description;
	private $equipe_description;

	public function __construct($base_id){
		if(get_field('sedes', $base_id))
			$this->sede_description = get_field('sedes', $base_id);
		if (get_field('equipes', $base_id))
			$this->equipe_description = get_field('equipes', $base_id);
	}

	public function getSedeDescription(){
		return $this->sede_description;
	}

	public function getEquipeDescription(){
		return $this->equipe_description;
	}
}

/**
 * #Todo: Refactor the code
 * #Todo: Separete this Class into another file
 * #Todo: Create a Class for Categories from the Bases Post Type;
 */

class Base{
	private static $base_class_color 		= "base";
	private static $branch_class_color 		= "branch";
	private static $team_class_color		= "team";
	private static $none					= "none";
	private static $base_category_slug 		= "sedes";
	private static $branch_category_slug	= "filial";
	private static $team_category_slug		= "equipes";
	private static $states_abreviations		= array(
													'tocantins'			  => "toca", 
													'rio-grande-do-norte' => 'rn', 
													'mato-grosso-do-sul'  => 'mgs', 
													'rio-grande-do-sul'   => 'rgs',
													'minas-gerais'		  => 'mg');
	private static $category_titles = array();
	private static $bases_and_category_data = array();
	private static $base_card;


	public static function getBasesAndCategoriesData($bases){
		
		foreach($bases as $base){
			self::$base_card = new BaseCard();
			$base_description = new BaseDescription($base->ID);
			$base_category = new BaseCategory(get_the_category($base->ID), $base->ID);

			self::$base_card->ID 					= $base->ID;
			self::$base_card->post_title 			= $base->post_title;
			self::$base_card->post_name 			= $base->post_name;
			self::$base_card->category_main 		= $base_category->getMainCategoryTitle();
			self::$base_card->category_sub 			= $base_category->getSubCategoryTitle();			
			self::$base_card->sede_description 		= $base_description->getSedeDescription();
			self::$base_card->equipe_description 	= $base_description->getEquipeDescription();


			self::$bases_and_category_data[] = self::$base_card;
		}

		return self::$bases_and_category_data;
	}

	public static function setStateClassColor($bases, $state){
		$state = self::prepareState($state);
		if(self::isBase($bases, $state))
			return self::getBaseClassColor();
		else if (self::isBranch($bases, $state))
			return self::getBranchClassColor();
		else if(self::isTeam($bases,$state))
			return self::getTeamClassColor();
		else
			return self::getNoneClassColor();
	}

	public static function getStateSlug($post_name){
		if(in_array($post_name,array_keys(self::$states_abreviations)))
			return self::$states_abreviations[$post_name];
		else
			return str_replace("-", "", $post_name);
	}

	private static function isBase($bases, $state){
		return self::checkIfBaseHasCategoryAndState($bases, $state, self::$base_category_slug);
	}

	private static function isBranch($bases, $state){
		return self::checkIfBaseHasCategoryAndState($bases, $state, self::$branch_category_slug);
	}

	private static function isTeam($bases, $state){
		return self::checkIfBaseHasCategoryAndState($bases, $state, self::$team_category_slug);
	}

	private static function getBaseClassColor(){
		return self::$base_class_color;
	}

	private static function getBranchClassColor(){
		return self::$branch_class_color;
	}

	private static function getTeamClassColor(){
		return self::$team_class_color;
	}

	private static function getNoneClassColor(){
		return self::$none;
	}

	private static function prepareState($state){
		return strtolower(str_replace(" ", "-",self::removeCaracter($state)));
	}

	private static function removeCaracter($string) {
		$string = preg_replace(array("/á/","/à/","/â/","/ã/","/ä/"),"a", $string);
		$string = preg_replace(array("/Á/","/À/","/Â/","/Ã/","/Ä/"), "A", $string);
		$string = preg_replace(array("/é/", "/è/", "/ê/"), "e", $string);
		$string = preg_replace(array("/É/", "/È/", "/Ê/"), "E", $string);
		$string = preg_replace(array("/í/","/ì/"), "i", $string);
		$string = preg_replace(array("/Í/","/Ì/"), "I", $string);
		$string = preg_replace(array("/ó/","/ò/","/ô/","/õ/","/ö/"), "o", $string);
		$string = preg_replace(array("/Ó/","/Ò/","/Ô/","/Õ/","/Ö/"), "O", $string);
		$string = preg_replace(array("/ú/","/ù/","/ü/"), "u", $string);
		$string = preg_replace(array("/Ú/","/Ù/","/Ü/"), "U", $string);
		$string = preg_replace("/ç/", "c", $string);
		$string = preg_replace("/Ç/", "C", $string);
		//$string = preg_replace("/[][><}{)(:;,!?*%~^`@]/", "", $string);
		//$string = preg_replace("/ /", "_", $string);
		return $string;
	}

	private static function checkIfBaseHasCategoryAndState($bases, $state, $category_slug){
		foreach($bases as $base){
			if(has_category($category_slug, $base) && $base->post_name == $state){
				return true;
			}
		}
		return false;
	}
	
}

/**
 * #Todo: Separete this Class into another file.
 */

/**
* Contains methods for customizing the theme customization screen.
* 
* @link http://codex.wordpress.org/Theme_Customization_API
* @since MyTheme 1.0
*/
class MyTheme_Customize {
	/**
	* This hooks into 'customize_register' (available as of WP 3.4) and allows
	* you to add new sections and controls to the Theme Customize screen.
	* 
	* Note: To enable instant preview, we have to actually write a bit of custom
	* javascript. See live_preview() for more.
	*  
	* @see add_action('customize_register',$func)
	* @param \WP_Customize_Manager $wp_customize
	* @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
	* @since MyTheme 1.0
	*/
	public static function register ( $wp_customize ) {
		//1. Define a new section (if desired) to the Theme Customizer
		$wp_customize->add_section( 'footer_section', 
		array(
			'title'       => __( 'Rodapé'), //Visible title of section
			'priority'    => 35, //Determines what order this appears in
			// 'capability'  => 'edit_theme_options', //Capability needed to tweak
			'description' => __('Seção voltada para a customização dos conteúdos do rodapé do site'), //Descriptive tooltip
			) 
		);

		self::buildCustomizeSettings($wp_customize, 'section_title_settings');

		$wp_customize->add_control('section_title_settings', array(
			'label'			=> 	__('Titulo do rodapé'),
			'description'	=>	__('Titulo a ser exibida no rodapé'),
			'section'		=>	'footer_section',
			'type'			=>	'text	'
		));

		self::buildCustomizeSettings($wp_customize, 'footer_logo_settings');

		$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'footer_logo_settings', array(
			'label'			=> 	__('Logo do rodapé'),
			'description'	=>	__('Image a ser exibida no rodapé'),
			'section'		=>	'footer_section',
			'type'			=>	'image'
		)));

		self::buildCustomizeSettings($wp_customize, 'phone_settings');
		
		$wp_customize->add_control('phone_settings', array(
			'type'		=>	'tel',
			'label'		=>	'Telefone',
			'description'	=>	__('Insira o telefone da sua empresa'),
			'section'		=>	'footer_section',
		));

		self::buildCustomizeSettings($wp_customize, 'cellphone_settings');
		
		$wp_customize->add_control('cellphone_settings', array(
			'type'		=>	'tel',
			'label'		=>	'Celular',
			'description'	=>	__('Insira o celular da sua empresa'),
			'section'		=>	'footer_section',
		));

		self::buildCustomizeSettings($wp_customize, 'email_settings');

		$wp_customize->add_control('email_settings', array(
			'type'		=>	'email',
			'label'		=>	'Email',
			'description'	=>	__('Insira o email da sua empresa'),
			'section'		=>	'footer_section',
		));
		
		self::buildCustomizeSettings($wp_customize, 'address_settings');

		$wp_customize->add_control('address_settings', array(
			'type'		=>	'textarea',
			'label'		=>	'Endereço',
			'description'	=>	__('Insira o endereço da sua empresa.'),
			'section'		=>	'footer_section',
		));
	}
	
	private static function buildCustomizeSettings($wp_customize, $settings_id){
		return $wp_customize->add_setting(
			$settings_id, //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
			array(
				'default'    => '', //Default setting/value to save
				'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
				'transport'  => 'refresh', 
			) 
		);      
	
	}
}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'MyTheme_Customize' , 'register' ) );


/**
 * Todo: Separete this Class into another file;
 */

class SocialIcons{

	private static $facebook_icon 	= 	'<i class="icon fab fa-facebook-f" aria-hidden="true" ></i>';
	private static $instagram_icon 	=	'<i class="icon fab fa-instagram"></i>';
	private static $likedin_icon	=	'<i class="icon fab fa-linkedin-in"></i>';
	private static $youtube_icon	=	'<i class="fab fa-youtube"></i>';
	
	
	public static function getSocialIcon($social_network){
		if($social_network == "Facebook" || $social_network == "facebook")
			return self::getFacebookIcon();
		elseif($social_network == "Instagram" || $social_network == "instagram" || $social_network == "insta")
			return self::getInstagramIcon();
		elseif($social_network == "Linkedin" || $social_network == "linkedin")
			return self::getLinkedinIcon();
		elseif($social_network == "Youtube" || $social_network == "youtube")
			return self::getYoutubeIcon();
	}

	private static function getFacebookIcon(){
		return self::$facebook_icon;
	}

	private static function getInstagramIcon(){
		return self::$instagram_icon;
	}
	
	private static function getLinkedinIcon(){
		return self::$likedin_icon;
	}

	private static function getYoutubeIcon(){
		return self::$youtube_icon;
	}
}


