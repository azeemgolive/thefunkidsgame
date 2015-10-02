jQuery(document).ready(function() {    
    
    jQuery('ul:not(.acp_wp_default_ajax) li.button_style').live('click', function($){
        
        var clickedItemId = jQuery(this).attr('id');        
        
        jQuery('ul:not(.acp_wp_default_ajax) li.button_style').each(function(){
            jQuery(this).removeClass('active');
        });          
        
        jQuery('ul:not(.acp_wp_default_ajax) li.button_style').each(function(){ 
            if (jQuery(this).attr('id') == clickedItemId) {
                jQuery(this).addClass('active');
            }            
        });
        
        
        jQuery('.loader_container').css('display', 'block');
        var width = jQuery('.acp_content').width();
        var height = jQuery('.acp_content').height();             
        var wrapperPosition = jQuery('.acp_content').position();              
        jQuery('.loader_container').css('width', width+'px');                
        jQuery('.loader_container').css('height', height+'px');
        jQuery('.loader_container').css({
            left:wrapperPosition.left,
            top:wrapperPosition.top
        });
        
        var imgHeight =  jQuery('.loader').height();
        var imgMarginTopBottom = (height / 2) - (imgHeight / 2);        
            
        jQuery('.loader').css('margin', imgMarginTopBottom + 'px auto');
        
        
        var acp_postid = jQuery('#acp_post').val();
        var acp_shortcode_type = jQuery('#acp_shortcode').val();
        clickedItemId = clickedItemId.substring(4); 
        var content = jQuery('#acp_content');       
                        
        jQuery.ajax({
            type: 'POST',
            url: acp_ajax_obj.url,
            data: {
                acp_currpage: clickedItemId,
                acp_pid:acp_postid,
                acp_shortcode: acp_shortcode_type,
                action: 'pp_with_ajax'
            }
        }).done(function(response){
            jQuery('.loader_container').css('display', 'none');
            content.html(response);            
        });
    });
    
    jQuery('ul.acp_wp_default_ajax li.button_style').click(function($) {
        var clickedItemId = jQuery(this).attr('id');
        
        jQuery('ul.acp_wp_default_ajax li.button_style').each(function(){
            jQuery(this).removeClass('active');
        });          
        
        jQuery('ul.acp_wp_default_ajax li.button_style').each(function(){ 
            if (jQuery(this).hasClass(clickedItemId)) {
                jQuery(this).addClass('active');
            }            
        });
        
        
        jQuery('.loader_container').css('display', 'block');
        var width = jQuery('.acp_content').width();
        var height = jQuery('.acp_content').height();             
        var wrapperPosition = jQuery('.acp_content').position();              
        jQuery('.loader_container').css('width', width+'px');                
        jQuery('.loader_container').css('height', height+'px');
        jQuery('.loader_container').css({
            left:wrapperPosition.left,
            top:wrapperPosition.top
        });
        
        var imgHeight =  jQuery('.loader').height();
        var imgMarginTopBottom = (height / 2) - (imgHeight / 2);        
            
        jQuery('.loader').css('margin', imgMarginTopBottom + 'px auto');
        
        
        var acp_postid = jQuery('#acp_post').val();
        var acp_shortcode_type = jQuery('#acp_shortcode').val();
        clickedItemId = clickedItemId.substring(4); 
        var content = jQuery('#acp_content');        
                        
        jQuery.ajax({
            type: 'POST',
            url: acp_ajax_obj.url,
            data: {
                acp_currpage: clickedItemId,
                acp_pid:acp_postid,
                acp_shortcode: acp_shortcode_type,
                action: 'pp_with_ajax'
            }
        }).done(function(response){
            jQuery('.loader_container').css('display', 'none');
            content.html(response);            
        });
    });
});