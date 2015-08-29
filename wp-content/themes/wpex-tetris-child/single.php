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
	//get_template_part( 'content', get_post_format() ); 
} ?>

<div id="single-post-content" class="sidebar-bg container clearfix">
	
	<div id="post" class="clearfix">
		<?php
		$cat = get_the_category();
		$cat = $cat[0];
		$cat_id = $cat->cat_ID;

		// Show header on all post formats except quotes
		if( 'quote' != get_post_format() ) { ?>
			<header id="post-header">
				<h1  ><?php the_title(); ?></h1>
				<ul class="meta clearfix">
					<li><strong>Posted on:</strong> <?php echo get_the_date(); ?></li>
					<li><strong>By:</strong> <?php the_author_posts_link(); ?></li>   
					<?php if(comments_open()) { ?><li class="comment-scroll"><strong>With:</strong> <?php comments_popup_link(__('0 Comments', 'wpex'), __('1 Comment', 'wpex'), __('% Comments', 'wpex'), 'comments-link' ); ?></li><?php } ?>
				</ul>
					<ul class="meta clearfix">
						<li style="position: absolute;" >
							<span class="span-cat" >
			<?php 	echo $cat->name;  ?></span></li>
				<li style="margin-left: 89px; " >
						


			<a href="http://www.addtoany.com/subscribe?linkname=Vizury%20Blog&amp;linkurl=http%3A%2F%2Fweb.vizury.com%2Fblog%2Ffeed%2F" class="a2a_dd addtoany_subscribe" aria-label="Subscribe"><img alt="Subscribe" src="http://graffiti-media.co/roshni/subscribe.jpg"></a>

					
			<script type="text/javascript">//&lt;![CDATA[
			var a2a_config = a2a_config || {};
			a2a_config.linkname="Vizury Blog";
			a2a_config.linkurl="http://web.vizury.com/blog/feed/";
			//]]&gt;</script><script src="http://static.addtoany.com/menu/feed.js" type="text/javascript"></script>

			
		</li>
				<li>
					<div>
					<ul class="clearfix">	

				<li><a target="_blank" title="facebook" href="https://www.facebook.com/vizury1to1"><img alt="facebook" src="/images/facebook-black.png"></a></li>
				<li><a target="_blank" title="google" href="https://plus.google.com/+Vizury1to1/"><img alt="google" src="/images/google-black.png"></a></li>
				<li><a target="_blank" title="linkedin" href="http://www.linkedin.com/company/vizury-interactive"><img alt="linkedin" src="/images/linkedin-black.png"></a></li>
				<li><a target="_blank" title="twitter" href="https://twitter.com/VizuryOneToOne"><img alt="twitter" src="/images/twitter-black.png"></a></li>
				

				
			</ul>
			</div>
		</li>
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
		<?php // the_tags('<div id="post-tags" class="clearfix">','','</div>'); ?>
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
	

wpp_get_mostpopular( 'cat="'.$cat_id.'"' ); 

	//get template sidebar
	get_sidebar(); ?>
	
</div><!--/container -->

<?php get_footer(); ?>