<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package waterstreet
 * @since waterstreet 1.0
 */

get_header(); ?>

<div id="primary" class="content-area wrap group">

	<?php if (is_page( 'questions' ) ) {
		get_sidebar();
	}
	?>

	<div id="content" class="site-content group" role="main">
		
		<?php if ( have_posts() ) : ?>

 		<?php while ( have_posts() ) : the_post(); 
 			get_template_part( 'content', get_post_format() );
		?>

	<?php endwhile; ?>

	<?php waterstreet_content_nav( 'nav-below' ); ?>

<?php else : ?>

	<?php get_template_part( 'no-results', 'index' ); ?>

<?php endif; ?>

</div><!-- #content .site-content -->
</div><!-- #primary .content-area -->
<?php get_footer(); ?>