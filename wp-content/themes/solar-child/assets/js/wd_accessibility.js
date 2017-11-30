//****************************************************************//
/*							FUNCTIONS							  */
//****************************************************************//
//Chatbox facebook script
if (typeof wd_accessibility_chatbox_facebook != 'function') { 
	function wd_accessibility_chatbox_facebook() {
		var raido = jQuery(".wd-facebook-chatbox-wrap").data("toggle");
        if (raido == 1) {
            jQuery(".wd-facebook-chatbox-footer").css("display", "none");
            jQuery(".wd-facebook-chatbox-close-btn").click(function() {
                jQuery(".wd-facebook-chatbox-wrap").slideToggle();
                jQuery(".wd-facebook-chatbox-footer").slideToggle();
            });
            jQuery(".wd-facebook-chatbox-footer").click(function() {
                jQuery(".wd-facebook-chatbox-wrap").slideToggle();
                jQuery(this).slideToggle();
            });
        } else {
            jQuery(".wd-facebook-chatbox-wrap").css("display", "none");
            jQuery(".wd-facebook-chatbox-close-btn").click(function() {
                jQuery(".wd-facebook-chatbox-wrap").slideToggle();
                jQuery(".wd-facebook-chatbox-footer").slideToggle();
            });
            jQuery(".wd-facebook-chatbox-footer").click(function() {
                jQuery(".wd-facebook-chatbox-wrap").slideToggle();
                jQuery(this).slideToggle();
            });
        }
	}
}

//Email subscribe popup script
if (typeof wd_accessibility_email_subscribe_popup != 'function') { 
	function wd_accessibility_email_subscribe_popup(TB_WIDTH, TB_HEIGHT, delay_time) {
        setTimeout(function(){ 
            tb_remove();
            tb_show('', '#TB_inline?width='+TB_WIDTH+'&height='+TB_HEIGHT+'&inlineId=wd-email-subscribe-popup&modal=true');

            jQuery('#wd-email-subscribe-content').parents('#TB_ajaxContent').css('overflow', 'hidden');
            jQuery('.tb-close-icon').click(function() {
                tb_remove();
                var value = jQuery('.wd-email-subscribe-popup-disabled').is(':checked') ? true : false;
                if (value) {
                    var expire   = jQuery('.wd-email-subscribe-popup-disabled').data('expire');
                    jQuery.ajax({
                        type: 'POST',
                        url: ajax_object.ajax_url,
                        data: { 
                            action: 'wd_ajax_disabled_email_popup',
                            expire: expire,
                        },
                        success: function(data) {
                        }
                    });
                }
            });
            wd_thickbox_responsive(TB_WIDTH, TB_HEIGHT);
        }, 3000);
	}
}