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
						<li  >
							<span class="span-cat" >
			<?php 	echo $cat->name;  ?></span></li>
				<li  >
						


			<a href="javascript:void(0)"  data-toggle="modal" data-target="#myModal" class="a2a_dd addtoany_subscribe" aria-label="Subscribe"><span class="span-sub btn-default">Subscribe</span></a>
		
					
	

			
		</li>
				<li>
					<div>
					<ul class="clearfix" id="header-social-inner" >	

				<li><a target="_blank" title="facebook" href="https://www.facebook.com/vizury1to1"><span class="fb-contact"></span></a></li>
				<li><a target="_blank" title="google" href='https://www.youtube.com/user/vizury1to1'><span class="youtube-contact"></span></a></li>
				<li><a target="_blank" title="linkedin" href="http://www.linkedin.com/company/vizury-interactive"><span class="linkedin-contact"></span></a></li>
				<li><a target="_blank" title="twitter" href="https://twitter.com/VizuryOneToOne"><span class="twitter-contact"></span></a></li>
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
	?>
<div>
	<div class="col-lg-12  read-more section-title">
<a   href="<?= wp_get_referer(); ?>" class="btn btn-default" > Back </a>
</div>
</div>

	
</div><!--/container -->


<?php
	$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => 3, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true , 'category_name' => $cat->name) ) );
     // $suggest_string = 'Suggested Case Studies';
      
       

    //$title = apply_filters('widget_title', empty($instance['title']) ? __($suggest_string) : $instance['title'], $instance, $this->id_base);
    
    if( $r->have_posts() ) :

      echo '<div class="container">';
      echo '<div class="row"><div class="col-lg-12  read-more section-title"><h2>Most Read Articles</h2></div></div>   <div class="row">'; ?>
<!--      <ul>
        <?php // while( $r->have_posts() ) : $r->the_post(); ?>
        <li><?php // the_time( 'F d'); ?> - <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
        <?php //endwhile; ?>
      </ul> -->
<?php 


 while( $r->have_posts() ) : $r->the_post(); ?>

  <?php if ( has_post_thumbnail() ) {
    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'intergalactic-large' );
    $img_url =  esc_url( $thumbnail[0] );

 } ?>
              <div class="col-sm-4 blog-entry-tile">
                <div class="ih-item square colored effect4" style="background-color: #626262;" >
                    <div class="img"><a href="<?php the_permalink(); ?>" target="_blank"><img  src="<?php if(isset($img_url)){ echo  $img_url; }else{ echo  '/images/logo_v.svg' ; }?>"></a></div>

                </div>
                <a href="<?php the_permalink(); ?>" target="_blank">
                <h4><?php the_title(); ?></h4></a>
             <!--    <p><b>Author:</b> Vizury</p> -->
                <p><b>Date:</b><?php the_time( 'M d, Y'); ?></p>
                <p><?php the_excerpt(); ?></p>


                <!-- <a href="<?php the_permalink(); ?>" target="_blank"><img class="readmore-convert img-responsive bottom-right" alt="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeAQMAAAAB/jzhAAAAA1BMVEX///+nxBvIAAAAAXRSTlMAQObYZgAAAAxJREFUeNpjYBiMAAAAlgABjcjBIQAAAABJRU5ErkJggg=="></a> -->
            </div>
  <?php endwhile ;
      echo '</div></div>';

    wp_reset_postdata();

    endif;
  



	//get_sidebar();

	 ?>


<!-- 			<div class="entry-footer-wrapper">
	
			

				
				<a   href="<?= wp_get_referer(); ?>" class="btn btn-default" > back </a>
				

			</div><!-- .entry-footer-wrapper --> 


<?php get_footer(); ?>