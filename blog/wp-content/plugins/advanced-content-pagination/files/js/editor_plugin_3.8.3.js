// closure to avoid namespace collision
(function(){
    // creates the plugin
    tinymce.create('tinymce.plugins.ACPPlugin', {
        // creates control instances based on the control's id.
        // our button's id is "mygallery_button"
        createControl : function(id, controlManager) {
            if (id == 'dialog_button') {
                // creates the button
                var w = jQuery(window).width();
                var h = jQuery(window).height();
                var dialogWidth = 600;
                var dialogHeight = 600;
                H = ( dialogHeight < h ) ? dialogHeight : h;
                W = ( dialogWidth < w ) ? dialogWidth : w;
                var button = controlManager.createButton('dialog_button', {                   
                    title : 'Add New Page - Advanced Content Pagination Shortcode', /*title of the button*/
                    image : '../wp-content/plugins/advanced-content-pagination/files/img/select.png',  // path to the button's image
                    onclick : function(e) {
                        jQuery('#shortcode_title').val('');
                        jQuery('.error_msg').css('display', 'none');
                        jQuery('.acp_button_layout .acp_button_title').text('');
                        jQuery('.shortcode_dialog input[type=text],.shortcode_dialog textarea').removeClass('has_error');
                        tb_show( 'Add New Page - Advanced Content Pagination Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=acp_dialog');
                    }
                });
                return button;
            }
            return null;
        },
		
        getInfo : function() {
            return {
                longname : 'Advanced Content Pagination',
                author : 'gVectors Team (Artyom Chakhoyan, Gagik Zakaryan, Hakob Martirosyan)',
                authorurl : 'http://www.gvectors.com/advanced-content-pagination/',
                infourl : 'http://www.gvectors.com/questions/',
                version : "1.1.0"
            };
        }
    });
    
	
    /*registers the plugin. DON'T MISS THIS STEP!!!*/
    tinymce.PluginManager.add('ACPPlugin', tinymce.plugins.ACPPlugin);
    
    
    
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
})();