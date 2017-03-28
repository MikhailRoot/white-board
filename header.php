<?php if ( ! defined( 'ABSPATH' ) ){ exit; } ?>
<!DOCTYPE html>
<!--[if lt IE 7]>  <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>     <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>     <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="wrapper">
			<!--[if lt IE 8]>
				<p class="ancient-browser-alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a>.</p>
			<![endif]-->
		<?php do_action('before'); ?>
		<header role="banner">
				<div class="container">
					<div class="row main-navigation">
						<div class="col-md-12">
							<nav class="navbar navbar-default" role="navigation">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-primary-collapse">
										<span class="sr-only"><?php _e('Toggle navigation', 'bootstrap-basic'); ?></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<h1 class="site-title-heading">
									<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
								</h1>
								<div class="collapse navbar-collapse navbar-primary-collapse">
									<?php wp_nav_menu(array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav') ); ?>
								</div><!--.navbar-collapse-->
							</nav>
						</div>
					</div><!--.main-navigation-->
				</div>
				</header>

