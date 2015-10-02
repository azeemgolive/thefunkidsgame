function layout_activate() {
	if (maybe_autosave() == true ) return send_error(1);	
	var data = {
		'action' : 'pagelayout_action',
		'_action' : 'pagelayout_activate',
		'post_ID' : jQuery('#post_ID').val(),
		'_pagelayout_nonce': jQuery('#_pagelayout_nonce').val()
		};

	jQuery.post(ajaxurl, data, function(response) {
		jQuery('#baol_layout-message').html('');
		jQuery('#baol_layout-layout').html(response);
		jQuery('#baol_layout-activate-container').remove();
	});
}

function layout_save() {
	var data = {
		'action' : 'pagelayout_action',
		'_action' : 'pagelayout_save',
		'post_ID' : jQuery('#post_ID').val(),
		'_pagelayout_nonce': jQuery('#_pagelayout_nonce').val()
		};

	jQuery.post(ajaxurl, data, function(response) {
		jQuery('#baol_layout-message').html('');	
		jQuery('#baol_layout-layout').html(response);
	});
}

function layout_delete() {
	var data = {
		'action' : 'pagelayout_action',
		'_action' : 'pagelayout_delete',
		'post_ID' : jQuery('#post_ID').val(),
		'_pagelayout_nonce': jQuery('#_pagelayout_nonce').val()
		};

	jQuery.post(ajaxurl, data, function(response) {
		jQuery('#baol_layout_container').html(response);
	});
}

function maybe_autosave(){
	if ( jQuery('#post_ID').val() < 0 ) return true;
	return false;
}

function send_error(error){
	var data = {
		'action' : 'pagelayout_action',
		'_action' : 'pagelayout_error',
		'error_code' : error,
		'_pagelayout_nonce': jQuery('#_pagelayout_nonce').val()
		};

	jQuery.post(ajaxurl, data, function(response) {
		jQuery('#baol_layout-message').html(response);		
	});
}

function select_layout(layout) {
	if (maybe_autosave() == true ) return send_error(1);
	var data = {
		'action' : 'pagelayout_action',
		'_action' : 'select_layout',
		'post_ID' : jQuery('#post_ID').val(),
		'layout_id': layout,
		'_pagelayout_nonce': jQuery('#_pagelayout_nonce').val()
		};

	jQuery.post(ajaxurl, data, function(response) {
		jQuery('.layout-layout').removeClass("selected");
		jQuery('#layout-layout-'+layout).addClass("selected");
		jQuery('#baol_layout-buttons').removeClass("hide");
		jQuery('#baol_layout-layout_detail').html(response);
		jQuery('.details').tabs();
		wpWidgets.init();
	});
}

jQuery(document).ready(function(jQuery){ 
	jQuery('.details').tabs();
	if ( currentLayout > 0 ) select_layout(currentLayout);
	wpWidgets.init(); 
	jQuery('#baol_spinner').ajaxStart(function() {
	  jQuery(this).removeClass('hide');
	}).ajaxStop(function() {
	  jQuery(this).addClass('hide');
	});
});
