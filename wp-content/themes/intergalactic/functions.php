<?php
/**
 * Intergalactic functions and definitions
 *
 * @package Intergalactic
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1000; /* pixels */
}

if ( ! function_exists( 'intergalactic_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function intergalactic_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Intergalactic, use a find and replace
	 * to change 'intergalactic' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'intergalactic', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'intergalactic-large', '1440', '960', false );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'intergalactic' ),
		'social'  => __( 'Social Links Menu', 'intergalactic' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'intergalactic_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style.
	 */
	add_editor_style( array( 'editor-style.css' ) );
}
endif; // intergalactic_setup
add_action( 'after_setup_theme', 'intergalactic_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function intergalactic_widgets_init() {
	// register_sidebar( array(
	// 	'name'          => __( 'Sidebar', 'intergalactic' ),
	// 	'id'            => 'sidebar-1',
	// 	'description'   => '',
	// 	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	// 	'after_widget'  => '</aside>',
	// 	'before_title'  => '<h1 class="widget-title">',
	// 	'after_title'   => '</h1>',
	// ) );

		register_sidebar( array(
		'name'          => __( 'Sidebar', 'intergalactic' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section class="read-more-block"><div class="container-fluid">',
		'after_widget'  => '</div></div></section>',
		'before_title'  => ' <div class="row"><div class="col-lg-12 text-center section-title"><h2>',
		'after_title'   => '</h2></div></div>   <div class="row">',
		) );


}
add_action( 'widgets_init', 'intergalactic_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function intergalactic_scripts() {
	wp_enqueue_style( 'intergalactic-style', get_stylesheet_uri() );

	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );

	wp_enqueue_script( 'intergalactic-script', get_template_directory_uri() . '/js/intergalactic.js', array( 'jquery' ), '20140905', true );

	wp_enqueue_script( 'intergalactic-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_style( 'intergalactic-lato', intergalactic_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'intergalactic_scripts' );

/**
 * Register Google Fonts
 */
function intergalactic_fonts_url() {
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
	 * supported by Lato, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$arimo = _x( 'on', 'Lato font: on or off', 'intergalactic' );

	if ( 'off' !== $arimo ) {
		$font_families = array();
		$font_families[] = 'Lato:300,400,700,300italic,400italic,700italic&subset=latin,latin-ext';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $fonts_url;

}

if ( ! function_exists( 'intergalactic_editor_styles' ) ) {
/**
 * Enqueue Google Fonts for Editor Styles
 */
function intergalactic_editor_styles() {
    add_editor_style( array( 'editor-style.css', intergalactic_fonts_url() ) );
}
add_action( 'after_setup_theme', 'intergalactic_editor_styles' );

} // if ! function_exists( 'intergalactic_editor_styles' )


if ( ! function_exists( 'intergalactic_admin_scripts' ) ) {
/**
 * Enqueue Google Fonts for custom headers
 */
function intergalactic_admin_scripts( $hook_suffix ) {

	wp_enqueue_style( 'intergalactic-lato', intergalactic_fonts_url(), array(), null );

}
add_action( 'admin_print_styles-appearance_page_custom-header', 'intergalactic_admin_scripts' );

} // if ! function_exists( 'intergalactic_admin_scripts' )

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';




/**
 * Extend Recent Posts Widget 
 *
 * Adds different formatting to the default WordPress Recent Posts Widget
 */

Class My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

	function widget($args, $instance) {
	
		extract( $args );
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);
				
		if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
			$number = 10;
					
		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
		if( $r->have_posts() ) :
			
			echo $before_widget;
			if( $title ) echo $before_title . $title . $after_title; ?>
<!-- 			<ul>
				<?php // while( $r->have_posts() ) : $r->the_post(); ?>				
				<li><?php // the_time( 'F d'); ?> - <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
				<?php //endwhile; ?>
			</ul> -->
<?php  while( $r->have_posts() ) : $r->the_post(); ?>	

	<?php if ( has_post_thumbnail() ) {
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'intergalactic-large' ); 
		$img_url =  esc_url( $thumbnail[0] ); 
		
 } ?>
              <div class="col-sm-4 blog-entry-tile">
                <div class="ih-item square colored effect4" style="background-color: #626262;" >
                    <div class="img"><a href="<?php the_permalink(); ?>" target="_blank"><img  src="<?php if(isset($img_url)){ echo  $img_url; }else{ echo  '/images/logo_v.svg' ; }?>"></a></div>
                    <div class="mask1"></div>
                    <div class="mask2"></div>
                    <div class="mask2"></div>
                    <div class="info">
                        <h3><?php the_title(); ?></h3>
                       
                    </div>
                </div>
                <a href="<?php the_permalink(); ?>" target="_blank">
                <h4><?php the_title(); ?></h4></a>
             <!--    <p><b>Author:</b> Vizury</p> -->
                <p><b>Date:</b><?php the_time( 'M d, Y'); ?></p>
                <p><?php the_excerpt(); ?></p>


                <a href="<?php the_permalink(); ?>" target="_blank"><img class="readmore-convert img-responsive bottom-right" alt="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeAQMAAAAB/jzhAAAAA1BMVEX///+nxBvIAAAAAXRSTlMAQObYZgAAAAxJREFUeNpjYBiMAAAAlgABjcjBIQAAAABJRU5ErkJggg=="></a>
            </div>
	<?php endwhile ?>

			 
			<?php
			echo $after_widget;
		
		wp_reset_postdata();
		
		endif;
	}
}
function my_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('My_Recent_Posts_Widget');
}
add_action('widgets_init', 'my_recent_widget_registration');
