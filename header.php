<?php
/**
 * @package WordPress
 * @subpackage designosource-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
?><!doctype html>

<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->

<head id="<?php echo of_get_option('meta_headid'); ?>" data-template-set="designosource-WordPress-Theme">

	<meta charset="<?php bloginfo('charset'); ?>">

	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<!--[if IE ]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->

	<?php if (is_search()) echo '<meta name="robots" content="noindex, nofollow" />'; ?>

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">

	<?php
	//if single post then add excerpt as meta description
	if (is_single()) {
	?>
		<meta name="description" content="Post op designoverse, het blog van designosource." />
	<?php
	//if homepage use standard meta description
	} else if(is_home() || is_page())  {
	?>
		<meta name="description" content="<?php bloginfo('description'); ?>">
	<?php
	//if category page, use category description as meta description
	}
	?>

	<!--Google will often use this as its description of your page/site. Make it good.-->
	<link rel="author" href="humans.txt" />

	<?php if (true == of_get_option('meta_author')) echo '<meta name="author" content="'.of_get_option("meta_author").'" />'; ?>

	<?php if (true == of_get_option('meta_google')) echo '<meta name="google-site-verification" content="'.of_get_option("meta_google").'" />'; ?>

	<meta name="Copyright" content="Copyright &copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?>. All Rights Reserved.">

	<?php if (true == of_get_option('meta_viewport')) {
	echo '<meta name="viewport" content="'.of_get_option("meta_viewport").'" />';
	} ?>

	<?php if (true == of_get_option('head_favicon')) {
	echo '<link rel="shortcut icon" href="'.of_get_option("head_favicon").'" />';
	} ?>

	<?php if (true == of_get_option('head_apple_touch_icon')) {
	echo '<link rel="apple-touch-icon" href="'.of_get_option("head_apple_touch_icon").'">';
	} ?>

	<!-- Application-specific meta tags -->
	<?php if (true == of_get_option('meta_app_win_name')) {
	echo '<!-- Windows 8 -->';
	echo '<meta name="application-name" content="'.of_get_option("meta_app_win_name").'" /> ';
	echo '<meta name="msapplication-TileColor" content="'.of_get_option("meta_app_win_color").'" /> ';
	echo '<meta name="msapplication-TileImage" content="'.of_get_option("meta_app_win_image").'" />';
	} ?>

	<?php if (true == of_get_option('meta_app_twt_card')) {
	echo '<!-- Twitter -->';
	echo '<meta name="twitter:card" content="'.of_get_option("meta_app_twt_card").'" />';
	echo '<meta name="twitter:site" content="'.of_get_option("meta_app_twt_site").'" />';
	echo '<meta name="twitter:title" content="'.wp_title( '|', false, 'right' ).'" />';
	if (is_single()) {
	?>
		<meta name="twitter:description" content="Post op designoverse, het blog van designosource." />
	<?php
	} else if(is_home() || is_page())  {
		echo '<meta name="twitter:description" content="'.of_get_option("meta_app_twt_description").'" />';
	}
	echo '<meta name="twitter:url" content="http://designosource.be'.$_SERVER['REQUEST_URI'].'" />';
	} ?>

	<?php if (true == of_get_option('meta_app_fb_title')) {
	echo '<!-- Facebook -->';
	echo '<meta property="og:title" content="'.wp_title( '|', false, 'right' ).'" />';
	if (is_single()) {
	?>
		<meta property="og:description" content="Post op designoverse, het blog van designosource." />
	<?php
	} else{
		echo '<meta property="og:description" content="'.of_get_option("meta_app_fb_url").'" />';
	}
	echo '<meta property="og:url" content="http://designosource.be'.$_SERVER['REQUEST_URI'].'" />';
	}
	echo '<meta property="og:image" content="'.get_template_directory_uri() . '/_/img/logo.png" />';
	?>

	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() . '/_/img/favicon.png'; ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> id="skrollr-body">

	<?php
		function isMobile()
		{
		    if(preg_match('/(alcatel|amoi|android|avantgo|blackberry|benq|cell|cricket|docomo|elaine|htc|iemobile|iphone|ipad|ipaq|ipod|j2me|java|midp|mini|mmp|mobi|motorola|nec-|nokia|palm|panasonic|philips|phone|sagem|sharp|sie-|smartphone|sony|symbian|t-mobile|telus|up\.browser|up\.link|vodafone|wap|webos|wireless|xda|xoom|zte)/i', $_SERVER['HTTP_USER_AGENT']))
		    return true;
		else
		    return false;
		}


		if(is_page_template('front-page.php') && !isMobile()){
			?> <div id="flip-picture"></div> <?php
		}
	?>

	<!-- Van launch pagina, exacte sterren -->
	<ul id="sterren" style="position: relative; -webkit-transform: translate3d(0, 0, 0); -webkit-transform-style: preserve-3d; -webkit-backface-visibility: hidden; height: 783px;"
		<?php if(is_page_template('front-page.php')) { ?>
			data-600="margin-top:250px; margin-bottom: -250px;"
			data-2000="margin-top:-250px; margin-bottom: 250px;"
		<?php } else { ?>
			data-0="transform: translateY(0px);-webkit-transform: translateY(0px);opacity: 1;"
			data-300="transform: translateY(200px);-webkit-transform: translateY(200px); opacity: 0;"
		<?php }?>
			>
		<li  id="layer1" style="position: absolute; display: block; height: 100%; width: 100%; left: 0px; top: 0px; -webkit-transform: translate3d(0.4666666666666663%, 0.3946360153256703%, 0px); -webkit-transform-style: preserve-3d; -webkit-backface-visibility: hidden;">
			<span class="star" style="z-index: 10;font-size:8px; left: 84.00%;top: 0.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 13.00%;top: 28.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 39.00%;top: 61.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 94.00%;top: 63.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 70.00%;top: 36.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 5.00%;top: 65.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 33.00%;top: 85.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 9.00%;top: 2.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 24.00%;top: 62.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 48.00%;top: 54.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 17.00%;top: 39.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 16.00%;top: -1.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 67.00%;top: 83.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 44.00%;top: 61.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 48.00%;top: 90.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 58.00%;top: 36.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 0.00%;top: 23.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 71.00%;top: 54.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 28.00%;top: 21.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 8.00%;top: -3.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 26.00%;top: 12.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 82.00%;top: 10.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 62.00%;top: 81.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 32.00%;top: 67.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 16.00%;top: -9.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 92.00%;top: 11.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 6.00%;top: 30.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 74.00%;top: 26.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 60.00%;top: -6.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 8.00%;top: 56.00%;">•</span><span class="star" style="z-index: 10;font-size:8px; left: 72.00%;top: -4.00%;">•</span>		</li>
		<li id="layer2" style="position: absolute; display: block; height: 100%; width: 100%; left: 0px; top: 0px; -webkit-transform: translate3d(0.9333333333333326%, 0.7892720306513406%, 0px); -webkit-transform-style: preserve-3d; -webkit-backface-visibility: hidden;">
			<span class="star" style="z-index: 10;font-size:12px; left: 84.00%;top: 43.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 16.00%;top: 87.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 82.00%;top: 73.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 57.00%;top: 8.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 0.00%;top: 63.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 42.00%;top: 55.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 77.00%;top: 73.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 14.00%;top: 90.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 76.00%;top: 74.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 26.00%;top: 37.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 61.00%;top: 71.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 18.00%;top: -7.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 22.00%;top: 71.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 79.00%;top: 77.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 45.00%;top: 49.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 86.00%;top: 28.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 69.00%;top: -7.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 30.00%;top: 44.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 2.00%;top: 65.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 18.00%;top: -7.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 51.00%;top: 82.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 56.00%;top: 33.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 30.00%;top: 57.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 80.00%;top: 31.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 65.00%;top: 4.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 27.00%;top: 17.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 43.00%;top: 61.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 23.00%;top: 49.00%;">•</span><span class="star" style="z-index: 10;font-size:12px; left: 16.00%;top: 8.00%;">•</span>		</li>
		<li id="layer3" style="position: absolute; display: block; height: 100%; width: 100%; left: 0px; top: 0px; -webkit-transform: translate3d(1.3999999999999988%, 1.1839080459770108%, 0px); -webkit-transform-style: preserve-3d; -webkit-backface-visibility: hidden;">
			<span class="star" style="z-index: 10;font-size:16px; left: 11.00%;top: 56.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 22.00%;top: 15.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 4.00%;top: 54.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 77.00%;top: 81.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 62.00%;top: 9.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 27.00%;top: -2.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 69.00%;top: -10.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 45.00%;top: 3.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 13.00%;top: 33.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 8.00%;top: 44.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 25.00%;top: 24.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 91.00%;top: 31.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 52.00%;top: 3.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 36.00%;top: -5.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 63.00%;top: 32.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 69.00%;top: 83.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 79.00%;top: -3.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 18.00%;top: 61.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 85.00%;top: 28.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 27.00%;top: 18.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 5.00%;top: 79.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 93.00%;top: 38.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 56.00%;top: 82.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 44.00%;top: 60.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 52.00%;top: 66.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 14.00%;top: 48.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 53.00%;top: -3.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 27.00%;top: 1.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 12.00%;top: 67.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 25.00%;top: 2.00%;">•</span><span class="star" style="z-index: 10;font-size:16px; left: 49.00%;top: 1.00%;">•</span>		</li>
		<li id="layer4" style="position: absolute; display: block; height: 100%; width: 100%; left: 0px; top: 0px; -webkit-transform: translate3d(1.8666666666666651%, 1.578544061302681%, 0px); -webkit-transform-style: preserve-3d; -webkit-backface-visibility: hidden;">
			<span class="star" style="z-index: 10;font-size:20px; left: 60.00%;top: 44.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 71.00%;top: 69.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 69.00%;top: -9.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 83.00%;top: 57.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 61.00%;top: 68.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 89.00%;top: 0.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 46.00%;top: 72.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 74.00%;top: 75.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 55.00%;top: 22.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 34.00%;top: 68.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 75.00%;top: 74.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 6.00%;top: 43.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 55.00%;top: 19.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 63.00%;top: 21.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 26.00%;top: 88.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 76.00%;top: 73.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 44.00%;top: 60.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 41.00%;top: 63.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 78.00%;top: 49.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 56.00%;top: -2.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 60.00%;top: 22.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 74.00%;top: 90.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 54.00%;top: -10.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 81.00%;top: 3.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 34.00%;top: 40.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 73.00%;top: 2.00%;">•</span><span class="star" style="z-index: 10;font-size:20px; left: 18.00%;top: 86.00%;">•</span>		</li>
	</ul>

	<!-- Wolken -->

	<?php
		if(is_page_template('front-page.php') && !isMobile()){
			?>
				<div id="lens-flare">
					<div class="lens-flare"
								data-19580="-webkit-transform: rotate(0deg);transform: rotate(0deg);"
								data-20790="-webkit-transform: rotate(-25deg);transform: rotate(-25deg);">
					    <div class="circle-a"></div>
					    <div class="circle-b"></div>
					    <div class="circle-c"></div>
					    <div class="circle-d"></div>
					    <div class="circle-e"></div>
					    <div class="circle-f"></div>
					</div>
				</div>
				<div id="bottom-img">
					<div id="wolken-top"></div>
					<div id="wolken"></div>
				</div>

			<?php
		}
	?>



	<div id="wrapper" class="grid wrap wider">

		<nav id="nav" role="navigation">

			<?php
				if(is_page_template('front-page.php')){
					?> <div class="arrow">MENU</div>
						<?php wp_nav_menu( array('menu' => 'primary') ); ?>
					 <?php
				}
				else
				{

				}
			?>



		</nav>

		<section id="home" class="grid whole">

			<div id="ei">
				<img id="ei-top" src="<?php echo get_template_directory_uri(); ?>/_/img/ei-top.png" alt=""
										<?php if( is_page_template('front-page.php') ){ ?>
											data-900="transform: translateY(150px);-webkit-transform: translateY(150px);"
											data-1250="transform: translateY(50px);-webkit-transform: translateY(50px);"
											data-1400="transform: translateY(50px);-webkit-transform: translateY(50px);"
											data-2000="transform: translateY(-50px);-webkit-transform: translateY(-50px);"
										<?php } else { ?>
											data-0="transform: translateY(0px);-webkit-transform: translateY(0px);"
											data-400="transform: translateY(200px);-webkit-transform: translateY(150px);"
										<?php }?>
										>
				<img id="ring" src="<?php echo get_template_directory_uri(); ?>/_/img/ring.png" alt=""
										<?php if( is_page_template('front-page.php') ){ ?>
											data-900="margin-top: 150px;"
											data-1250="margin-top: 50px;"
											data-1400="margin-top: 50px;"
											data-2000="margin-top: -50px;"
										<?php } else { ?>
											data-0="margin-top:0px;"
											data-400="margin-top:150px;"
										<?php }?>
										>
				<img id="ei-bottom" src="<?php echo get_template_directory_uri(); ?>/_/img/ei.png" alt=""
										<?php if( is_page_template('front-page.php') ){ ?>
											data-900="transform: translateY(150px);-webkit-transform: translateY(150px);"
											data-1250="transform: translateY(50px);-webkit-transform: translateY(50px);"
											data-1400="transform: translateY(50px);-webkit-transform: translateY(50px);"
											data-2000="transform: translateY(-50px);-webkit-transform: translateY(-50px);"
										<?php } else { ?>
											data-0="transform: translateY(0px);-webkit-transform: translateY(0px);"
											data-400="transform: translateY(200px);-webkit-transform: translateY(150px);"
										<?php }?>
										>
			</div>

			<header
				<?php if( is_page_template('front-page.php') ){ ?>
					data-1100="transform: translateY(600px);-webkit-transform: translateY(600px);"
					data-1250="transform: translateY(400px);-webkit-transform: translateY(400px);"
					data-1400="transform: translateY(400px);-webkit-transform: translateY(400px);opacity:1"
					data-1800="transform: translateY(200px);-webkit-transform: translateY(200px);opacity:0"
				<?php } else { ?>
					data-0="transform: translateY(0px);-webkit-transform: translateY(0px);opacity: 1;"
					data-300="transform: translateY(100px);-webkit-transform: translateY(100px); opacity: 0;"
				<?php }?>
				>
				<h1><?php if( is_page_template('front-page.php') ){bloginfo( 'title' );}else{ echo "designoverse"; } ?></h1>
				<?php if( is_page_template('front-page.php') ){ ?><h2><?php bloginfo( 'description' ); ?></h2><?php } ?>
			</header>

			<?php if(is_page_template('front-page.php')){ ?><i class="red-arrow"></i><?php } ?>

		</section><!-- End Home -->
