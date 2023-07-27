var $ = jQuery;
$('body.rtl .cs-help').attr("data-placement", "left");
/*
 * Media Upload 
 */
jQuery(document).on("click", ".cs-traveladvisor-media", function () {
     "use strict";
    var $ = jQuery;
    var id = $(this).attr("name");
    var _this_parent = $(this).parent('label');
    var custom_uploader = wp.media({
        title: 'Select File',
        button: {
            text: 'Add File'
        },
        multiple: false
    }).on('select', function () {
        var attachment = custom_uploader.state().get('selection').first().toJSON();
        _this_parent.prev('#' + id).next().hide();
        _this_parent.prev('#' + id).val(attachment.url);
        _this_parent.next('#' + id + '_box').find('#' + id + '_img').attr('src', attachment.url);
        _this_parent.next('#' + id + '_box').show();
    }).open();

});
jQuery(document).ready(function ($) {
    "use strict";
    $('[data-toggle="popover"]').popover();
});
$(document).on('click', 'label.cs-chekbox', function () {
     "use strict";
    var checkbox = $(this).find('input[type=checkbox]');

    if (checkbox.is(":checked")) {
        $('#' + checkbox.attr('name')).val(checkbox.val());
        $('#' + checkbox.attr('name')).attr('value', 'on');
    } else {
        $('#' + checkbox.attr('name')).val('');
        $('#' + checkbox.attr('name')).attr('value', '');
    }
});
function traveladvisor_var_show_slider(traveladvisor_value) {
     "use strict";
    if (traveladvisor_value == 'slider') {
        $('#cs-rev-slider-fields').show();
        $('#cs-no-headerfields').hide();
        $('#cs-breadcrumbs-fields').hide();
       } else if (traveladvisor_value == 'no_header') {
        $('#cs-no-headerfields').show();
        $('#cs-breadcrumbs-fields').hide();
        $('#cs-rev-slider-fields').hide();
    } else {
        $('#cs-breadcrumbs-fields').show();
        $('#cs-no-headerfields').hide();
        $('#cs-rev-slider-fields').hide();
    }
}
function traveladvisor_var_subheader_style(traveladvisor_value) {
     "use strict";
    if (traveladvisor_value == 'with_bg') {
        $('#cs-subheader-border-f').show();
        $('#cs-subheader-with-bg').show();
        $('#cs-subheader-clr-f').show();
    } else if (traveladvisor_value == 'classic') {
        $('#cs-subheader-border-f').hide();
        $('#cs-subheader-with-bg').hide();
        $('#cs-subheader-clr-f').show();
    } else {
        $('#cs-subheader-border-f').show();
        $('#cs-subheader-with-bg').hide();
        $('#cs-subheader-clr-f').hide();
    }
}
/*
 *  Message Slide show functions
 */
function slideout() {
    "use strict";
    setTimeout(function () {
        jQuery(".form-msg").slideUp("slow", function () {
        });
    }, 5000);
}
/*
 *End Message Slide show functions
 */

/*
 *  Remove div Function
 */
function traveladvisor_div_remove(id) {
    "use strict";
    jQuery("#" + id).remove();
}
/*
 *End Remove div Function
 */
/*
 * Delete Media Functions
 */
function del_media(id) {
    "use strict";
    var $ = jQuery;
    //jQuery('input[name="'+id+'"]').show();
    jQuery('#' + id + '_box').hide();
    jQuery('#' + id).val('');
    jQuery('#' + id).next().show();
}
/*
 * End Delete Media Functions
 */
function traveladvisor_var_toggle(id) {
     "use strict";
    jQuery("#" + id).slideToggle("slow");
}
function chosen_selectionbox() {
     "use strict";
    if (jQuery('.chosen-select, .chosen-select-deselect, .chosen-select-no-single, .chosen-select-no-results, .chosen-select-width').length != '') {
        var config = {
            '.chosen-select': {width: "100%"},
            '.chosen-select-deselect': {allow_single_deselect: true},
            '.chosen-select-no-single': {disable_search_threshold: 10, width: "100%"},
            '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
            '.chosen-select-width': {width: "95%"}
        };
        for (var selector in config) {
            jQuery(selector).chosen(config[selector]);
        }
    }
}
function _removerlay(object) {
     "use strict";
    jQuery("#cs-widgets-list .loader").remove();
    var _elem1 = "<div id='cs-pbwp-outerlay'></div>",
            _elem2 = "<div id='cs-widgets-list'></div>";
    var $elem;
    $elem = object.closest('div[class*="cs-wrapp-class-"]');
    $elem.unwrap(_elem2);
    $elem.unwrap(_elem1);
    $elem.hide()
}
var $ = jQuery;
jQuery(document).ready(function ($) {
     "use strict";
    /*
     * CS meta fileds Tabs
     */
    var myUrl = window.location.href; //get URL
    var myUrlTab = myUrl.substring(myUrl.indexOf("#")); // For localhost/tabs.html#tab2, myUrlTab = #tab2     
    var myUrlTabName = myUrlTab.substring(0, 4); // For the above example, myUrlTabName = #tab
    jQuery("#tabbed-content > div").addClass('hidden-tab'); // Initially hide all content #####EDITED#####
    jQuery("#cs-options-tab li:first a").attr("id", "current"); // Activate first tab
    jQuery("#tabbed-content > div:first").hide().removeClass('hidden-tab').fadeIn(); // Show first tab content   #####EDITED#####
    jQuery("#cs-options-tab > li:first").addClass('active');

    jQuery("#cs-options-tab a").on("click", function (e) {
         "use strict";
	e.preventDefault();
        if (jQuery(this).attr("id") == "current") { //detection for current tab
            return
        } else {
            traveladvisor_reset_tabs();
            console.log(this);
            jQuery("#cs-options-tab > li").removeClass('active')
            jQuery(this).attr("id", "current"); // Activate this
            jQuery(this).parents('li').addClass('active');
            jQuery(jQuery(this).attr('name')).hide().removeClass('hidden-tab').fadeIn(); // Show content for current tab
        }
    });

    var i;
    for (i = 1; i <= jQuery("#cs-options-tab li").length; i++) {
        if (myUrlTab == myUrlTabName + i) {
            traveladvisor_reset_tabs();
            jQuery("a[name='" + myUrlTab + "']").attr("id", "current"); // Activate url tab
            jQuery(myUrlTab).hide().removeClass('hidden-tab').fadeIn(); // Show url tab content        
        }
    }

    /*
     * End CS meta fileds Tabs
     */

});
function traveladvisor_reset_tabs() {
    "use strict";
    jQuery("#tabbed-content > div").addClass('hidden-tab'); //Hide all content
    jQuery("#cs-options-tab a").attr("id", ""); //Reset id's      
}
function image_place_show(view) {
     "use strict";
    if (view == 'team_fancy') {
        jQuery(".image_placement").show();
    } else {
        jQuery(".image_placement").hide();
    }

    if (view == 'team_simple') {
        jQuery(".social_media").hide();
    } else {
        jQuery(".social_media").show();
    }

    if (view == 'team_grid') {
        jQuery(".description").hide();
    } else {
        jQuery(".description").show();
    }

}
function traveladvisor_icon_box_view_change(view) {
     "use strict";
    if (view == 'icon') {
        jQuery(".service_widget_image").hide();
    } else {
        jQuery(".service_widget_image").show();
    }

    if (view == 'widget_view') {
        jQuery(".service_icon").hide();
        jQuery(".multi_services_icon").hide();
    } else {
        jQuery(".service_icon").show();
        jQuery(".multi_services_icon").show();
    }
}
function select_service_view(view) {
     "use strict";
    if (view == 'fancy_view') {
        jQuery(".icon_box_hide_show").hide();
    } else {
        jQuery(".icon_box_hide_show").show();
    }
    if (view == 'widget_view') {
        jQuery(".iconbox_sidebar_hide_show").hide();
    } else {
        jQuery(".iconbox_sidebar_hide_show").show();
    }

}
function counter_hide(view) {
     "use strict";
    if (view == 'box') {
        jQuery(".counter_div").show();
    } else {
        jQuery(".counter_div").hide();
    }
}