<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Karta
 */

$classes = array();
$classes[] = 'grid-post-item col-xs-12 col-sm-6 col-md-4';// 'masonry-grid__item';
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
	<figure class="post__figure">
		<?php karta_featured_image( 'karta-grid-2' ); ?>
		<figcaption class="post__figcaption">
			<?php karta_the_primary_category(); ?>
			<a href="<?php the_permalink(); ?>" class="post__intro" rel="bookmark">
			<?php if ( 'post' === get_post_type() ) { ?>
				<div class="post__date"><?php echo esc_html( get_the_date() ); ?></div>
			<?php } ?>
			<?php the_title( '<h4 class="post__title">', '</h4>' ); ?>
			</a>
		</figcaption>
	</figure>
</div>
