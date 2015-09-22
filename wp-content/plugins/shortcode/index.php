<?php
/*
Plugin Name: Shortcodes Plugin
Description: A WordPress plugin that will list Custom shortcodes in the dropdown on the editor 
Plugin URI: http://thegraffiti.co
Author: Grafitti
Author URI:  http://thegraffiti.co
Version: 1.0
*/
new Shortcode_Tinymce();
class Shortcode_Tinymce
{
    public function __construct()
    {
        add_action('admin_init', array($this, 'pu_shortcode_button'));
        add_action('admin_footer', array($this, 'pu_get_shortcodes'));
    }

    /**
     * Create a shortcode button for tinymce
     *
     * @return [type] [description]
     */
    public function pu_shortcode_button()
    {
        if( current_user_can('edit_posts') &&  current_user_can('edit_pages') )
        {
            add_filter( 'mce_external_plugins', array($this, 'pu_add_buttons' ));
            add_filter( 'mce_buttons', array($this, 'pu_register_buttons' ));
        }
    }

    /**
     * Add new Javascript to the plugin scrippt array
     *
     * @param  Array $plugin_array - Array of scripts
     *
     * @return Array
     */
    public function pu_add_buttons( $plugin_array )
    {
         $plugin_array['pushortcodes'] = plugin_dir_url( __FILE__ ) . 'js/shortcode-droplist.js';
         $plugin_array['wpvizury'] = plugin_dir_url( __FILE__ ) . 'js/tinymce_shortcode_plugin.js';

        return $plugin_array;
    }

    /**
     * Add new button to tinymce
     *
     * @param  Array $buttons - Array of buttons
     *
     * @return Array
     */
    public function pu_register_buttons( $buttons )
    {
        array_push( $buttons, 'separator', 'pushortcodes' );
        return $buttons;
    }

    /**
     * Add shortcode JS to the page
     *
     * @return HTML
     */
    public function pu_get_shortcodes()
    {
        global $shortcode_tags;

   echo '<script type="text/javascript">
    var shortcodes_button = new Object();';

    $shortcode_button_tags = array();

    $shortcode_button_tags = apply_filters('pu_shortcode_button', $shortcode_button_tags);

    if(!empty($shortcode_button_tags))
    {
        foreach($shortcode_button_tags as $tag => $code)
        {
            echo "shortcodes_button['{$tag}'] = '{$code}';";
        }
    }

    echo '</script>';
    }
}
?>