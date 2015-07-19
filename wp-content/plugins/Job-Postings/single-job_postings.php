<?php
 /*Template Name: Job Posting template
 */
 
get_header(); ?>
<div id="primary">
    <div id="content" role="main">
    <?php
    $mypost = array( 'post_type' => 'job_postings', );
    $loop = new WP_Query( $mypost );
    ?>
    <?php while ( $loop->have_posts() ) : $loop->the_post();?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-header">
 
                <!-- Display featured image in right-aligned floating div -->
                <div style="float: right; margin: 10px">
                    <?php the_post_thumbnail( array( 100, 100 ) ); ?>
                </div>
 
                <!-- Display Title and Author Name -->
                <strong>Job Title: </strong><?php the_title(); ?><br />
                <strong>Category: </strong>
                <?php echo esc_html( get_post_meta( get_the_ID(), 'job_category', true ) ); ?>
                <br />
 
                <!-- Display yellow stars based on rating -->
                <strong>Experience: </strong>
                <?php
                $nb_exp = intval( get_post_meta( get_the_ID(), 'experience', true ) );
                    echo $nb_exp;
                ?>
            </div>
 
            <!-- Display movie review contents -->
            <div class="entry-content"><?php the_content(); ?></div>
        </article>
 
    <?php endwhile; ?>
    </div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>