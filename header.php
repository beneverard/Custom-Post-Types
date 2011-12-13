<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <!-- Meta Tags & Browser Stuff -->
    <meta charset="<?php bloginfo('charset'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

    <!-- Make the HTML5 elements work in IE. -->
    <!--[if IE]>
    <script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The mountain of stuff WP puts in -->
    <?php wp_head(); ?>

    <!-- CSS -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
    <link rel="stylesheet/less" href="<?php bloginfo('template_url'); ?>/css/less.less" type="text/css" />
    <script src="<?php bloginfo('template_url'); ?>/js/less.min.js"></script>
    
</head>
<body <?php body_class(); ?>>
	
	<div class="wrapper">
	    		
	<header>
	    <h1><a class="logo" href="<?php bloginfo('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<nav>
			<ul>
				<?php 
					wp_nav_menu(array(
					    'sort_column'		=> 'menu_order',
					    'container_class'	=> 'menu-header',
					    'menu'				=> 'Header',
					    'container'			=> '',
					    'items_wrap'		=> '%3$s'
					)); 
				?>
			</ul>
		</nav>
	</header>