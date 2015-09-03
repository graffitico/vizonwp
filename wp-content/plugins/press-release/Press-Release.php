<?php
/*
Plugin Name: Press Release
Plugin URI: http://thegraffiti.co
Description: A plugin for press release.
Version: 1.0
Author: Graffiti Collaborative
Author URI: http://thegraffiti.co
*/


add_action( 'init', 'create_release' );
add_filter( 'template_include', 'include_press_template_function', 1 );
add_action( 'init', 'create_type_hierarchical_taxonomy', 0 );

add_action( 'admin_init', 'press_admin' );

add_action( 'save_post', 'add_press_release_fields', 10, 2 );

function press_admin() {
    add_meta_box( 'press_release_meta_box',
        'Media Coverage Date',
        'display_press_release_meta_box',
        'press_release', 'normal', 'high'
    );
   add_meta_box( 'press_release_video_meta_box',
        'Vimeo Video Link',
        'display_press_release_video_meta_box',
        'press_release', 'normal', 'high'
    );
}

function add_press_release_fields( $press_release_id, $press_release ) {
    // Check post type for movie reviews
    if ( $press_release->post_type == 'press_release' ) {
        // Store data in post meta table if present in post data
        if ( isset( $_POST['press_release_media_coverage_date'] ) ) {
            update_post_meta( $press_release_id, 'media_coverage_date', $_POST['press_release_media_coverage_date'] );
        }
         if ( isset( $_POST['press_release_vimeo_link'] ) ) {
            update_post_meta( $press_release_id, 'vimeo_link', $_POST['press_release_vimeo_link'] );
        }
       if ( isset( $_POST['press_release_link'] )  ) {
            update_post_meta( $press_release_id, 'link', $_POST['press_release_link'] );
        }
    
    }
}




function display_press_release_meta_box( $press_release ) {
    // Retrieve current name of the Director and Movie Rating based on review ID
    $media_coverage_date = esc_html( get_post_meta( $press_release->ID, 'media_coverage_date', true ) );
    $link = esc_html( get_post_meta( $press_release->ID, 'link', true ) );
    
    ?>
    <table>
        <tr>
            <td style="width: 100%">Media Coverage Date</td>
            <td><input type="text" name="press_release_media_coverage_date" value="<?php echo $media_coverage_date; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 100%"> External Link </td>
            <td><input type="text" name="press_release_link" value="<?php echo $link; ?>" /></td>
        </tr>

        
    </table>
    <?php
}
function display_press_release_video_meta_box( $press_release ) {
    // Retrieve current name of the Director and Movie Rating based on review ID
    // $media_coverage_date = esc_html( get_post_meta( $press_release->ID, 'media_coverage_date', true ) );
    $vimeo_link = esc_html( get_post_meta( $press_release->ID, 'vimeo_link', true ) );
    
    ?>
    <table>

         <tr>
            <td style="width: 100%">Vimeo Video Link</td>
            <td><input type="text" name="press_release_vimeo_link" value="<?php echo $vimeo_link; ?>" /></td>
        </tr>
        
    </table>
    <?php
}




//create a custom taxonomy name it topics for your posts

function create_type_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => _x( 'Release Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Release Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Release Types' ),
    'all_items' => __( 'All Release Types' ),
    'parent_item' => __( 'Parent Release Types' ),
    'parent_item_colon' => __( 'Parent Release Type:' ),
    'edit_item' => __( 'Edit Release Type' ), 
    'update_item' => __( 'Update Release Type' ),
    'add_new_item' => __( 'Add New Release Type' ),
    'new_item_name' => __( 'New Release Type Name' ),
    'menu_name' => __( 'Release Types' ),
  );    

// Now register the taxonomy

  register_taxonomy('release_type',array('press_release'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'press_release_type' ),
  ));

}

//////////



function include_press_template_function( $template_path ) {

 if ( isset($post) && get_post_type() == 'press_release' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-press_release.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/single-press_release.php';
            }
        }else{
            if($post->post_title == 'Press Release'){
                if ( $theme_file = locate_template( array ( 'list-press_release.php' ) ) ) {
                    $template_path = $theme_file;
                } else {
                    $template_path = plugin_dir_path( __FILE__ ) . '/list-press_release.php';
                }   
            }elseif($post->post_title == 'Media Coverage') {
                    if ( $theme_file = locate_template( array ( 'list-media_coverage.php' ) ) ) {
                        $template_path = $theme_file;
                    } else {
                        $template_path = plugin_dir_path( __FILE__ ) . '/list-media_coverage.php';
                    }   
            }elseif ($post->post_title == 'White Papers') {
                    if ( $theme_file = locate_template( array ( 'list-white_paper.php' ) ) ) {
                        $template_path = $theme_file;
                    } else {
                        $template_path = plugin_dir_path( __FILE__ ) . '/list-white_paper.php';
                    }               
            }elseif ($post->post_title == 'Insights') {
                    if ( $theme_file = locate_template( array ( 'list-insight.php' ) ) ) {
                        $template_path = $theme_file;
                    } else {
                        $template_path = plugin_dir_path( __FILE__ ) . '/list-insight.php';
                    }               
            }elseif ($post->post_title == 'Industry Reports') {
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




function create_release() {
    register_post_type( 'press_release',
        array(
            'labels' => array(
                'name' => 'Press Release',
                'singular_name' => 'Press Release',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Press Release',
                'edit' => 'Edit',
                'edit_item' => 'Edit Press Release',
                'new_item' => 'New Press Release',
                'view' => 'View',
                'view_item' => 'View Press Release',
                'search_items' => 'Search Press Release',
                'not_found' => 'No Press Release found',
                'not_found_in_trash' => 'No Press Release found in Trash',
                'parent' => 'Parent Press Release'
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