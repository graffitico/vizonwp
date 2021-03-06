<?php 



/************ raw form code of the each short code form element *******************/

add_filter('pu_shortcode_form_add_text', 'pu_add_text_form_element', 10, 4);
function pu_add_text_form_element( $content, $name, $title, $value = '' )
{
    return sprintf('<label>%s</label><input class="form-control" type="text" id="%s" name="%s" value="%s" /><br/>',
        $title,
        $name,
        $name,
        $value);
}

/************ add form elements to the each specific short code *******************/


add_filter('pu_shortcode_form', 'pu_add_all_form', 10, 1);
function pu_add_all_form( $shortcode_tags )
{
    $shortcode_tags['top_main_box'] = apply_filters('pu_shortcode_form_add_text', null, 'small_header', 'Small header' , 'Make the most of your data and marketing with');
    $shortcode_tags['top_main_box'] .= apply_filters('pu_shortcode_form_add_text', null, 'big_header', 'Big Header' , 'Vizury’s Performance Marketing Hub' );
    $shortcode_tags['top_main_box'] .= apply_filters('pu_shortcode_form_add_text', null, 'background_url', 'Background Image url' , '/images/reach.jpg' );
   
    // $shortcode_tags['facebook_like_box'] .= apply_filters('pu_shortcode_form_add_checkbox', null, 'show_faces', 'Show Faces');
    // $shortcode_tags['facebook_like_box'] .= apply_filters('pu_shortcode_form_add_checkbox', null, 'show_stream', 'Show Stream');
    // $shortcode_tags['facebook_like_box'] .= apply_filters('pu_shortcode_form_add_checkbox', null, 'show_header', 'Show Header', true);
    // $shortcode_tags['facebook_like_box'] .= apply_filters('pu_shortcode_form_add_checkbox', null, 'show_border', 'Show Border');
    // $shortcode_tags['facebook_like_box'] .= apply_filters('pu_shortcode_form_add_select', null, 'color_scheme', 'Color Scheme', array('light' => 'Light', 'dark' => 'Dark'));

    return $shortcode_tags;
}






/************ initialize shortcodes_form javascript variable with short codes form attributes *******************/


add_action('admin_footer', 'pu_shortcode_dialog');
function pu_shortcode_dialog()
{
    echo '<div id="shortcode-dialog" title="Shortcode Form">
            <form class="shortcode-dialog-form"></form></div>';

    echo '<script type="text/javascript">
    var shortcodes_form = new Object();';

    $shortcode_form = array();
    $shortcode_form = apply_filters('pu_shortcode_form', $shortcode_form);

    if(!empty($shortcode_form))
    {

        foreach($shortcode_form as $tag => $form)
        {

            echo "shortcodes_form['{$tag}'] = '{$form}';";
        }
    }

    echo '</script>';
}



add_action('admin_footer', 'pu_shortcode_edit_dialog');
function pu_shortcode_edit_dialog()
{
    echo '<div id="edit-shortcode-dialog" title="Shortcode Form">
            <form class="shortcode-dialog-edit-form"></form></div>';

}




/************ story key value of short codes for drop down in editor *******************/



add_filter('pu_shortcode_button', 'add_top_main_shortcode', 10, 1);
function add_top_main_shortcode( $shortcode_tags )
{
    $shortcode_tags['top_main_box'] = 'Top Main Box';
        
    return $shortcode_tags;
}




/************ short code front display *******************/


function top_main_shortcode( $atts , $content = null ){

    $a = shortcode_atts( array(
        'small_header' => '',
        'big_header' => '',
        'background_url' => '',
    ), $atts );

    $digits = 3;
    $random_id =  rand(pow(10, $digits-1), pow(10, $digits)-1);


    $shortcode_form = apply_filters('pu_shortcode_form_add_text', null, 'small_header', 'Small header' , $a['small_header']);
    $shortcode_form .= apply_filters('pu_shortcode_form_add_text', null, 'big_header', 'Big Header' , $a['big_header']  );
    $shortcode_form .= apply_filters('pu_shortcode_form_add_text', null, 'background_url', 'Background Image url' ,  $a['background_url'] );


$response =array();

$response['html'] = '<div class="header" style="background-image:url('.$a['background_url'].')" data-wp-vizury-top="true"   >
    <div style="display:none" id="form-container-'.$random_id.'" > 
'.$shortcode_form.'
    </div>
<div class="header-content heading-block" data-wp-vizury-top="true" data-rid="'.$random_id.'"  >
<div class="header-content-inner heading-text wow fadeIn" data-wp-vizury-top="true" style="visibility: visible; animation-name: fadeIn;" data-rid="'.$random_id.'"  >
<p data-wp-vizury-top="true" data-rid="'.$random_id.'"  ></p>
<h4 data-wp-vizury-top="true" data-rid="'.$random_id.'"  >'.$a['small_header'].'</h4>
<h2 data-wp-vizury-top="true" data-rid="'.$random_id.'"  >'.$a['big_header'].'</h2>
</div>
</div>
</div>';

$response['rid'] = $random_id;

return json_encode($response);



}
add_shortcode( 'top_main_box', 'top_main_shortcode' );







?>