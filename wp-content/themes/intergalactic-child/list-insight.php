<?php
 /*Template Name: list insights
 */
 
get_header(); ?>
<div class='press-release-container row'>

	    <?php
	     $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $mypost = array("posts_per_page"=>8, 'category_name' => 'Insights' ,  "paged"=> $paged );
    $loop = new WP_Query( $mypost );
    ?>
    	<div class='left-press-posts col-lg-8'>
    			<div class="post-type-title" >Insights</div>
		<div class='post-list'>
    <?php while ( $loop->have_posts() ) : $loop->the_post();?>
<a href='<?php the_permalink(); ?>'>
			<div class='post-item'>
				<div class='post-title'><?php the_title(); ?></div>
				<div class='post-description'><?php the_excerpt() ?> </div>
				<div class='post-media'>

					<?php 

					if(null !==  get_post_meta( get_the_ID(), 'vimeo_link', true ) && get_post_meta( get_the_ID(), 'vimeo_link', true ) != "" ){
						$url = get_post_meta( get_the_ID(), 'vimeo_link', true );
						$arr = explode('/', $url);
						
					 ?>
					
					<iframe src="//player.vimeo.com/video/<?php  echo end($arr) ?>" width="500" height="280"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					<!-- <iframe src="<?php // echo get_post_meta( get_the_ID(), 'vimeo_link', true ) ?>" width="250" height="180" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> -->
					<?php }else{ ?>
					<?php the_post_thumbnail() ?>
					<?php } ?>
					
				</div>
				<div class='link-button bottom-right'>
					
						<span class="arrow-button icon-home_yellowband_arrow"></span>
				
				</div>
			</div>
	</a>
		
   <?php endwhile; ?>
   <div class="navigation">
<div class="alignright"><?php next_posts_link(' White Papers »',$loop->max_num_pages) ?></div>
<div class="alignright"><?php previous_posts_link('« White Papers ') ?></div>
</div>
		</div>
	</div>

	<div class='right-press-posts col-lg-4'>
	<!-- 	<div class='section-heading'>
			<h4>INSIGHTS</h4>

			<div class='section-sub-heading'>For any media queries <a href='#'>contact us</a></div>
		</div>
 -->
<?php
	  $mypost = array('showposts'=>2 , 'category_name' => 'case-studies');
    $loop = new WP_Query( $mypost );
    ?>
			<div class='post-item'>
				<div class='post-type'><a href="/casestudies/">Case Studies </a></div>
			 <?php while ( $loop->have_posts() ) : $loop->the_post();?>

				<a href='<?php the_permalink(); ?>'>
				<div class='post-media'>
					<?php the_post_thumbnail() ?>
				</div>
				<div class='post-date'> <?php echo esc_html( get_post_meta( get_the_ID(), 'media_coverage_date', true ) ); ?></div>
				<div class='post-title'><?php the_title(); ?></div>
				<!-- <div class='post-author'>- <?php // the_author(); ?> </div> -->
				<div class='post-description'><?php the_excerpt() ?></div>
				<div class='link-button bottom-right'>
					
						<span class="arrow-button icon-home_yellowband_arrow"></span>
					
				</div>
				</a>
		

	

	<?php endwhile; ?>

	</div>


	<?php
	  $mypost = array( 'post_type' => 'press_release', 'release_type'=>'white-paper' , 'showposts'=>2);
    $loop = new WP_Query( $mypost );
    ?>
		<div class='post-list'>
			<div class='post-item'>
				<div class='post-type'><a href="/whitepapers">White Paper</a></div>
			 <?php while ( $loop->have_posts() ) : $loop->the_post();?>

				<a href='<?php the_permalink(); ?>'>
				<div class='post-media'>
					<?php the_post_thumbnail() ?>
				</div>
				<div class='post-date'> <?php echo esc_html( get_post_meta( get_the_ID(), 'media_coverage_date', true ) ); ?></div>
				<div class='post-title'><?php the_title(); ?></div>
				<!-- <div class='post-author'>- <?php //  the_author(); ?> </div> -->
				<div class='post-description'><?php the_excerpt() ?></div>
				<div class='link-button bottom-right'>
					
						<span class="arrow-button icon-home_yellowband_arrow"></span>
					
				</div>
				</a>
			

	

	<?php endwhile; ?>
</div>
	<?php
	  $mypost = array( 'post_type' => 'report_type', 'report_type'=>'industry-report' , 'showposts'=>2);
    $loop = new WP_Query( $mypost );
    ?>
    			<div class='post-item'>
				<div class='post-type'><a href="/industryreports">Industry Reports</a></div>

			 <?php while ( $loop->have_posts() ) : $loop->the_post();?>

				<a href='<?php the_permalink(); ?>'>
				<div class='post-media'>
					<?php the_post_thumbnail() ?>
				</div>
				<div class='post-date'> <?php echo esc_html( get_post_meta( get_the_ID(), 'media_coverage_date', true ) ); ?></div>
				<div class='post-title'><?php the_title(); ?></div>
				<!-- <div class='post-author'>- <?php //  the_author(); ?> </div> -->
				<div class='post-description'><?php the_excerpt() ?></div>
				<div class='link-button bottom-right'>
					
						<span class="arrow-button icon-home_yellowband_arrow"></span>
					
				</div>
				</a>
			

	

	<?php endwhile; ?>

</div>




		</div>
	</div>


</div>
<?php 
get_footer(); // Loads the footer.php file 
?>

