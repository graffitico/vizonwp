<?php $img = get_post_meta(get_the_ID(), 'wp_custom_attachment', true);

if (!empty($img)){
 ?>

<div id="comments" class="comments-area">
<a href="<?php echo $img['url']; ?>">
   <h3> Download PDF Here</h3>
</a>
</div>
<?php } ?>