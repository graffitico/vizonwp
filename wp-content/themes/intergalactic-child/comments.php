<?php $img = get_post_meta(get_the_ID(), 'wp_custom_attachment', true);

if (!empty($img)){
 ?>

<center>
<div id="comments" class="comments-area text-center">
<a href="<?php echo $img['url']; ?>">

	<input class="yellowbutton" style="padding: 10px 30px" type="button" value="Download PDF Here">
 
</a>
</div>
</center>
<?php } ?>