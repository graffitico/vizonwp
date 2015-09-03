<?php
/*
Plugin Name: White Paper
Plugin URI: http://thegraffiti.co
Description: white papers to be viewed externally as PDF 
Version: 1.0
Author: Graffiti Collaborative
Author URI: http://thegraffiti.co
*/


add_action( 'init', 'create_paper' );
add_filter( 'template_include', 'include_paper_template_function', 1 );
add_action( 'init', 'create_paper_type_hierarchical_taxonomy', 0 );

add_action( 'admin_init', 'paper_admin' );

add_action( 'save_post', 'add_paper_fields', 10, 2 );

function paper_admin() {
    add_meta_box( 'paper_meta_box',
        'Paper Data',
        'display_paper_meta_box',
        'paper', 'normal', 'high'
    );
}

function add_paper_fields( $paper_id, $paper ) {
    // Check post type for movie reviews
    if ( $paper->post_type == 'paper' ) {
        // Store data in post meta table if present in post data
        if ( isset( $_POST['paper_link'] )  ) {
            update_post_meta( $paper_id, 'link', $_POST['paper_link'] );
        }
        if ( isset( $_POST['paper_link_text'] )  ) {
            update_post_meta( $paper_id, 'link_text', $_POST['paper_link_text'] );
        }

    }
}



function display_paper_meta_box( $paper ) {
    // Retrieve current name of the Director and Movie Rating based on review ID
    $link_text = esc_html( get_post_meta( $paper->ID, 'link_text', true ) );
    $link  = esc_html( get_post_meta( $paper->ID, 'link', true ) );
    
    ?>
    <table>
        <tr>
            <td style="width: 100%">External Link </td>
            <td><input type="text" name="paper_link" value="<?php echo $link; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 100%">Link Display Name</td>
            <td><input type="text" name="paper_link_text" value="<?php echo $link_text; ?>" /></td>
        </tr>

        
    </table>
    <?php
}





//create a custom taxonomy name it topics for your posts

function create_paper_type_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => _x( 'Paper Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Paper Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Paper Types' ),
    'all_items' => __( 'All Paper Types' ),
    'parent_item' => __( 'Parent Paper Types' ),
    'parent_item_colon' => __( 'Parent Paper Type:' ),
    'edit_item' => __( 'Edit Paper Type' ), 
    'update_item' => __( 'Update Paper Type' ),
    'add_new_item' => __( 'Add New Paper Type' ),
    'new_item_name' => __( 'New Paper Type Name' ),
    'menu_name' => __( 'Paper Types' ),
  );    

// Now register the taxonomy

  register_taxonomy('paper_type',array('paper'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'paper_type' ),
  ));

}

//////////



function include_paper_template_function( $template_path ) {

 if ( get_post_type() == 'paper' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-paper.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/single-paper.php';
            }
        }else{
           
           if ($post->post_title == 'White Papers') {
                    if ( $theme_file = locate_template( array ( 'list-white_paper.php' ) ) ) {
                        $template_path = $theme_file;
                    } else {
                        $template_path = plugin_dir_path( __FILE__ ) . '/list-white_paper.php';
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




function create_paper() {
    register_post_type( 'paper',
        array(
            'labels' => array(
                'name' => 'Paper',
                'singular_name' => 'Paper',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Paper',
                'edit' => 'Edit',
                'edit_item' => 'Edit Paper',
                'new_item' => 'New Paper',
                'view' => 'View',
                'view_item' => 'View Paper',
                'search_items' => 'Search Paper',
                'not_found' => 'No Paper found',
                'not_found_in_trash' => 'No Paper found in Trash',
                'parent' => 'Parent Paper'
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