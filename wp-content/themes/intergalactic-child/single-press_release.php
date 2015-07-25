<?php
/**
 * @package Intergalactic
 */
get_header(); // Loads the header.php template
?>



	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php if ( has_post_thumbnail() && 'post' == get_post_type() ) {
	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'intergalactic-large' ); ?>
	<div class="entry-background" style="background-image:url(<?php echo esc_url( $thumbnail[0] ); ?>)">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	</div>
<?php } else { ?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
<?php } ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content-wrapper">
		<div class="entry-meta">
			<?php intergalactic_posted_on(); ?>
			
		</div><!-- .entry-meta -->
		<div class="entry-content">
			<?php the_content() ; ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'intergalactic' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php
				/* translators: used between list items, there is a space after the comma */
				$category_list = get_the_category_list( __( ', ', 'intergalactic' ) );

				/* translators: used between list items, there is a space after the comma */
				$tag_list = get_the_tag_list( '', __( ', ', 'intergalactic' ) );

				if ( '' != $tag_list ) {

					printf( '<span class="entry-tags">' . __( '<span class="heading">Tags:</span> %1$s', 'intergalactic' ) . '</span>', $tag_list );
				}

				if ( 'true' == intergalactic_categorized_blog() ) {
					printf( '<span class="entry-categories">' . __( '<span class="heading">Categories:</span> %1$s', 'intergalactic' ) . '</span>', $category_list );
				}
			?>

			<?php intergalactic_post_format(); ?>

			<?php edit_post_link( __( 'Edit', 'intergalactic' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .entry-content-wrapper -->
</article><!-- #post-## -->

			<?php endwhile; ?>

			<?php intergalactic_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		<?php get_footer(); ?>

