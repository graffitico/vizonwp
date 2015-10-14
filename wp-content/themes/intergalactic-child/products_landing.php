<?php
 /*
 Template Name: Product landing template
 */

get_header();
?>
  <?php if(have_posts()) :?>
   <?php while(have_posts()) : the_post(); ?>


<?php the_content(); ?>



</section>
   <?php endwhile; ?>
<?php endif; ?>

<?php

get_footer();
 ?>