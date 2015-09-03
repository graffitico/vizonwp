<?php
/**
 * @package Intergalactic
 */
get_header(); // Loads the header.php template
?>



	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="csontop" ></div>
<center>
<h3 class='post-title'><?php the_title(); ?></h3>
	<div class='post-author'> <?php //   the_author(); ?> </div>
</center>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content-wrapper">
		<div class="entry-meta">
			<?php //intergalactic_posted_on(); ?>
			
		</div><!-- .entry-meta -->
		<div class="entry-content">


					<?php 

					if(null !==  get_post_meta( get_the_ID(), 'vimeo_link', true ) && get_post_meta( get_the_ID(), 'vimeo_link', true ) != "" ){
						$url = get_post_meta( get_the_ID(), 'vimeo_link', true );
						$arr = explode('/', $url);
						
					 ?>
					
					<iframe src="//player.vimeo.com/video/<?php echo end($arr) ?>" width="700" height="380"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					<!-- <iframe src="<?php // echo get_post_meta( get_the_ID(), 'vimeo_link', true ) ?>" width="250" height="180" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> -->
					<?php }?>
			<?php the_content() ; ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'intergalactic' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<center>				    <?php
// print_r(wp_get_post_terms(get_the_ID() ,  'release_type'));
				     if(has_term( "press-release" , 'release_type'  , $post ) ){ ?>
					<a   href="/press-release" class="btn btn-default" > Back </a>
				<?php  }elseif (has_term( "media-coverage" , 'release_type'  , $post )) { ?>
					<a   href="/mediacoverage" class="btn btn-default" > Back </a>
				<?php } elseif (has_term( "white-paper" , 'release_type'  , $post )) { ?>
					<a   href="/whitepapers" class="btn btn-default" > Back </a>
				<?php }  ?>
</center>


<?php  // get_sidebar(); ?>

		<footer class="entry-footer">
			<?php
				// /* translators: used between list items, there is a space after the comma */
				// $category_list = get_the_category_list( __( ', ', 'intergalactic' ) );

				// /* translators: used between list items, there is a space after the comma */
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


			<!--<div class="entry-footer-wrapper">
				<?php if ( '' != get_the_author_meta( 'description' ) ) : ?>
					<div class="entry-author">
						<div class="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), '140' ); ?>
						</div>
						<div class="author-bio">
							<?php echo get_the_author_meta( 'description' ); ?>
						</div>
					</div>
				<?php endif; ?>
			
				<?php // intergalactic_post_nav(); ?>

<!-- 				    <?php
// print_r(wp_get_post_terms(get_the_ID() ,  'release_type'));
				    // if(has_term( "press-release" , 'release_type'  , $post ) ){ ?>
					<a   href="/press-release" class="btn btn-default" > back </a>
				<?php // }elseif (has_term( "media-coverage" , 'release_type'  , $post )) { ?>
					<a   href="/mediacoverage" class="btn btn-default" > back </a>
				<?php //} elseif (has_term( "white-paper" , 'release_type'  , $post )) { ?>
					<a   href="/whitepapers" class="btn btn-default" > back </a>
				<?php //}  ?>
 -->
			</div> -->
     

			<?php endwhile; ?>

			<?php // intergalactic_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		
		<?php get_footer(); ?>

