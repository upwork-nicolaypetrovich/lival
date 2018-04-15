<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<title><?php wp_title();?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="<?php if( !is_front_page() ) echo 'nm-inner-page'; ?>">
	<div class="nm-main-wrapper">
		<!-- HEADER BEGIN-->
		<header>
			<div class="nm-wrapper">
				<a class="nm-logo" href="<?php echo get_home_url(); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/img/lival_logo.svg" width="161" height="49" alt="logo">
				</a>
				<a class="nm-menu-expand" href="#"><span></span><span></span><span></span><span></span></a>
				<nav>
					<?php if( is_front_page() ) wp_nav_menu( array( 'theme_location' => 'top' ) ); ?>
					<?php if( !is_front_page() ) echo str_replace('href="#', 'href="'.'/'.pll_current_language('slug').'/'.'#', wp_nav_menu( array( 'theme_location' => 'top', 'echo' => false  ) ) ); ?>
				</nav>
				<div class="nm-language-block">
					<ul>
						<li class="current"><a href="<?php echo pll_the_languages(array('raw'=>1))['pt']['url']; ?>">PT</a></li>
						<li><a href="<?php echo pll_the_languages(array('raw'=>1))['en']['url']; ?>">EN</a></li>
					</ul>
				</div>
			</div>
		</header>
		<!-- HEADER END-->