<?php
/**
 * Intergalactic functions and definitions
 *
 * @package Intergalactic
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

// function all_posts_on_case_studies_page( $query ) {

  

//       // query_posts();
//     }

// add_action( 'pre_get_posts', 'all_posts_on_case_studies_page' );

// include 'short_codes.php';


// add_action( 'wp_ajax_echo_shortcode', 'echo_shortcode_callback' );

// function echo_shortcode_callback(){
//   // echo stripslashes($_POST['shortcode']);
// 	echo  do_shortcode(stripslashes($_POST['shortcode']));
// 	die();
// }


// add_action('admin_init', 'load_scripts');


// function load_scripts()
// {
// wp_enqueue_script('jquery-ui-dialog');
// wp_enqueue_style("wp-jquery-ui-dialog");
// add_editor_style('style.css');
// }


function theme_enqueue_styles(){
	wp_enqueue_style('job-op', get_template_directory_uri().'/css/job-op.css' );


}

add_action('wp_enqueue_scripts','theme_enqueue_styles');

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function ajax_filter_posts_scripts() {
  // Enqueue script
  //   wp_register_script('jquery_script', get_site_url() . '/js/jquery.min.js', false, null, false);

  wp_register_script('afp_script', get_template_directory_uri() . '/js/ajax-filter-posts.js', false, null, true);
  wp_register_script('reverse_scroll_script', get_site_url() . '/js/reversescroll.js', false, null, true);
  

  // wp_register_script('selectfx_script', get_template_directory_uri() . '/js/selectFx.js', false, null, false);
  //     wp_register_script('kwiks', get_site_url() . '/js/kwiks.js', false, null, false);
  
  //  wp_register_script('bootstrap_script', get_site_url() . '/js/bootstrap.min.js', false, null, false);
  
  // wp_register_script('global_script', get_site_url() . '/js/global.js', false, null, false);

  // wp_register_script('flex_script', get_site_url() . '/js/jquery.flexslider-min.js', false, null, false);
  // wp_register_script('creative_script', get_site_url() . '/js/creative.js', false, null, false);

  // wp_register_script('wow_script', get_site_url() . '/js/wow.min.js', false, null, false);
  // wp_register_script('fittext_script', get_site_url() . '/js/jquery.fittext.js', false, null, false);

  // wp_register_script('classie_script', get_site_url() . '/js/classie.js', false, null, false);
  // wp_register_script('easing_script', get_site_url() . '/js/jquery.easing.min.js', false, null, false);
  // wp_register_script('smooth_scroll_script', get_site_url() . '/js/SmoothScroll.js', false, null, false);
  


  

  


  
  //  wp_enqueue_script('jquery_script');
  //  wp_enqueue_script('bootstrap_script');
  //     wp_enqueue_script('kwiks');
  //  wp_enqueue_script('flex_script');
 

  //  wp_enqueue_script('selectfx_script');
  // wp_enqueue_script('afp_script');
  //  wp_enqueue_script('fittext_script');
  //     wp_enqueue_script('wow_script');
  //  wp_enqueue_script('creative_script');
  //     wp_enqueue_script('classie_script');
  //  wp_enqueue_script('easing_script');
  //     wp_enqueue_script('smooth_scroll_script');


wp_enqueue_script('afp_script');


if(is_page( 'About' ))
{
wp_enqueue_script('reverse_scroll_script');
}
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
      <button data-toggle="modal" data-target="#apply-modal" class="apply-button" data-id="<?php echo the_ID() ?>" >Apply</button>
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






/****************************** custom functions for case studies attachments  start **********************************************/


function add_custom_meta_boxes() {
 
    // Define the custom attachment for posts
    add_meta_box(
        'wp_custom_attachment',
        'Custom Attachment',
        'wp_custom_attachment',
        'post',
        'side'
    );
     
    // Define the custom attachment for pages
    add_meta_box(
        'wp_custom_attachment',
        'Custom Attachment',
        'wp_custom_attachment',
        'page',
        'side'
    );
 
} // end add_custom_meta_boxes
add_action('add_meta_boxes', 'add_custom_meta_boxes');


function wp_custom_attachment() {
 
    wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment_nonce');
     
    $html = '<p class="description">';
        $html .= 'Upload your PDF here.';
    $html .= '</p>';
    $html .= '<input type="file" id="wp_custom_attachment" name="wp_custom_attachment" value="" size="25" />';
     
    echo $html;
 
} // end wp_custom_attachment




function save_custom_meta_data($id) {
 
    /* --- security verification --- */
    if(!wp_verify_nonce($_POST['wp_custom_attachment_nonce'], plugin_basename(__FILE__))) {
      return $id;
    } // end if
       
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return $id;
    } // end if
       
    if('page' == $_POST['post_type']) {
      if(!current_user_can('edit_page', $id)) {
        return $id;
      } // end if
    } else {
        if(!current_user_can('edit_page', $id)) {
            return $id;
        } // end if
    } // end if
    /* - end security verification - */
     
    // Make sure the file array isn't empty
    if(!empty($_FILES['wp_custom_attachment']['name'])) {
         
        // Setup the array of supported file types. In this case, it's just PDF.
        $supported_types = array('application/pdf');
         
        // Get the file type of the upload
        $arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment']['name']));
        $uploaded_type = $arr_file_type['type'];
         
        // Check if the type is supported. If not, throw an error.
        if(in_array($uploaded_type, $supported_types)) {
 
            // Use the WordPress API to upload the file
            $upload = wp_upload_bits($_FILES['wp_custom_attachment']['name'], null, file_get_contents($_FILES['wp_custom_attachment']['tmp_name']));
     
            if(isset($upload['error']) && $upload['error'] != 0) {
                wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
            } else {
                add_post_meta($id, 'wp_custom_attachment', $upload);
                update_post_meta($id, 'wp_custom_attachment', $upload);     
            } // end if/else
 
        } else {
            wp_die("The file type that you've uploaded is not a PDF.");
        } // end if/else
         
    } // end if
     
} // end save_custom_meta_data
add_action('save_post', 'save_custom_meta_data');




/****************************** custom functions for case studies attachments end **********************************************/






?>