<?php
/**
 * Template part for displaying posts-like next page button.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Karta
 */

$classes = array();
$classes[] = 'grid-post-item col-xs-12 col-sm-6 col-md-4 next-page-cta';

$pageLinks = paginate_links( array('end_size' => 0, 'mid_size' => 0, 'type' => 'array', 'next_text' => '#PLACEHOLDER#'));
$nextLink = array_pop($pageLinks);

if(strpos($nextLink, "next")) {
    $nextLink = str_replace(array('#PLACEHOLDER#', 'class="next'), array('<h4 class="post__title">Ďalšia strana <i class="chevron-right"></i></h4>', 'class="next post__intro'), $nextLink);
?>

    <div <?php post_class( $classes ); ?>>
        <figure class="post__figure">
            <figcaption class="post__figcaption">
                <?php echo $nextLink; ?> 
            </figcaption>
        </figure>
    </div>

<?php } ?>