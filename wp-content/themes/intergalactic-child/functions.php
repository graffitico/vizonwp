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

include 'short_codes.php';
add_post_type_support( 'press_release', 'author' );
add_post_type_support( 'industry_report', 'author' );
add_post_type_support( 'paper', 'author' );
add_image_size( 'mycustomsize', '250px' ,'', true );

    // function my_init()
    // {
    //     if (is_admin() === false)
    //     {
    //         wp_deregister_script('jquery');

    //         // Load the copy of jQuery that comes with WordPress
    //         // The last parameter set to TRUE states that it should be loaded
    //         // in the footer.
    //         wp_register_script('jquery', '/wp-includes/js/jquery/jquery.js', FALSE, '1.11.2', TRUE);

    //         wp_enqueue_script('jquery');
    //     }
    // }
    // add_action('init', 'my_init');

add_action( 'wp_ajax_echo_shortcode', 'echo_shortcode_callback' );

// remove_filter( 'the_content', 'wpautop' );
// remove_filter( 'the_excerpt', 'wpautop' );

function echo_shortcode_callback(){
  // echo stripslashes($_POST['shortcode']);
	echo  do_shortcode(stripslashes($_POST['shortcode']));
	die();
}


add_action('admin_init', 'load_scripts');


function load_scripts()
{
wp_enqueue_script('jquery-ui-dialog');
wp_enqueue_style("wp-jquery-ui-dialog");
add_editor_style('style.css');
}


function theme_enqueue_styles(){
  wp_enqueue_style('main', '/css/vizury.min.css' );
	wp_enqueue_style('job-op', get_template_directory_uri().'/css/job-op.css' );
}



function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function ajax_filter_posts_scripts() {
  // Enqueue script
  //   wp_register_script('jquery_script', get_site_url() . '/js/jquery.min.js', false, null, false);

  wp_register_script('afp_script', get_template_directory_uri() . '/js/ajax-filter-posts.js', false, null, true);


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

add_action('wp_enqueue_scripts','theme_enqueue_styles');







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
		'key'		=> 'experience_from',
		'value'	=>    array(0,0.5,1, 1.5),
		'compare' =>'IN'

		);
 	}elseif ($year_range == 2) {
 		$args[] = array(
		'key'=> 'experience_from',
		'value'	=> array(2, 2.5 ,3 , 3.5 ,4 ,4.5 ) ,
		'compare' =>'IN'
		);
 	}elseif ($year_range == 5) {
 		$args[] = array(

		'key'		=> 'experience_from',
		'value'	=>   array(5 , 5.5 , 6, 6.5 , 7, 7.5 , 8, 8.5 , 9 , 9.5 , 10 )  ,
		'compare' =>'IN'
		);
 	}
  elseif ($year_range == 10) {
    $args[] = array(

    'key'   => 'experience_from',
    'value' =>   array(10,10.5 , 11 , 11.5 , 12 , 12.5 , 13 , 13.5, 14, 14.5 , 15, 15.5 , 16, 16.5 , 17 , 17.5 , 18 , 18.5 , 19 ,19.5 , 20 )  ,
    'compare' =>'IN'
    );
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

      <a class="categ-down collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo the_ID() ?>"></a>

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
    if( isset($_POST['wp_custom_attachment_nonce']) && !wp_verify_nonce($_POST['wp_custom_attachment_nonce'], plugin_basename(__FILE__))) {
      return $id;
    } // end if

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return $id;
    } // end if

    if(isset($_POST['post_type']) &&'page' == $_POST['post_type']) {
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
/**
 * Extend Recent Posts Widget
 *
 * Adds different formatting to the default WordPress Recent Posts Widget
 */

Class My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

  function widget($args, $instance) {

// print_r($GLOBALS['post']);


    extract( $args );


    if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
      $number = 10;
// echo $GLOBALS['post']->post_type;
      if($GLOBALS['post']->post_type != "post"){
$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true , 'post_type' => $GLOBALS['post']->post_type ) ) );
     $suggest_string = 'Recent Posts';
       }else{
$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true , 'category_name' => 'case studies') ) );
     $suggest_string = 'Suggested Case Studies';

       }

    $title = apply_filters('widget_title', empty($instance['title']) ? __($suggest_string) : $instance['title'], $instance, $this->id_base);

    if( $r->have_posts() ) :

      echo '<section class="read-more-block"><div class="container-fluid">';
      if( $title ) echo '<div class="row"><div class="col-lg-12 text-center section-title"><h2>' . $title . '</h2></div></div>   <div class="row">'; ?>
<!--      <ul>
        <?php // while( $r->have_posts() ) : $r->the_post(); ?>
        <li><?php // the_time( 'F d'); ?> - <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
        <?php //endwhile; ?>
      </ul> -->
<?php


 while( $r->have_posts() ) : $r->the_post(); ?>

  <?php
$link = '';
$final_link = '';
  if ( has_post_thumbnail() ) {
    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'intergalactic-large' );
    $img_url =  esc_url( $thumbnail[0] );

 } ?>


    <?php
      $link = esc_html( get_post_meta( get_the_ID(), 'link', true ) );

    ?>
<?php
if($link == ''){
 $final_link = get_permalink();
 }else{
  $final_link =  $link;

} ?>
              <div class="col-sm-4 blog-entry-tile">
                <div class="ih-item square colored effect4" style="background-color: #626262;" >
                    <div class="img"><a href="<?= $final_link; ?>" target="_blank"><img  src="<?php if(isset($img_url)){ echo  $img_url; }else{ echo  '/images/logo_v.svg' ; }?>"></a></div>
                    <div class="mask1"></div>
                    <div class="mask2"></div>
                    <div class="mask2"></div>
                    <div class="info">
                        <h3><?php the_title(); ?></h3>

                    </div>
                </div>
                <a href="<?= $final_link; ?>" target="_blank">
                <h4><?php the_title(); ?></h4></a>
             <!--    <p><b>Author:</b> Vizury</p> -->
                <p><b>Date:</b><?php the_time( 'M d, Y'); ?></p>
                <p><?php the_excerpt(); ?></p>


                <!-- <a href="<?php the_permalink(); ?>" target="_blank"><img class="readmore-convert img-responsive bottom-right" alt="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeAQMAAAAB/jzhAAAAA1BMVEX///+nxBvIAAAAAXRSTlMAQObYZgAAAAxJREFUeNpjYBiMAAAAlgABjcjBIQAAAABJRU5ErkJggg=="></a> -->
            </div>
  <?php endwhile ?>


      <?php
      echo '</div></div></section>';

    wp_reset_postdata();

    endif;
  }
}
function my_recent_widget_registration() {

  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('My_Recent_Posts_Widget');
}
add_action('widgets_init', 'my_recent_widget_registration');


remove_action( 'widgets_init', 'intergalactic_widgets_init' );


function fb_filter_query( $query, $error = true ) {

if ( is_search() ) {
$query->is_search = false;
$query->query_vars['s'] = false;
$query->query['s'] = false;

// to error
if ( $error == true )
$query->is_404 = true;
}
}

add_action( 'parse_query', 'fb_filter_query' );
add_filter( 'get_search_form', create_function( '$a', "return null;" ) );



// add_filter('site_url',  'wpadmin_filter', 10, 3);
//  function wpadmin_filter( $url, $path, $orig_scheme ) {
//   $old  = array( "/(wp-admin)/");
//   $admin_dir = WP_ADMIN_DIR;
//   $new  = array($admin_dir);
//   return preg_replace( $old, $new, $url, 1);
//  }



// add_action('login_form','redirect_wp_admin');

// function redirect_wp_admin(){
// $redirect_to = $_SERVER['REQUEST_URI'];

// if(count($_REQUEST)> 0 && array_key_exists('redirect_to', $_REQUEST)){
// $redirect_to = $_REQUEST['redirect_to'];
// $check_wp_admin = stristr($redirect_to, 'wp-admin');
// if($check_wp_admin){
// wp_safe_redirect( '404.php' );
// }
// }
// }

// add_action('init','custom_login');

// function custom_login(){
//  global $pagenow;
//  if( 'wp-login.php' == $pagenow ) {
//   wp_redirect('404.php');
//   exit();
//  }
// }



add_action('wp_head' , 'redirect_check'  );

function redirect_check(){
$site_id = get_current_blog_id();
$site = get_blog_details( array( 'blog_id' => $site_id ));


if( $site->blogname == "vizury.com" && is_front_page() ){

  if(!isset($_GET['redirect']) && $_GET['redirect'] != "false" ){

  $ip = get_client_ip();
  $ip_data =   geoCheckIP( $ip );
  if($ip_data != "ip_invalid" && $ip_data->status  == "success")
  {
    if($ip_data->countryCode == 'USJ' ){
     
        wp_redirect( home_url()."/mobile" ); exit;
    }
  }
}


}






}

// Function to get the client IP address
function get_client_ip() {
    $ipaddress = getenv('HTTP_CLIENT_IP')?:
getenv('HTTP_X_FORWARDED_FOR')?:
getenv('HTTP_X_FORWARDED')?:
getenv('HTTP_FORWARDED_FOR')?:
getenv('HTTP_FORWARDED')?:
getenv('REMOTE_ADDR');
    return $ipaddress;
}


function geoCheckIP( $ip )
{
    //check, if the provided ip is valid
    if( !filter_var( $ip, FILTER_VALIDATE_IP ) )
    {
       return "ip_invalid";
    }else{
          //contact ip-server
    $response=@file_get_contents( 'http://ip-api.com/json/'.$ip );
    return json_decode($response);
    }


    
}




?>