<?php
/**
 * Template part for displaying page content in single.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Karta
 */

if ( 'chat' === get_post_format() ) {
	add_filter( 'the_content', 'karta_parse_chat_content', 1, 1 );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-cover" <?php karta_background_image_url() ?>>
		<div class="post-intro container">
			<div class="post-intro__categories">
				<?php karta_categories(); ?>
			</div>
			<div class="post-intro__content">
				<p class="post-intro__date"><?php echo esc_html( get_the_date() ); ?></p>
				<?php the_title( '<h1 class="post-intro__title">', '</h1>' ); ?>
				<?php if ( has_tag() ) : ?><p class="post-intro__tags"><?php esc_html( the_tags() ); ?></p><?php endif; ?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
		<?php 
		if(is_singular()) {
		?>
			<div class="col-md-8 col-xs-12 col-sm-12">	
				<?php
				if ( get_the_content() !== '' ) : ?>
				<div class="post-content">
					<?php
					the_content();
					karta_pagination();
					?>
				</div>
				<?php endif; ?>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<?php if ( is_active_sidebar( 'right-1' ) ) : ?>
					<?php dynamic_sidebar( 'right-1' ); ?>
				<?php endif; ?>
			</div>
		<?php  
		} else {
		?>
			<div class="col-xs-12">
				<?php
				if ( get_the_content() !== '' ) : ?>
				<div class="post-content">
					<?php
					the_content();
					karta_pagination();
					?>
				</div>
				<?php endif; ?>
			</div>
		<?php } ?>
		</div>
	</div>
</article>

<?php
if ( 'chat' === get_post_format() ) {
	remove_filter( 'the_content', 'karta_parse_chat_content', 1 );
}
?>

<?php 
if(is_singular()) {

	// <!--======== SHARE ARTICLE ========-->
	karta_the_share_links();

	// <!--======== RELATED POSTS ========-->
	karta_the_related_posts();

}