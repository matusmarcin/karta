<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Karta
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="archive-intro">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h5 class="archive-intro__title"><?php echo get_the_archive_title(); ?></h5>
						<?php the_archive_description( '<div class="archive-intro__description">', '</div>' ); ?>
					</div>
				</div>
			</div>
		</div>

		<?php if ( have_posts() ) : ?>

		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-8 col-xs-12">
				<?php
					the_post();
					get_template_part( 'template-parts/content-single', get_post_format() );
				?>
				</div>
				<div class="cold-md-4 col-sm-4 col-xs-12">
					<div class="top-offset-column">
						<?php if ( is_active_sidebar( 'right-1' ) ) : ?>
							<?php dynamic_sidebar( 'right-1' ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<div class="row top-padding-2">
				<?php if ( is_active_sidebar( 'center-1' ) ) : ?>
					<?php dynamic_sidebar( 'center-1' ); ?>
				<?php endif; ?>
				<div class="col-xs-12">
<!-- 					<div class="masonry-grid">
						<div class="masonry-grid__sizer"></div>
						<div class="masonry-grid__gutter-sizer"></div> -->
						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'template-parts/content', get_post_format() ); ?>

						<?php endwhile; ?>
					<!-- </div> -->
				</div>
			</div>
		</div>

		<?php karta_pagination() ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();

