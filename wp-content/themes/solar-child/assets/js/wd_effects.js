//****************************************************************//
/*							Effect JS							  */
//****************************************************************//
jQuery(document).ready(function($) {
	"use strict";

    //Sidebar scroll fixed
	if (effects_status.sidebar_scroll == 1) {
		wd_sidebar_sticky();
	}
    
});

//****************************************************************//
/*                          FUNCTIONS                             */
//****************************************************************//

 //Sidebar scroll fixed
if (typeof wd_sidebar_sticky != 'function') { 
    function wd_sidebar_sticky() {
        jQuery('.wd-sidebar').hcSticky({
            top: 35,
            followScroll: true,
            offResolutions: -991,
            responsive:true,
            stickTo: '.wd-main-content'
        });
    }
}