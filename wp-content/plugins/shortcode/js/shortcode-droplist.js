


(function() {


    tinymce.PluginManager.add('pushortcodes', function( editor )
    {
        var shortcodeValues = [];
        jQuery.each(shortcodes_button, function(i)
        {
            shortcodeValues.push({text: shortcodes_button[i], value:i});
        });

        editor.addButton('pushortcodes', {
            type: 'listbox',
            text: 'Shortcodes',
            onselect: function(e) {
              //  console.log(e);
                var v = e.control._value;

                var content = '';
                var dialogForm = '<table>';

                if(shortcodes_form[v] != undefined)
                {
                    console.log(shortcodes_form);
                    dialogForm += shortcodes_form[v];

                    if(dialogForm != '<table>')
                    {
                        dialogForm += '</table>';
                        jQuery('.shortcode-dialog-form').empty();
                        jQuery('.shortcode-dialog-form').append(dialogForm);

                        jQuery("#shortcode-dialog").dialog({
                            width: 700,
                            resizable: false,
                            buttons: {
                                "Add Shortcode": function(){
                                    var formArray = jQuery('.shortcode-dialog-form').serializeArray();

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
                                        'shortcode': content      // We pass php values differently!
                                    };

                                    console.log(content);
                                    jQuery.post("admin-ajax.php", data, function(resp) {
                                        response = JSON.parse(resp);
                                        console.log(response);
                                             tinyMCE.activeEditor.selection.setContent( "<div class='main-s-wrapper' data-sc='"+v+"''   id='container-"+response.rid+"'    >" + response.html + "</div>", {format : 'raw'});
                                              jQuery( "#shortcode-dialog" ).dialog( "close" );
                                    });


                                   
                                    //tinyMCE.activeEditor.execCommand('mceInsertRawHTML', 0, content);
                                    // tinyMCE.activeEditor.selection.setContent( content );
                                   
                                }
                            }
                        });
                    }
                } else {
                    tinyMCE.activeEditor.selection.setContent( '[' + v + '][/' + v + ']' );
                }
            },
            values: shortcodeValues
        });
    });

})();