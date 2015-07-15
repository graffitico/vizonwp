<?php
/**
 * The default template for displaying video post format content.
 *
 * @package WordPress
 * @subpackage Tetris WPExplorer Theme
 * @since Tetris 1.0
 */


if ( is_singular() ) { ?>

	<?php if ( get_post_meta( get_the_ID(), 'wpex_post_video', true ) ) { ?>
		<div id="post-video" class="fitvids"><?php echo wp_oembed_get( get_post_meta( get_the_ID(), 'wpex_post_video', true ) ); ?></div>
	<?php } ?>

<?php } else { ?>

	<article <?php post_class('blog-entry fitvids clearfix'); ?>>
		<div class="blog-entry-video">
			<?php
			// Show video based on meta option
			echo wp_oembed_get( get_post_meta( get_the_ID(), 'wpex_post_video', true ) ); ?>
		</div><!-- /blog-entry-thumbnail -->
		<div class="entry-text clearfix">
			<header>
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			</header>
			<?php wpex_excerpt(); ?>
			<ul class="entry-meta">
				<li><strong>Posted on:</strong> <?php echo get_the_date(); ?></li>
				<li><strong>By:</strong> <?php the_author_posts_link(); ?></li>   
				<?php if(comments_open()) { ?><li class="comment-scroll"><strong>With:</strong> <?php comments_popup_link(__('0 Comments', 'wpex'), __('1 Comment', 'wpex'), __('% Comments', 'wpex'), 'comments-link' ); ?></li><?php } ?>
			</ul><!-- /entry-meta -->
		</div><!-- /entry-text -->
	</article><!-- /blog-entry -->

<?php } ?>