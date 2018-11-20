<?php
/**
 * Шаблон страницы шапки (header.php)
*@package WordPress
 * @subpackage capodimonte
 * Template Name: header
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T5KD5P2');</script>
<!-- End Google Tag Manager -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php typical_title(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="Ресторан аутентичной итальянской кухни">
	<link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
	<meta property="og:site_name" content="Capo di Monte">
	<meta property="og:title" content="Capo di Monte">
	<meta property="og:description" content="Capo di Monte">
	<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/logo.jpg">
	<meta property="og:image:width" content="300">
	<meta property="og:image:height" content="100">
	<meta property="og:url" content="http://rhuilithe.ru/capo_di_monte/">
	<meta property="og:type" content="website">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!-- styles -->
	<!--[if lt IE 10]>
	<link rel="stylesheet" href="https://rawgit.com/codefucker/finalReject/master/reject/reject.css" media="all" />
	<script type="text/javascript" src="https://rawgit.com/codefucker/finalReject/master/reject/reject.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery.bxslider.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
	<!-- scripts -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZCbxL7Hmx33oFZYM-HM6ec5w0bOWMg2I&language=ru"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-2.2.2.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.nice-select.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scrollreveal.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.ui.core.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.ui.datepicker.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/maskedinput.js"></script>
	<script type='text/javascript'>
		var myajax = {"url":"<?php echo get_home_url(); ?>\/wp-admin\/admin-ajax.php"};
	</script>
	<script>
	(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.8";
	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>

	<?php wp_head(); ?>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
</head>
<body>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T5KD5P2');</script>
<!-- End Google Tag Manager -->
<header class="header">
	<div class="wrap">
		<div class="logo"></div>
		<?php wp_nav_menu(array(
			'nav'=>'site_navigation',
			'menu_class'=>'nav',
			'menu-item'=>'link'
		)); ?>
		<div class="language">
			<?php qtranxf_generateLanguageSelectCode('text'); ?>		
		</div>
	</div>
	<div class="navbar_show">
		<span class="navbar_icon_show"></span>
	</div>
	<div class="navbar_hide">
		<span class="navbar_icon_hide"></span>
	</div>
</header>

	