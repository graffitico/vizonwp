<?php
/**
 * Intergalactic functions and definitions
 *
 * @package Intergalactic
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
function theme_enqueue_styles(){
	wp_enqueue_style('job-op', get_template_directory_uri().'/css/job-op.css' );


}

add_action('wp_enqueue_scripts','theme_enqueue_styles');



function ajax_filter_posts_scripts() {
  // Enqueue script
  wp_register_script('afp_script', get_template_directory_uri() . '/js/ajax-filter-posts.js', false, null, true);
  wp_register_script('selectfx_script', get_template_directory_uri() . '/js/selectFx.js', false, null, false);
  
   wp_enqueue_script('selectfx_script');
  wp_enqueue_script('afp_script');
 
  wp_localize_script( 'afp_script', 'afp_vars', array(
        'afp_nonce' => wp_create_nonce( 'afp_nonce' ), // Create nonce which we later will use to verify AJAX request
        'afp_ajax_url' => admin_url( 'admin-ajax.php' ),
      )
  );

}
add_action('wp_enqueue_scripts', 'ajax_filter_posts_scripts', 100);









// Script for getting posts
function ajax_filter_get_posts( $taxonomy ) {
 
  // Verify nonce
  if( !isset( $_POST['afp_nonce'] ) || !wp_verify_nonce( $_POST['afp_nonce'], 'afp_nonce' ) )
    die('Permission denied');
 
  $taxonomy = $_POST['taxonomy'];
  $year_range = $_POST['year'] ;
  $location = $_POST['location'];
  $q = $_POST['q'];



  // WP Query
 


  $args = array('relation' => 'AND');
 if($location || $location != ''){
	$args[] = array(	
		
		'key'		=> 'posting_location',
		'value'	=>  $location
		);
 }
 

 if($year_range || $year_range != '' )
 {

 	if($year_range == 0){
 		$args[] = array(	
		'relation' => 'OR',
		array(
		'key'		=> 'experience_from',
		'value'	=>  0 ,
		'compare' =>'>=',
		'type'    => 'numeric'
		)
		, array(	
		
		'key'		=> 'experience_to',
		'value'	=>  1 ,
		'compare' =>'<=',
		'type'    => 'numeric'
		));
 	}elseif ($year_range == 2) {
 		$args[] = array(	
		'relation' => 'OR',
		array(
		'key'=> 'experience_from',
		'value'	=>  1 ,
		'compare' =>'>',
		'type'    => 'numeric'
		)
		,array(	
		
		'key'		=> 'experience_to',
		'value'	=>  4 ,
		'compare' =>'<=',
		'type'    => 'numeric'
		));
 	}elseif ($year_range == 5) {
 		$args[] = array(	
		'relation' => 'OR' ,
       array(

		'key'		=> 'experience_from',
		'value'	=>   4 ,
		'compare' =>'>',
		'type'    => 'numeric'
		), array(	
		
		'key'		=> 'experience_to',
		'value'	=>  10 ,
		'compare' =>'<=',
		'type'    => 'numeric'
		));
 	}
 		
 }

 // if($q || $q != ''){
	// $args[] = array(	
		
	// 	'column'		=> 'post_title',
	// 	'value'	=>  $q,
	// 	'compare' => 'LIKE',


	// 	);
 // }

  // If taxonomy is not set, remove key from array and get all posts
  // if( !$taxonomy ) {
  //   unset( $args['tag'] );
  // }
 
if($taxonomy || $taxonomy != ''  ){
 $final = array('post_type' => 'job_postings', 'departments' => $taxonomy , 'meta_query' =>  $args , 's' => $q  );
}else{
 $final = array('post_type' => 'job_postings' , 'meta_query' =>  $args  , 's' => $q   );
}

  $query = new WP_Query(

$final

    );
 
  if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
 
    <div class="panel panel-default">
      <div class="row job-result panel-heading">
      
      <div class="col-md-4"><span class="categ-head"><?php echo the_title(); ?></span></div>
      <div class="col-md-4"><span class="categ-head"><?php  echo intval( get_post_meta( get_the_ID(), 'experience_from', true ) )  ?>-<?php  echo intval( get_post_meta( get_the_ID(), 'experience_to', true ) )  ?> Years</span></div>
      <div class="col-md-4"><span class="categ-head"> <?php echo esc_html( get_post_meta( get_the_ID(), 'posting_location', true ) ); ?>
      
      <a class="categ-down" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo the_ID() ?>"><img src="<?php echo get_site_url() ?>/imgs/categ-plus.svg" /></a>
       
      </span></div>
      
      </div><!-- end of row -->
      
      <!-- Job Description -->
      <div class="row">
      
      <div id="collapse-<?php echo the_ID() ?>" class="col-md-12 panel-collapse collapse out">
      <section class="job-desc panel-body">
      
     <?php echo the_content(); ?>
      <button class="apply-button" type="button">Apply</button>
      </section>      
      </div>
      
      </div><!-- end of row/Job Description -->
      
      </div><!-- end of panel-default -->
    
 
  <?php endwhile; ?>
  <?php else: ?>
    <h2>No job posts found</h2>
  <?php endif;
 
  die();
}
 
add_action('wp_ajax_filter_posts', 'ajax_filter_get_posts');
add_action('wp_ajax_nopriv_filter_posts', 'ajax_filter_get_posts');







?>