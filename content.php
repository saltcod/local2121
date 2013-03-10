<?php
/**
 * @package waterstreet
 * @since waterstreet 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'waterstreet' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php waterstreet_posted_on(); ?>
		</div> 
	<?php endif; ?>
</header> 

<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
<?php else : ?>
	<div class="post-thumbnail">
		<?php if ( has_post_thumbnail() ) {the_post_thumbnail(); } ?> 
	</div>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'waterstreet' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'waterstreet' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
<?php endif; ?>

<footer class="entry-meta">
	<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
	<?php
	/* translators: used between list items, there is a space after the comma */
	$categories_list = get_the_category_list( __( ', ', 'waterstreet' ) );
	if ( $categories_list && waterstreet_categorized_blog() ) :
		?>
	<span class="cat-links">
		<?php printf( __( 'Posted in %1$s', 'waterstreet' ), $categories_list ); ?>
	</span>
<?php endif; // End if categories ?>

<?php
/* translators: used between list items, there is a space after the comma */
$tags_list = get_the_tag_list( '', __( ', ', 'waterstreet' ) );
if ( $tags_list ) :
	?>

<span class="tag-links">
	<?php printf( __( '<i class="icon-tag"></i> %1$s', 'waterstreet' ), $tags_list ); ?>
</span>
<?php endif; // End if $tags_list ?>
<?php endif; // End if 'post' == get_post_type() ?>
<?php edit_post_link( __( 'Edit', 'waterstreet' ), '<span class="edit-link">', '</span>' ); ?>
</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
