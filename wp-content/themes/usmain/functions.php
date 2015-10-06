<?php
add_filter( 'wpcf7_validate_text*', 'custom_text_confirmation_validation_filter', 20, 2 );
 
function custom_text_confirmation_validation_filter( $result, $tag ) {
    $tag = new WPCF7_Shortcode( $tag );

     if($tag->name)
     {
     	
     	if(!preg_match('/^[a-z0-9 .\-]+$/i', $_POST[$tag->name])){
 			$result->invalidate( $tag, "Sorry No Special Characters Allowed" );
     	}
     	
     }
          	     if($tag->name == 'name'){

     	if(!preg_match('/^[a-z .\-]+$/i', $_POST[$tag->name])){
     		$result->invalidate( $tag, "Sorry No Numbers in Name Allowed" );
     	}
          }
    
 
    // if ( 'your-email-confirm' == $tag->name ) {
    //     $your_email = isset( $_POST['your-email'] ) ? trim( $_POST['your-email'] ) : '';
    //     $your_email_confirm = isset( $_POST['your-email-confirm'] ) ? trim( $_POST['your-email-confirm'] ) : '';
 
    //     if ( $your_email != $your_email_confirm ) {
    //         $result->invalidate( $tag, "Are you sure this is the correct address?" );
    //     }
    // }
 
    return $result;
}

add_filter( 'wpcf7_validate_textarea*', 'custom_textarea_confirmation_validation_filter', 20, 2 );
 
function custom_textarea_confirmation_validation_filter( $result, $tag ) {
    $tag = new WPCF7_Shortcode( $tag );

     if($tag->name)
     {
     	
     	if(!preg_match('/^[a-z0-9 .\-]+$/i', $_POST[$tag->name])){
 			$result->invalidate( $tag, "Sorry No Special Characters Allowed" );
     	}
     	
     }
     
    
 
    // if ( 'your-email-confirm' == $tag->name ) {
    //     $your_email = isset( $_POST['your-email'] ) ? trim( $_POST['your-email'] ) : '';
    //     $your_email_confirm = isset( $_POST['your-email-confirm'] ) ? trim( $_POST['your-email-confirm'] ) : '';
 
    //     if ( $your_email != $your_email_confirm ) {
    //         $result->invalidate( $tag, "Are you sure this is the correct address?" );
    //     }
    // }
 
    return $result;
}


?>