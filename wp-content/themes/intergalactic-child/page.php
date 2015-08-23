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


if ($post->post_title == 'Case Studies') { 
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
	
	'category_name' => 'case-studies',
	'paged' => $paged ,
	'posts_per_page'=>6 );
  $case_posts =  new WP_Query($args);
	?>
	
	<div id="primary" class="content-area blog">
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

			<?php
if($case_posts->max_num_pages>1){?>
    <p class="navrechts">
    <?php

$params ;
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") { 
       $http  = 'https://';
} else { 
   $http  = 'http://';
}
    $nav_url =  $http. $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    // echo $nav_url;
    $url_parts = parse_url($nav_url);
    if(isset($url_parts['query'])){
    parse_str($url_parts['query'], $params);	
    }

// print_r($url_parts);


      if ($paged > 1) {       
      	$params['paged'] = $paged -1;
      	// Note that this will url_encode all values
$url_parts['query'] = http_build_query($params);



      	?>

        <a href="<?php echo $url_parts['scheme'] . '://' . $url_parts['host'] . $url_parts['path'] . '?' . $url_parts['query']; //prev link ?>">Newer Case Studies</a>
                        <?php }
    // for($i=1;$i<=$case_posts->max_num_pages;$i++){?>
       <!-- <a href="<?php // echo '?paged=' . $i; ?>" <?php  //echo ($paged==$i)? 'class="selected"':'';?>><?php //echo $i;?></a> -->
         <?php
    // }
    if($paged < $case_posts->max_num_pages){
      	$params['paged'] = $paged + 1;
      	// Note that this will url_encode all values
$url_parts['query'] = http_build_query($params);

?>

        <a href="<?php echo $url_parts['scheme'] . '://' . $url_parts['host'] . $url_parts['path'] . '?' . $url_parts['query']; //prev link ?>">Older Case Studies</a>
    <?php } ?>
    </p>
<?php } ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>


		</main><!-- #main -->
	</div><!-- #primary -->


<?php

}elseif ($post->post_title == 'insights') { 
	$args = array(
	'showposts' => '1000',
	'category_name' => 'insights' );
  $case_posts =  new WP_Query($args);
	?>
	
	<div id="primary" class="content-area blog">
		<main id="main" class="site-main" role="main">

			<?php if (  $case_posts->have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while (  $case_posts->have_posts() ) :  $case_posts->the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', 'insights' );

				?>

			<?php endwhile; ?>

			<?php intergalactic_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>


		</main><!-- #main -->
	</div><!-- #primary -->


<?php

}



else{

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




get_footer(); // Loads the footer.php file 
?>