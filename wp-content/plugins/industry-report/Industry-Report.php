<?php
/*
Plugin Name: Industry Report
Plugin URI: http://thegraffiti.co
Description: A plugin for Industry Report.
Version: 1.0
Author: Graffiti Collaborative
Author URI: http://thegraffiti.co
*/


add_action( 'init', 'create_report' );
add_filter( 'template_include', 'include_report_template_function', 1 );
add_action( 'init', 'create_report_type_hierarchical_taxonomy', 0 );

add_action( 'admin_init', 'report_admin' );

add_action( 'save_post', 'add_industry_report_fields', 10, 2 );

function report_admin() {
    add_meta_box( 'industry_report_meta_box',
        'Coverage Date',
        'display_industry_report_meta_box',
        'industry_report', 'normal', 'high'
    );
}

function add_industry_report_fields( $industry_report_id, $industry_report ) {
    // Check post type for movie reviews
    if ( $industry_report->post_type == 'industry_report' ) {
        // Store data in post meta table if present in post data
        if ( isset( $_POST['industry_report_coverage_date'] ) && $_POST['industry_report_coverage_date'] != '' ) {
            update_post_meta( $press_release_id, 'coverage_date', $_POST['industry_report_coverage_date'] );
        }

    }
}



function display_industry_report_meta_box( $industry_report ) {
    // Retrieve current name of the Director and Movie Rating based on review ID
    $coverage_date = esc_html( get_post_meta( $industry_report->ID, 'coverage_date', true ) );

    
    ?>
    <table>
        <tr>
            <td style="width: 100%">Coverage Date</td>
            <td><input type="text" name="industry_report_coverage_date" value="<?php echo $coverage_date; ?>" /></td>
        </tr>

        
    </table>
    <?php
}





//create a custom taxonomy name it topics for your posts

function create_report_type_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => _x( 'Report Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Report Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Report Types' ),
    'all_items' => __( 'All Report Types' ),
    'parent_item' => __( 'Parent Report Types' ),
    'parent_item_colon' => __( 'Parent Report Type:' ),
    'edit_item' => __( 'Edit Report Type' ), 
    'update_item' => __( 'Update Report Type' ),
    'add_new_item' => __( 'Add New Report Type' ),
    'new_item_name' => __( 'New Report Type Name' ),
    'menu_name' => __( 'Report Types' ),
  );    

// Now register the taxonomy

  register_taxonomy('report_type',array('industry_report'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'industry_report_type' ),
  ));

}

//////////



function include_report_template_function( $template_path ) {

 if ( get_post_type() == 'industry_report' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-industry_report.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/single-industry_report.php';
            }
        }else{
           
           if ($post->post_title == 'Industry Reports') {
                    if ( $theme_file = locate_template( array ( 'list-industry_reports.php' ) ) ) {
                        $template_path = $theme_file;
                    } else {
                        $template_path = plugin_dir_path( __FILE__ ) . '/list-industry_reports.php';
                    }               
            }
        }
    }
    return $template_path;









    
   //  if ( get_post_type() == 'press_release' ) {
   //      if ( is_single() ) {
   //          // checks if the file exists in the theme first,
   //          // otherwise serve the file from the plugin
   //          if ( $theme_file = locate_template( array ( 'single-press_release.php' ) ) ) {
   //              $template_path = $theme_file;
   //          } else {
   //              $template_path = plugin_dir_path( __FILE__ ) . '/single-press_release.php';
   //          }
   //      }else{

			// 			if($post->post_title == 'Press Release'){
	            
   //      	}elseif($post->post_title == 'Media Coverage') {
   //      		    if ( $theme_file = locate_template( array ( 'list-media_coverage.php' ) ) ) {
		 //                $template_path = $theme_file;
		 //            } else {
		 //                $template_path = plugin_dir_path( __FILE__ ) . '/list-media_coverage.php';
		 //            }   
			// }elseif ($post->post_title == 'White Papers') {
   //      		    if ( $theme_file = locate_template( array ( 'list-white_paper.php' ) ) ) {
		 //                $template_path = $theme_file;
		 //            } else {
		 //                $template_path = plugin_dir_path( __FILE__ ) . '/list-white_paper.php';
		 //            }  				
			// }elseif ($post->post_title == 'Insights') {
   //      		    if ( $theme_file = locate_template( array ( 'list-insight.php' ) ) ) {
		 //                $template_path = $theme_file;
		 //            } else {
		 //                $template_path = plugin_dir_path( __FILE__ ) . '/list-insight.php';
		 //            }  				
			// }elseif ($post->post_title == 'Industry Reports') {
   //      		    if ( $theme_file = locate_template( array ( 'list-industry_reports.php' ) ) ) {
		 //                $template_path = $theme_file;
		 //            } else {
		 //                $template_path = plugin_dir_path( __FILE__ ) . '/list-industry_reports.php';
		 //            }  				
			// }

   //      }
   //  }
   //  return $template_path;
			 
   // //      	}elseif($post->post_title == 'Media Coverage') {
   // //      		    if ( $theme_file = locate_template( array ( 'list-media_coverage.php' ) ) ) {
		 // //                $template_path = $theme_file;
		 // //            } else {
		 // //                $template_path = plugin_dir_path( __FILE__ ) . '/list-media_coverage.php';
		 // //            }   
			// // }elseif ($post->post_title == 'White Papers') {
   // //      		    if ( $theme_file = locate_template( array ( 'list-white_paper.php' ) ) ) {
		 // //                $template_path = $theme_file;
		 // //            } else {
		 // //                $template_path = plugin_dir_path( __FILE__ ) . '/list-white_paper.php';
		 // //            }  				
			// // }elseif ($post->post_title == 'Insights') {
   // //      		    if ( $theme_file = locate_template( array ( 'list-insight.php' ) ) ) {
		 // //                $template_path = $theme_file;
		 // //            } else {
		 // //                $template_path = plugin_dir_path( __FILE__ ) . '/list-insight.php';
		 // //            }  				
			// // }elseif ($post->post_title == 'Industry Reports') {
   // //      		    if ( $theme_file = locate_template( array ( 'list-industry_reports.php' ) ) ) {
		 // //                $template_path = $theme_file;
		 // //            } else {
		 // //                $template_path = plugin_dir_path( __FILE__ ) . '/list-industry_reports.php';
		 // //            }  				
			// // }

   // //      }
   // //  }
   // //  return $template_path;
}




function create_report() {
    register_post_type( 'industry_report',
        array(
            'labels' => array(
                'name' => 'Industry Report',
                'singular_name' => 'Industry Report',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Industry Report',
                'edit' => 'Edit',
                'edit_item' => 'Edit Industry Report',
                'new_item' => 'New Industry Report',
                'view' => 'View',
                'view_item' => 'View Industry Report',
                'search_items' => 'Search Industry Report',
                'not_found' => 'No Industry Report found',
                'not_found_in_trash' => 'No Industry Report found in Trash',
                'parent' => 'Parent Industry Report'
            ),
 
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'taxonomies' => array( '' ),
            'has_archive' => true
        )
    );
}

?>