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
	<div id="content" class="site-content group" role="main">


		<div class="latest-news">
			<h2 class="section-title">Latest News</h2>

			<?php query_posts('showposts=3'); if (have_posts()) : while (have_posts()) : the_post(); 
			get_template_part( 'content', get_post_format() );
			?>

		<?php endwhile; ?>

	<?php else : ?>

	<?php get_template_part( 'no-results', 'index' ); ?>

<?php endif; ?>

</div>


<div class="questions-and-answers">
	<h2 class="section-title">Questions & Answers</h2>

	<?php
	$questions = new WP_Query( array( 
		'post_type' => 'questions', 
		'posts_per_page' => 20, 
		'order'=>'DESC' 
		));

		?>
		<?php while ($questions->have_posts()) : $questions->the_post(); ?>
		<div class="question">
			<h2 class="title"><?php the_title(); ?></h2>
			<?php waterstreet_posted_on(); ?>
			<?php the_content(); ?>
		</div>
	<?php endwhile; ?>







</div> <!-- end.questions-and-answers -->

<div class="collective-agreements group">
	<h2 class="section-title">Collective Agreements</h2>
	<div class="ca-right-side">
		<img src="<?php echo get_template_directory_uri();?>/images/terra-nova-collective-agreement@2x.png" alt="">
		<img src="<?php echo get_template_directory_uri();?>/images/hibernia-collective-agreement@2x.png" alt="">
	</div>

</div>


</div><!-- #content .site-content -->
</div><!-- #primary .content-area -->

<?php get_footer(); ?>