(function() {
    tinymce.PluginManager.add( 'ACPPlugin', function( editor, url ) {
        // Add a button that opens a window
        editor.addButton( 'dialog', {
            text: '',
            tooltip: 'Acp',
            image : '../wp-content/plugins/advanced-content-pagination/files/img/select.png',  // path to the button's image
            onclick: function(e) {
                var w = jQuery(window).width();
                var h = jQuery(window).height();
                var dialogWidth = 600;
                var dialogHeight = 600;
                H = ( dialogHeight < h ) ? dialogHeight : h;
                W = ( dialogWidth < w ) ? dialogWidth : w;
                jQuery('#shortcode_title').val('');
                jQuery('.error_msg').css('display', 'none');
                jQuery('.acp_button_layout .acp_button_title').text('');
                jQuery('.shortcode_dialog input[type=text],.shortcode_dialog textarea').removeClass('has_error');
                tb_show( 'Add New Page - Advanced Content Pagination Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=acp_dialog');
            }
        });
    });


    jQuery('#insert_shorcode').click(function(){
        
        var selectedText = tinyMCE.activeEditor.selection.getContent();
        
        var requiredField = jQuery('.error_msg');
        var shortCodeTitleVisible = jQuery('#shortcode_title').is(":visible");
        var hasError = false;
        var shortcodeTitle = jQuery('#shortcode_title');
        var shortcode = '[nextpage ';
        
        var shortcodeTitleFiltered;
        
        if (shortCodeTitleVisible) {
            if (shortcodeTitle.val().length > 0 ) {
                hideError(shortcodeTitle);
                shortcodeTitleFiltered = htmlEntities(shortcodeTitle.val());
                shortcode += ('title="' + shortcodeTitleFiltered + '" ');
            } else {
                hasError = true;
                if (!jQuery(shortcodeTitle).hasClass('has_error')) {
                    jQuery(shortcodeTitle).addClass('has_error');
                    jQuery(shortcodeTitle).next('.error_msg').css('display', 'block');
                }
            }
        }
        
        if (!hasError) {
            if (selectedText.length > 0) {
                shortcode += ']' + selectedText +  '[/nextpage]';
            } else {
                shortcode += ']Please insert your text here![/nextpage]';
            }
            
            tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
            tb_remove();
        }
    });
    
    jQuery('.error_msg').hover(function(){
        jQuery(this).prev().removeClass('has_error');
        jQuery(this).css('display', 'none');
    });
    
    function htmlEntities(str) {
        return String(str).replace(/"/g, '&quot;');
    }
    
    function hideError(elem) {
        jQuery(elem).removeClass('has_error');
        jQuery(elem).next('.error_msg').css('display', 'none');
    }
    
    jQuery('#shortcode_title').change(function(){
        jQuery('.acp_button_layout .acp_button_title').text(jQuery(this).val());        
    });    
})(jQuery);