/* global tinymce */
tinymce.PluginManager.add('wpvizury', function( editor ) {
        function replaceGalleryShortcodes( content ) {
                return content.replace( /\[top_main_box([^\]]*)\]/g, function( match ) {
                        return html( 'top_main_box', match );
                });
        }
        function html( cls, data ) {
                data = window.encodeURIComponent( data );
                return '<img src="' + tinymce.Env.transparentSrc + '" class="wp-media mceItem ' + cls + '" ' +
                        'data-wp-media="' + data + '" data-mce-resize="false" data-mce-placeholder="1" />';
        }
        function restoreMediaShortcodes( content ) {
                function getAttr( str, name ) {
                        name = new RegExp( name + '=\"([^\"]+)\"' ).exec( str );
                        return name ? window.decodeURIComponent( name[1] ) : '';
                }
                return content.replace( /(?:<p(?: [^>]+)?>)*(<img [^>]+>)(?:<\/p>)*/g, function( match, image ) {
                        var data = getAttr( image, 'data-wp-media' );
                        if ( data ) {
                                return '<p>' + data + '</p>';
                        }
                        return match;
                });
        }
        function editMedia( node ) {
                var vizury, frame, data;
                // if ( node.nodeName !== 'IMG' ) {
                //         console.log("i m here");
                //         return;
                // }
                // Check if the `wp.media` API exists.
               rid  =   editor.dom.getAttrib( node, 'data-rid' ) ;
console.log(rid);
                v = editor.dom.getAttrib(editor.dom.select("#container-"+rid ) ,   'data-sc');
console.log(v);

                s_form = editor.dom.select("#form-container-"+rid)[0]['innerHTML'];

console.log(s_form);

                 jQuery('.shortcode-dialog-edit-form').empty();
                 jQuery('.shortcode-dialog-edit-form').append(s_form);
                 jQuery('#edit-shortcode-dialog').dialog({
                            width: 700,
                            resizable: false,
                            buttons: {
                                "Delete": function(){
                                    tinyMCE.activeEditor.dom.remove(tinyMCE.activeEditor.dom.select("#container-"+rid ));
                                    jQuery( "#edit-shortcode-dialog" ).dialog( "close" );
                                },

                                "Update": function(){
                                    var formArray = jQuery('.shortcode-dialog-edit-form').serializeArray();

                                    if(formArray.length > 0)
                                    {
                                        content = '[' + v + ' ';
                                        jQuery(formArray).each(function(i){
                                            content += jQuery(this)[0].name + '="'+ jQuery(this)[0].value +'" ';
                                        });

                                        content += '][/'+v+']';
                                    }

                                    var data = {
                                        'action': 'echo_shortcode',
                                        'shortcode': content,
                                        'request_type': 'edit'      // We pass php values differently!
                                    };

                                    console.log(content);
                                    jQuery.post("admin-ajax.php", data, function(resp) {
                                        response = JSON.parse(resp);
                                        console.log(response);
                                            editor.dom.setHTML(tinyMCE.activeEditor.dom.select("#container-"+rid ), response.html);
                                            editor.dom.setAttrib(editor.dom.select("#container-"+rid ) ,  'id' , "container-"+response.rid);
                                             // console.log(tinyMCE.activeEditor.getContent({format : 'raw'}));
                                            
                                             // tinyMCE.activeEditor.selection.setContent( "<div class='main-s-wrapper' ><div class='shortcode-wrap' style='display:none' >"+content+"</div>" + response + "</div>", {format : 'raw'});
                                              jQuery( "#edit-shortcode-dialog" ).dialog( "close" );
                                    });


                                   
                                    //tinyMCE.activeEditor.execCommand('mceInsertRawHTML', 0, content);
                                    // tinyMCE.activeEditor.selection.setContent( content );
                                   
                                }
                            }
                        });

                




                if ( typeof wp === 'undefined' || ! wp.media ) {
                       
                        return;
                }
                data = window.decodeURIComponent( editor.dom.getAttrib( node, 'data-wp-media' ) );
                // Make sure we've selected a gallery node.
                if ( editor.dom.hasClass( node, 'wp-vizury' ) ) {



                        vizury = wp.media.vizury;
                        frame = gallery.edit( data );
                        frame.state('gallery-edit').on( 'update', function( selection ) {
                                var shortcode = vizury.shortcode( selection ).string();
                                editor.dom.setAttrib( node, 'data-wp-media', window.encodeURIComponent( shortcode ) );
                                frame.detach();
                        });
                }
        }
        // Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('...');
        editor.addCommand( 'WP_Vizury', function() {
                editMedia( editor.selection.getNode() );
        });
        editor.on( 'mouseup', function( event ) {

                var dom = editor.dom,
                        node = event.target;

                        console.log(dom.getAttrib( node, 'data-wp-vizury-top' ) );
                function unselect() {
                        dom.removeClass( dom.select( 'img.wp-media-selected' ), 'wp-media-selected' );
                }
               // if ( node.nodeName === 'IMG' && dom.getAttrib( node, 'data-wp-media' ) ) {
                 if ( dom.getAttrib( node, 'data-wp-vizury-top' )  ) {
                       // Don't trigger on right-click
                        if ( event.button !== 2 ) {
                                if ( dom.hasClass( node, 'wp-media-selected' ) ) {
                                        editMedia( node );
                                } else {
                                        unselect();
                                        dom.addClass( node, 'wp-media-selected' );
                                }
                        }
                } else {
                        unselect();
                }
        });
        // Display gallery, audio or video instead of img in the element path
        editor.on( 'ResolveName', function( event ) {
                var dom = editor.dom,
                        node = event.target;
                if ( node.nodeName === 'IMG' && dom.getAttrib( node, 'data-wp-media' ) ) {
                        if ( dom.hasClass( node, 'wp-vizury' ) ) {
                                event.name = 'vizury';
                        }
                }
        });
        editor.on( 'BeforeSetContent', function( event ) {
                // 'wpview' handles the gallery shortcode when present
                if ( ! editor.plugins.wpview || typeof wp === 'undefined' || ! wp.mce ) {
                        event.content = replaceGalleryShortcodes( event.content );
                }
        });
        editor.on( 'PostProcess', function( event ) {
                if ( event.get ) {
                        event.content = restoreMediaShortcodes( event.content );
                }
        });
});