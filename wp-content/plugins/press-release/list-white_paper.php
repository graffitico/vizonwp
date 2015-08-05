<?php
 /*Template Name: list white paper
 */
 
get_header(); ?>
<div class='press-release-container row'>
	<h3> WHITE PAPERS</h3>
	    <?php
    $mypost = array( 'post_type' => 'press_release', 'release_type'=>'white-paper');
    $loop = new WP_Query( $mypost );
    ?>
    	<div class='left-press-posts col-lg-8'>
		<div class='post-list'>
    <?php while ( $loop->have_posts() ) : $loop->the_post();?>

			<div class='post-item'>
				<div class='post-title'><?php the_title(); ?></div>
				<div class='post-description'><?php the_excerpt() ?> </div>
				<div class='post-media'>
					 <?php the_post_thumbnail() ?>
				</div>
				<div class='link-button bottom-right'>
					<a href='<?php the_permalink(); ?>'>
						<span class="arrow-button icon-home_yellowband_arrow"></span>
					</a>
				</div>
			</div>

		
   <?php endwhile; ?>

		</div>
	</div>

		<div class='right-press-posts col-lg-4'>
		<div class='section-heading'>
			<h4>WHITE PAPERS</h4>
	<?php
	  $mypost = array( 'post_type' => 'press_release', 'release_type'=>'insight');
    $loop = new WP_Query( $mypost );
    ?>
			<div class='section-sub-heading'>For any media queries <a href='#'>contact us</a></div>
		</div>
		<div class='post-list'>

			 <?php while ( $loop->have_posts() ) : $loop->the_post();?>
			<div class='post-item'>
				<div class='post-type'>WHITE PAPER</div>
				<div class='post-media'>
					<?php the_post_thumbnail() ?>
				</div>
				<div class='post-date'> <?php echo esc_html( get_post_meta( get_the_ID(), 'media_coverage_date', true ) ); ?></div>
				<div class='post-title'><?php the_title(); ?></div>
				<div class='post-author'>- <?php  the_author(); ?> </div>
				<div class='post-description'><?php the_excerpt() ?></div>
				<div class='link-button bottom-right'>
					<a href='<?php the_permalink(); ?>'>
						<span class="arrow-button icon-home_yellowband_arrow"></span>
					</a>
				</div>
			</div>

	

	<?php endwhile; ?>

	<?php
	  $mypost = array( 'post_type' => 'press_release', 'release_type'=>'industry-report');
    $loop = new WP_Query( $mypost );
    ?>

			 <?php while ( $loop->have_posts() ) : $loop->the_post();?>
			<div class='post-item'>
				<div class='post-type'>INDUSTRY REPORT</div>
				<div class='post-media'>
					<?php the_post_thumbnail() ?>
				</div>
				<div class='post-date'> <?php echo esc_html( get_post_meta( get_the_ID(), 'media_coverage_date', true ) ); ?></div>
				<div class='post-title'><?php the_title(); ?></div>
				<div class='post-author'>- <?php  the_author(); ?> </div>
				<div class='post-description'><?php the_excerpt() ?></div>
				<div class='link-button bottom-right'>
					<a href='<?php the_permalink(); ?>'>
						<span class="arrow-button icon-home_yellowband_arrow"></span>
					</a>
				</div>
			</div>

	

	<?php endwhile; ?>






		</div>
	</div>



</div>
<?php 
get_footer(); // Loads the footer.php file 
?>

