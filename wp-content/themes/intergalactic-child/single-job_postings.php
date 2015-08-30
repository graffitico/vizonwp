<?php
 /*Template Name: Job Posting template
 */

if (isset( $_POST['job_application_name']) && isset($_POST['job_application_email']) && isset( $_POST['job_application_phone'] ) && isset($_POST['application_job_id']) && isset($_FILES['resume_attachment']) ){

$postName = $_POST['job_application_name'];
$postEmail = $_POST['job_application_email'];
$postPhone = $_POST['job_application_phone'];
$postJobId = $_POST['application_job_id'];
$postResume = $_FILES['resume_attachment'];

$submit = $_POST['submit'];
}
if(isset($submit) && isset($postName) && isset($postEmail)&& isset($postPhone)&& isset($postJobId)&& isset($postResume)){



    $new_post = array(


        'post_status' => 'publish',
        'post_date' => date('Y-m-d H:i:s'),

        'post_type' => 'job_applications'

    );

  $job_id =   wp_insert_post($new_post);


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






get_header(); ?>


<!---- ------- -->

<div id="apply-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
  <div class="modal-body">
             <form action="" method="post" enctype="multipart/form-data" >
                name    <input type="text" size="80" name="job_application_name" required="true"/><br/>
                email    <input type="text" size="80" name="job_application_email" required="true" /><br/>
                 phone   <input type="text" size="80" name="job_application_phone" required="true" /><br/>
                    <input  type="hidden" id="application_job_id" name="application_job_id"   value="<?php echo the_ID() ?>" />
            resume
            <input type="file" id="resume_attachment" name="resume_attachment" value="" size="25" required="true"  accept="application/pdf" /><br/>
           <div style="display:inline-block; vertical-align: middle;">
            <button name="submit"  type="submit">submit</button>
            <button class="cancel-modal" >cancel</button>

          </div>

                  </form>
  </div>
</div>
</div>
</div>







<div style="width:100%; position:relative; height:100px; background:#000;  margin-top: 13px;   margin-bottom: 20px;"></div>
<div class="container">

    <!-- Main Search -->
    <div class="row">
        <div class="col-md-9">
        <input class="job-s" id="job-s" type="search" placeholder="Enter job field or job title">
        </div>
        <div class="col-md-3">
        <button class="search-button" id="search-id" type="button"><img src="<?php echo get_site_url() ?>/images/search.svg" /></button>
        </div>
    </div><!-- end of row -->

    <!-- Filter Categories -->
    <div class="row">
        <div class="col-md-4">

                <select class="cs-select cs-skin-border skin-border-bg1" id="department-filter" >
                    <option value="" disabled selected class="filter_dept">Browse by profile</option>
                   <?php
                   $department_list = get_terms('departments');


                   foreach ($department_list as $value ){ ?>
                     <option value="<?= $value->slug ?>"><?= $value->name ?></option>
                   <?php }  ?>
                </select>
        </div>

        <div class="col-md-4">

                <select class="cs-select cs-skin-border skin-border-bg2" id="year-filter" >
                    <option value="" disabled selected>Browse by experience</option>
                    <option value="0">0-1 years</option>
                    <option value="2">2-4 years</option>
                    <option value="5">5-10 years</option>
                </select>

        </div>

        <div class="col-md-4">

                <select class="cs-select cs-skin-border skin-border-bg3" id="location-filter" >
                    <option value="" disabled selected>Browse by location</option>
                    <option value="Bangalore">Bangalore</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Kolkata">Kolkata</option>
                </select>

        </div>
      </div><!-- end of row -->


      <div class="panel-group accordion-data" id="accordion">

      <!-- Categories Head -------------------------------------------------------------->

       <?php

    $mypost = array( 'post_type' => 'job_postings', );
    $loop = new WP_Query( $mypost );


       while ( $loop->have_posts() ) : $loop->the_post();?>
      <div class="panel panel-default">
      <div class="row job-result panel-heading">

      <div class="col-md-4"><span class="categ-head"><?php echo the_title(); ?></span></div>
      <div class="col-md-4"><span class="categ-head"><?php  echo intval( get_post_meta( get_the_ID(), 'experience_from', true ) )  ?>-<?php  echo intval( get_post_meta( get_the_ID(), 'experience_to', true ) )  ?> Years</span></div>
      <div class="col-md-4"><span class="categ-head"> <?php echo esc_html( get_post_meta( get_the_ID(), 'posting_location', true ) ); ?>

      <a class="categ-down" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo the_ID() ?>"></a>

      </span></div>

      </div><!-- end of row -->

      <!-- Job Description -->
      <div class="row">

      <div id="collapse-<?php echo the_ID() ?>" class="col-md-12 panel-collapse collapse out">
      <section class="job-desc panel-body">

     <?php echo the_content(); ?>

      <button data-toggle="modal" data-target="#apply-modal" class="apply-button" data-id="<?php echo the_ID() ?>" type="button">Apply</button>
      </section>
      </div>

      </div><!-- end of row/Job Description -->

      </div><!-- end of panel-default -->
       <?php endwhile; ?>




      </div><!-- end of accordion -->
      <div style="margin-bottom:15px" >
      <a class="search-button" style="color:white" href="/jobopenings"> <span class="cs-placeholder" >Reset Filters</span> </a>
      </div>
    </div><!-- /container -->

    <!-- -------- -->

<?php wp_reset_query(); ?>
<?php get_footer(); ?>