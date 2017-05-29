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
		<?php 
		if(is_home()) {



		} else { ?>
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
		<?php } ?>

		<?php if ( have_posts() ) : ?>

		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-8 col-xs-12">
				<?php
					while ( have_posts() && empty($stopNow)) : the_post();
						get_template_part( 'template-parts/content-single', get_post_format() );
						$stopNow = !is_paged(); // stop after the first one if on the first page
					endwhile;
				?>
				</div>
				<div class="cold-md-4 col-sm-4 col-xs-12">
					<div class="top-offset-column">
						<?php
							if ( is_active_sidebar( 'right-1' ) ) {
								dynamic_sidebar( 'right-1' );
								if(is_paged() && is_active_sidebar( 'right-2' ) ) {
									dynamic_sidebar( 'right-2' );
								}
							}
						?>
					</div>
				</div>
			</div>

			<?php if(!is_paged()) { ?>
				<div class="row">
					<?php 
						if ( is_active_sidebar( 'center-1' ) ) {
							dynamic_sidebar( 'center-1' ); 
						}
					?>
					<div class="col-xs-12">
	<!-- 					<div class="masonry-grid">
							<div class="masonry-grid__sizer"></div>
							<div class="masonry-grid__gutter-sizer"></div> -->
							<?php while ( have_posts() ) : the_post(); ?>

								<?php get_template_part( 'template-parts/content', get_post_format() ); ?>

							<?php endwhile; ?>
							
							<?php get_template_part( 'template-parts/next-page', get_post_format() ); ?>

						<!-- </div> -->
					</div>
				</div>
			<?php } ?>

		</div>

		<?php
			if(is_paged()) { 
				karta_pagination(); 
			} 
		?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();

