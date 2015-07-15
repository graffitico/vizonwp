<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Tetris WPExplorer Theme
 * @since Tetris 1.0
 */


get_header(); // Loads the header.php template

if ( have_posts()) : while ( have_posts()) : the_post(); ?>

<?php
// Display media
if( 'quote' != get_post_format() ) {
	get_template_part( 'content', get_post_format() ); 
} ?>

<div id="single-post-content" class="sidebar-bg container clearfix">
	
	<div id="post" class="clearfix">
		<?php
		// Show header on all post formats except quotes
		if( 'quote' != get_post_format() ) { ?>
			<header id="post-header">
				<h1><?php the_title(); ?></h1>
				<ul class="meta clearfix">
					<li><strong>Posted on:</strong> <?php echo get_the_date(); ?></li>
					<li><strong>By:</strong> <?php the_author_posts_link(); ?></li>   
					<?php if(comments_open()) { ?><li class="comment-scroll"><strong>With:</strong> <?php comments_popup_link(__('0 Comments', 'wpex'), __('1 Comment', 'wpex'), __('% Comments', 'wpex'), 'comments-link' ); ?></li><?php } ?>
				</ul>
			</header><!-- /post-header -->
		<?php } ?>
		<!-- Entry Content Start -->
		<article <?php post_class('entry clearfix fitvids'); ?>>
			<div class="inner-post">
				<?php the_content(); // This is your main post content output ?>
				<?php if( get_post_format() == 'quote' ){ ?><div class="quote-author">&#8211; <?php the_title(); ?></div><?php } ?>
			</div><!-- /inner-post -->
		</article><!-- /entry -->
		<!-- Entry Content End -->
		<?php wp_link_pages(); // Paginate pages when <!- next --> is used ?>
		<?php the_tags('<div id="post-tags" class="clearfix">','','</div>'); ?>
		<?php
		// Show author bio on all post formats except quotes
		if( get_post_format() !== 'quote' ) { ?>
			<div id="single-author" class="clearfix">
				<h4 class="heading"><span><?php the_author_posts_link(); ?></span></h4>
				<div id="author-image">
				   <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php echo get_avatar( get_the_author_meta('user_email'), '45', '' ); ?></a>
				</div><!-- author-image -->
				<div id="author-bio">
					<p><?php the_author_meta('description'); ?></p>
				</div><!-- author-bio -->
			</div><!-- /single-author -->
		<?php } ?>
		<?php comments_template(); ?>
	</div><!-- /post -->
	
	<?php
	//end post loop
	endwhile; endif;
	
	//get template sidebar
	get_sidebar(); ?>
	
</div><!--/container -->

<?php get_footer(); ?>