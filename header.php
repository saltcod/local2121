<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package waterstreet
 * @since waterstreet 1.0
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->



<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'waterstreet' ), max( $paged, $page ) );

	?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->


<script type="text/javascript" src="//use.typekit.net/ocs7exa.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<link href='http://fonts.googleapis.com/css?family=Dawning+of+a+New+Day' rel='stylesheet' type='text/css'>



<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<?php do_action( 'before' ); ?>

		<header id="masthead" class="site-header group" role="banner">
			<div class="top-bar group"> 
				<div class="wrap"> 
					<h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<nav role="navigation" class="site-navigation main-navigation group">
						<h1 class="assistive-text"><?php _e( 'Menu', 'waterstreet' ); ?></h1>
						<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'waterstreet' ); ?>"><?php _e( 'Skip to content', 'waterstreet' ); ?></a></div>

						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					</nav><!-- .site-navigation .main-navigation -->
				</div>
			</div>

			<?php if( is_front_page() ):?>
			<div class="wrap">
				<img class="cep-logo" src="<?php echo get_template_directory_uri();?>/images/cep-logo-2121.png">
 				<div class="welcome-message">
					North America's first unionized  offshore oil production facilities
				</div>
			</div>
		<?php endif; ?>

	</header><!-- #masthead .site-header -->
	
	<div id="main" class="site-main group">


