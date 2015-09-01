<?php
/**
 * @package Intergalactic
 */
?>


<div style="height:180px" ></div>
<?php 
if(has_tag( 'new-casestudies' , $post )){
the_title( '<center><h3>', '</h3></center>' ); 
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content-wrapper">
		<div class="entry-meta">
			<?php //intergalactic_posted_on(); ?>
				<div class='post-author'>- <?php   the_author(); ?> </div>
		</div><!-- .entry-meta -->
		<div class="entry-content">
			<?php the_content(); ?>
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
				// $category_list = get_the_category_list( __( ', ', 'intergalactic' ) );

				/* translators: used between list items, there is a space after the comma */
				// $tag_list = get_the_tag_list( '', __( ', ', 'intergalactic' ) );

				// if ( '' != $tag_list ) {

				// 	printf( '<span class="entry-tags">' . __( '<span class="heading">Tags:</span> %1$s', 'intergalactic' ) . '</span>', $tag_list );
				// }

				// if ( 'true' == intergalactic_categorized_blog() ) {
				// 	printf( '<span class="entry-categories">' . __( '<span class="heading">Categories:</span> %1$s', 'intergalactic' ) . '</span>', $category_list );
				// }
			?>

			<?php intergalactic_post_format(); ?>

			<?php edit_post_link( __( 'Edit', 'intergalactic' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .entry-content-wrapper -->
</article><!-- #post-## -->
