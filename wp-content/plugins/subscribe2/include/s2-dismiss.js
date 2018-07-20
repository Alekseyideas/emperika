/* global s2_dismiss_script_strings */
// Version 1.0 - original version

jQuery( document ).on( 'click', '#sender_message .notice-dismiss', function() {
	var ajaxurl = s2_dismiss_script_strings.ajaxurl;
	var data = {
		'action': 's2_dismiss_notice',
		'nonce': s2_dismiss_script_strings.nonce

	};
	jQuery.post( ajaxurl, data );
});