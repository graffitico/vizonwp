<?php
/**
 * Footer.php outputs the code for your footer widgets, contains your footer hook and closing body/html tags
 * @package Tetris WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
?>
<div class="clear"></div><!-- /clear any floats -->
</div><!-- /main-content -->
	<div id="footer-wrap">
		<footer id="footer">
			<div id="footer-widgets" class="clearfix">
				<div class="footer-box">
					<?php dynamic_sidebar('footer-one'); ?>
				</div><!-- /footer-box -->
				<div class="footer-box">
					<?php dynamic_sidebar('footer-two'); ?>
				</div><!-- /footer-box -->
				<div class="footer-box remove-margin">
					<?php dynamic_sidebar('footer-three'); ?>
				</div><!-- /footer-box -->
			</div><!-- /footer-widgets -->
		</footer><!-- /footer -->
	</div><!-- /footer-wrap -->
	<?php if ( get_theme_mod( 'wpex_copyright', '1' ) ) { ?>
		<div id="copyright">
			<?php echo get_theme_mod('wpex_copyright', 'Powered by <a href=\"http://www.wordpress.org\" title="WordPress" target="_blank">WordPress</a> and <a href=\"http://themeforest.net/user/WPExplorer?ref=WPExplorer" target="_blank" title="WPExplorer" rel="nofollow">WPExplorer Themes</a>') ?>
		</div>
	<?php } ?>
</div><!-- /wrap -->
<?php wp_footer(); // Footer hook, do not delete, ever ?>
</body>
</html>