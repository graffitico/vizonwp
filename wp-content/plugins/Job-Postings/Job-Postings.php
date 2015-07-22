<?php
/*
Plugin Name: Job Postings
Plugin URI: http://thegraffiti.co
Description: Declares a plugin that will create a custom post type displaying job postings.
Version: 1.0
Author: Graffiti Collaborative
Author URI: http://thegraffiti.co
*/
add_action( 'init', 'create_jobs' );
add_action( 'admin_init', 'my_admin' );
add_action( 'save_post', 'add_job_posting_fields', 10, 2 );
// add_action( 'save_post', 'add_job_application_fields', 10, 2 );
add_filter( 'template_include', 'include_template_function', 1 );

add_filter('manage_job_applications_posts_columns', 'bs_job_application_table_head');
add_action( 'manage_job_applications_posts_custom_column', 'bs_job_application_table_content', 10, 2 );


add_action('post_edit_form_tag', 'update_edit_form');


//////////



add_action( 'init', 'create_department_hierarchical_taxonomy', 0 );



//create a custom taxonomy name it topics for your posts

function create_department_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => _x( 'Department', 'taxonomy general name' ),
    'singular_name' => _x( 'Department', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Departments' ),
    'all_items' => __( 'All Departments' ),
    'parent_item' => __( 'Parent Department' ),
    'parent_item_colon' => __( 'Parent Department:' ),
    'edit_item' => __( 'Edit Department' ), 
    'update_item' => __( 'Update Department' ),
    'add_new_item' => __( 'Add New Department' ),
    'new_item_name' => __( 'New Department Name' ),
    'menu_name' => __( 'Departments' ),
  );    

// Now register the taxonomy

  register_taxonomy('departments',array('job_postings'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'department' ),
  ));

}

//////////




function update_edit_form() {
	
    echo ' enctype="multipart/form-data"';
}

function bs_job_application_table_head( $defaults ) {
    $defaults['application_name']  = 'Applicant Name';
    $defaults['application_email']    = 'Email';
    $defaults['application_phone']   = 'Phone';
    $defaults['job_id'] = 'Job Position';
    $defaults['resume_attachment'] = 'Resume';
    return $defaults;
}


function bs_job_application_table_content( $column_name, $post_id ) {
	
    if ($column_name == 'application_name') {
    $applicant = get_post_meta( $post_id, 'application_name', true ) ;
      echo  $applicant;
    }
    elseif ($column_name == 'application_email') {
    $applicant = get_post_meta( $post_id, 'application_email', true ) ;
      echo  $applicant;
    }   
    elseif ($column_name == 'application_phone') {
    $applicant = get_post_meta( $post_id, 'application_phone', true ) ;
      echo  $applicant;
    } 
    elseif ($column_name == 'job_id') {
    $applicant = get_post_meta( $post_id, 'job_id', true ) ;
    $post =  get_post( $applicant );  

      echo  $post->post_title;
      
    }
    elseif ($column_name == 'resume_attachment') {
    $applicant =  get_post_meta( $post_id, 'resume_attachment', true);
  

      echo  '<a href="'.  $applicant['url'].'">
    Download PDF Here
</a>';
      
    }
   


}



function my_admin() {
    add_meta_box( 'job_posting_meta_box',
        'Job Posting Details',
        'display_job_posting_meta_box',
        'job_postings', 'normal', 'high'
    );
    add_meta_box( 'job_application_meta_box',
        'Job Application Details',
        'display_job_posting_meta_box',
        'job_applications', 'normal', 'high'
    );

}

function include_template_function( $template_path ) {
    if ( get_post_type() == 'job_postings' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-job_postings.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/single-job_postings.php';
            }
        }
    }
    return $template_path;
}

function add_job_posting_fields( $job_id, $job_obj ) {
    // Check post type for job postings
    if ( $job_obj->post_type == 'job_postings' ) {
        // Store data in post meta table if present in post data
        if ( isset( $_POST['job_posting_location_name'] ) && $_POST['job_posting_location_name'] != '' ) {
            update_post_meta( $job_id, 'posting_location', $_POST['job_posting_location_name'] );
        }
        if ( isset( $_POST['job_posting_experience_from'] ) && $_POST['job_posting_experience_from'] != '' ) {
            update_post_meta( $job_id, 'experience_from', $_POST['job_posting_experience_from'] );
        }
        if ( isset( $_POST['job_posting_experience_to'] ) && $_POST['job_posting_experience_to'] != '' ) {
            update_post_meta( $job_id, 'experience_to', $_POST['job_posting_experience_to'] );
        }
    }
    
    elseif ( $job_obj->post_type == 'job_applications' ) {
        // Store data in post meta table if present in post data
        if ( isset( $_POST['job_application_name'] ) && $_POST['job_application_name'] != '' ) {
            update_post_meta( $job_id, 'application_name', $_POST['job_application_name'] );
        }
        if ( isset( $_POST['job_application_email'] ) && $_POST['job_application_email'] != '' ) {
            update_post_meta( $job_id, 'application_email', $_POST['job_application_email'] );
        }
        if ( isset( $_POST['job_application_phone'] ) && $_POST['job_application_phone'] != '' ) {
            update_post_meta( $job_id, 'application_phone', $_POST['job_application_phone'] );
        }
        if ( isset( $_POST['application_job_id'] ) && $_POST['application_job_id'] != '' ) {
            update_post_meta( $job_id, 'job_id', $_POST['application_job_id'] );
        }

        // print_r($_FILES['resume_attachment']);
        // die();
        // Make sure the file array isn't empty
    if(!empty($_FILES['resume_attachment']['name'])) {
         
        // Setup the array of supported file types. In this case, it's just PDF.
        $supported_types = array('application/pdf');
         
        // Get the file type of the upload
        $arr_file_type = wp_check_filetype(basename($_FILES['resume_attachment']['name']));
        $uploaded_type = $arr_file_type['type'];
         
        // Check if the type is supported. If not, throw an error.
        if(in_array($uploaded_type, $supported_types)) {
 
            // Use the WordPress API to upload the file
            $upload = wp_upload_bits($_FILES['resume_attachment']['name'], null, file_get_contents($_FILES['resume_attachment']['tmp_name']));
     
            if(isset($upload['error']) && $upload['error'] != 0) {
                wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
            } else {
                add_post_meta($job_id, 'resume_attachment', $upload);
                update_post_meta($job_id, 'resume_attachment', $upload);     
            } // end if/else
 
        } else {
            wp_die("The file type that you've uploaded is not a PDF.");
        } // end if/else
         
    } // end if





    }
    	# code...
    
}



// function add_job_application_fields( $job_application_id, $job_application ) {
//     // Check post type for job application posts

// }



function create_jobs() {
    register_post_type( 'job_postings',
        array(
            'labels' => array(
                'name' => 'Job Postings',
                'singular_name' => 'Job Posting',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Job Posting',
                'edit' => 'Edit',
                'edit_item' => 'Edit Job Posting',
                'new_item' => 'New Job Posting',
                'view' => 'View',
                'view_item' => 'View Job Posting',
                'search_items' => 'Search Job Postings',
                'not_found' => 'No Job Postings found',
                'not_found_in_trash' => 'No Job Postings found in Trash',
                'parent' => 'Parent Job Posting'
            ),
 
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor' ),
            'taxonomies' => array( '' ),
            //'menu_icon' => plugins_url( 'images/image.png', __FILE__ ),
            'has_archive' => true
        )
    );
    register_post_type( 'job_applications',
        array(
            'labels' => array(
                'name' => 'Job Applications',
                'singular_name' => 'Job Application',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Job Application',
                'edit' => 'Edit',
                'edit_item' => 'Edit Job Application',
                'new_item' => 'New Job Application',
                'view' => 'View',
                'view_item' => 'View Job Application',
                'search_items' => 'Search Job Applications',
                'not_found' => 'No Job Applications found',
                'not_found_in_trash' => 'No Job Applications found in Trash',
                'parent' => 'Parent Job Posting'
            ),
 
            'public' => true,
            'menu_position' => 15,
            'supports' => array( ''),
            'taxonomies' => array( '' ),
            //'menu_icon' => plugins_url( 'images/image.png', __FILE__ ),
            'has_archive' => true
        )
    );
}


?>
<?php
function display_job_posting_meta_box( $job_posting ) {

 if($job_posting->post_type == 'job_postings'){

    // Retrieve current name of the Director and Movie Rating based on review ID
    $posting_location = esc_html( get_post_meta( $job_posting->ID, 'posting_location', true ) );
    $experience_from = intval( get_post_meta( $job_posting->ID, 'experience_from', true ) );
    $experience_to = intval( get_post_meta( $job_posting->ID, 'experience_to', true ) );
    
    ?>
    <table>
        <tr>
            <td style="width: 100%">Posting Location</td>
            <td><input type="text" size="80" name="job_posting_location_name" value="<?php echo $posting_location; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 150px">Experience</td>
            <tr>
            <td>
                From:
                <select style="width: 100px" name="job_posting_experience_from">
                <?php
                // Generate all items of drop-down list
                for ( $exp = 10; $exp >= 1; $exp -- ) {
                ?>
                    <option value="<?php echo $exp; ?>" <?php echo selected( $exp, $experience_from ); ?>>
                    <?php echo $exp; ?> years <?php } ?>
                </select>
            </td>
             <td>
                To:
                <select style="width: 100px" name="job_posting_experience_to">
                <?php
                // Generate all items of drop-down list
                for ( $exp = 10; $exp >= 1; $exp -- ) {
                ?>
                    <option value="<?php echo $exp; ?>" <?php echo selected( $exp, $experience_to ); ?>>
                    <?php echo $exp; ?> years <?php } ?>
                </select>
            </td>
            </tr>
        </tr>
    </table>
    <?php

}elseif($job_posting->post_type == 'job_applications'){

	$name = esc_html( get_post_meta( $job_posting->ID, 'application_name', true ) );
    $phone = intval( get_post_meta( $job_posting->ID, 'application_phone', true ) );
	$email = esc_html( get_post_meta( $job_posting->ID, 'application_email', true ) );
	$job_id = intval( get_post_meta( $job_posting->ID, 'job_id', true ) );
	                   $all_jobs = get_posts( array(
				        'post_type' => 'job_postings',
				        'numberposts' => -1,
				        'orderby' => 'post_title',
				        'order' => 'ASC'
				    ) );

	           
	?>

    <table>
        <tr>
            <td style="width: 100%">Applicant's Name</td>
            <td><input type="text" size="80" name="job_application_name" value="<?php echo $name; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 150px">Applicant's Email</td>
            <td><input type="text" size="80" name="job_application_email" value="<?php echo $email; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 150px">Applicant's Phone</td>
            <td><input type="text" size="80" name="job_application_phone" value="<?php echo $phone; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 150px">Job Title</td>
            <td>
                <select style="width: 100px" name="application_job_id">
                <?php
                // Generate all items of drop-down list
                foreach ($all_jobs as  $value  ) {
                ?>
                    <option value="<?php echo $value->ID; ?>" <?php echo selected( $value->ID, $job_id ); ?>>
                    <?php echo $value->post_title ?>  <?php } ?>
                </select>
            </td>
        </tr>


     
     



    </table>

    Upload your Resume here
       
   
  <input type="file" id="resume_attachment" name="resume_attachment" value="" size="25" />
	<?php
}

}
?>