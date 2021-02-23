<!--
    Arquivo para o código do header da página,
    header = cabeçalho do site
-->

<?php
// Inserir: caso tenha alterado o nome da variavel do redux, alterar o nome aqui tbm
if (class_exists('Redux')) {
    global $redux_fields;
}
?>

<!DOCTYPE html>
<html lang="en">
<title>Grupo WZ</title>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri()?>/img/logo.png">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?php get_bloginfo('name');?> </title>
    <meta name="description" content="<?php get_bloginfo('description');?>">
    <link rel="icon" type="image/png" href="">
    <link href="https://fonts.googleapis.com/css?family=Dosis&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ruluko&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.css" rel="stylesheet" type="text/css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDw16yOZMAEsESk9_pFjos4tJikszB3xb8&callback=initMap">
</script>

    


    <!-- Apple Web App Meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <?php wp_head();?>

</head>

<?php   
if ( function_exists( 'the_custom_logo' ) ) {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
}

$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>
<body>
    <header>
        <div class="navbar-fixed">
            <nav class="nav_white">
                <div class="nav-wrapper">
                    <a href="/" class="left logo logo-white valign-wrapper">
                        <img src="<?php echo $image[0]?>" alt="Logo">
                    </a>
                    <a href="#" data-target="mobile-sidenav" class="right sidenav-trigger"><i class="material-icons">menu</i></a>
                    <?php
                    wp_nav_menu([
                        'container' => ' ',
                        'menu_id'   => 'top-menu',
                        'menu_class' => "right hide-on-med-and-down"
                    ]);
                    ?>
                </div>

            </nav>

        </div>

            <?php
            wp_nav_menu([
                'menu_id' => 'mobile-sidenav',
                'container' => ' ',
                'menu_class' => 'sidenav',
            ]);
            ?>

    </header>