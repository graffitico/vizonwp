<?php
/**
 * Page.php is used to render your regular pages.
 * @package Tetris WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */


get_header(); // Loads the header.php template


if ($post->post_title == 'case studies') { 
  $case_posts =  new WP_Query('showposts=1000');
	?>
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if (  $case_posts->have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while (  $case_posts->have_posts() ) :  $case_posts->the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', 'case_studies' );

				?>

			<?php endwhile; ?>

			<?php intergalactic_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>


		</main><!-- #main -->
	</div><!-- #primary -->


<?php

}else{

if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="single-page-content" class="clearfix">
    <article id="post" class="clearfix">
        <div class="entry clearfix">
            <?php the_content(); ?>
        </div><!-- /entry -->
    </article><!-- /post -->
	<?php
	endwhile; endif; ?>
</div><!-- /container -->

<?php

}
if  (!($post->post_title == 'About')){



get_footer(); // Loads the footer.php file 
}else{
?>

<div class="clear"></div><!-- /clear any floats -->
</div><!-- /main-content -->
</div><!-- /wrap -->
<script type="text/javascript" src="<?php echo get_site_url() ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo get_site_url() ?>/js/jquery.fittext.js"></script>
<script type="text/javascript" src="<?php echo get_site_url() ?>/js/global.js"></script>
<script type="text/javascript" src="<?php echo get_site_url() ?>/js/wow.min.js"></script>
<script type="text/javascript" src="<?php echo get_site_url() ?>/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="<?php echo get_site_url() ?>/js/creative.js"></script>
<script type="text/javascript" src="<?php echo get_site_url() ?>/js/SmoothScroll.js"></script>
<script type="text/javascript" src="<?php echo get_site_url() ?>/js/classie.js"></script>


<?php wp_footer(); // Footer hook, do not delete, ever ?>
</body>
</html>

<?php } ?>