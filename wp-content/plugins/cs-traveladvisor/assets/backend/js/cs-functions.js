var $ = jQuery;
jQuery(document).ready(function ($) {

    jQuery(".browse-icon").attr('style', 'display:block;');
    jQuery("#traveladvisor_var_point_of_interest_image_box").attr('style', 'display:none;');
    jQuery("#traveladvisor_var_point_interest_image_box").attr('style', 'display:none;');


//gal-active
    "use strict";
    /*
     * Media Upload 
     */
    var contheight;
    jQuery(document).on("click", ".cs-uploadMedia", function () {
        var $ = jQuery;
        var id = $(this).attr("name");
        var custom_uploader = wp.media({
            title: 'Select File',
            button: {
                text: 'Add File'
            },
            multiple: false
        }).on('select', function () {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            jQuery('#' + id).val(attachment.url);
            jQuery('#' + id + '_img').attr('src', attachment.url);
            jQuery('#' + id + '_box').show();
        });
    });

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

/**
 * Create Popup
 */
function traveladvisor_var_createpop(data, type) {
    "use strict";
    var _structure = "<div id='cs-pbwp-outerlay'><div id='cs-widgets-list'></div></div>",
            $elem = jQuery('#cs-widgets-list');
    jQuery('body').addClass("cs-overflow");
    if (type == "csmedia") {
        $elem.append(data);
    }
    if (type == "filter") {
        jQuery('#' + data).wrap(_structure).delay(100).fadeIn(150);
        jQuery('#' + data).parent().addClass("wide-width");
    }
    if (type == "filterdrag") {
        jQuery('#' + data).wrap(_structure).delay(100).fadeIn(150);
    }
}
/**
 * Remove Popup
 */
function traveladvisor_var_remove_overlay(id, text) {
    "use strict";
    jQuery("#cs-widgets-list .loader").remove();
    var _elem1 = "<div id='cs-pbwp-outerlay'></div>",
            _elem2 = "<div id='cs-widgets-list'></div>";
    var $elem = jQuery("#" + id);
    jQuery("#cs-widgets-list").unwrap(_elem1);
    if (text == "append" || text == "filterdrag") {
        $elem.hide().unwrap(_elem2);
    }
    if (text == "widgetitem") {
        $elem.hide().unwrap(_elem2);
        jQuery("body").append("<div id='cs-pbwp-outerlay'><div id='cs-widgets-list'></div></div>");
        return false;
    }
    if (text == "ajax-drag") {
        jQuery("#cs-widgets-list").remove();
    }
    jQuery("body").removeClass("cs-overflow");
}

function gal_num_of_items(id, rand_id, numb) {
    'use strict';
    var traveladvisor_var_gal_count = 0;
    jQuery("#gallery_sortable_" + rand_id + " > li").each(function (index) {
        traveladvisor_var_gal_count++;
        jQuery('input[name="traveladvisor_var_' + id + '_num"]').val(traveladvisor_var_gal_count);
    });

    if (numb != '') {
        var traveladvisor_var_data_temp = jQuery('#traveladvisor_var_' + id + '_temp');
        if (jQuery('input[name="traveladvisor_var_' + id + '_num"]').val() == numb) {
            traveladvisor_var_data_temp.html('<input type="hidden" name="traveladvisor_var_' + id + '_url[]" value=""><input type="hidden" name="traveladvisor_var_' + id + '_title[]" value=""><input type="hidden" name="traveladvisor_var_' + id + '_desc[]" value="">');
        }
    }
}

jQuery(function ($) {
    // Product gallery file uploads
    'use strict';
    var gallery_frame;

    jQuery('.add_gallery').on('click', 'input', function (event) {
        var $el = $(this);

        var get_id = $el.parent('.add_gallery').data('id');
        var rand_id = $el.parent('.add_gallery').data('rand_id');
		var post_type = jQuery('#post_type').val();
        var traveladvisor_var_theme_url = $("#traveladvisor_var_theme_url").val();
       var $gallery_images = $('#gallery_container_' + rand_id + ' ul.gallery_images');
       var traveladvisor_var_gallery_id = $('#gallery_container_' + rand_id).data("csid");
        event.preventDefault();
		var edit_gallery	= '';
        // If the media frame already exists, reopen it.
        if (gallery_frame) {
            gallery_frame.open();
            return;
        }

        // Create the media frame.
        gallery_frame = wp.media({
            title: "Select Image",
            multiple: true,
            library: {type: 'image'},
            button: {text: 'Add Gallery Image'}
        });

        // When an image is selected, run a callback.
        gallery_frame.on('select', function () {

            var selection = gallery_frame.state().get('selection');

            selection.map(function (attachment) {

                attachment = attachment.toJSON();

                if (attachment.type == 'image') {
                    var gallery_url = attachment.url;
                }
				
				

                if (attachment.url) {
                   var attachment_ids = Math.floor((Math.random() * 965674) + 1);
					if(post_type=='gallery'){
						edit_gallery	= '<span><a href="javascript:traveladvisor_var_createpop(\'edit_track_form' + attachment_ids + '\',\'filter\')"><i class="icon-edit3"></i></a></span>';
					}
					
					
                    $('#gallery_container_' + rand_id + ' ul.gallery_images').append('\
						<li class="image" data-attachment_id="' + attachment_ids + '">\
							<img src="' + gallery_url + '" />\
							<input type="hidden" value="' + gallery_url + '" name="' + traveladvisor_var_gallery_id + '_url[]" />\
							<div class="actions">\
								'+edit_gallery+'\
								<span><a href="javascript:;" class="delete" title="' + $el.data('delete') + '"><i class="icon-times"></i></a></span>\
							</div>\
							<tr class="parentdelete" id="edit_track' + attachment_ids + '">\
							  <td style="width:0">\
							  <div id="edit_track_form' + attachment_ids + '" style="display: none;" class="table-form-elem">\
								  <div class="cs-heading-area">\
									<h5 style="text-align: left;">Edit Item</h5>\
									<span onclick="javascript:traveladvisor_var_remove_overlay(\'edit_track_form' + attachment_ids + '\',\'append\')" class="cs-btnclose"> <i class="icon-times"></i></span>\
									<div class="clear"></div>\
								  </div>\
								  <div class="form-elements">\
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">\
									  <label>&nbsp;</label>\
									</div>\
									<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">\
									  <img src="' + gallery_url + '" width="150" />\
									</div>\
								  </div>\
								  <div class="form-elements">\
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">\
									  <label>Title</label>\
									</div>\
									<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">\
									  <input type="text" name="' + traveladvisor_var_gallery_id + '_title[]" />\
									</div>\
								  </div>\
								  <div class="form-elements">\
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">\
									  <label>Description</label>\
									</div>\
									<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">\
									  <textarea name="' + traveladvisor_var_gallery_id + '_desc[]"></textarea>\
									</div>\
								  </div>\
								  <ul class="form-elements noborder">\
									<li class="to-label">\
									  <label></label>\
									</li>\
									<li class="to-field">\
									  <input type="button" value="Update" onclick="traveladvisor_var_remove_overlay(\'edit_track_form' + attachment_ids + '\',\'append\')" />\
									</li>\
								  </ul>\
								</div>\
								</td>\
							</tr>\
						</li>');
                }

            });
            jQuery('#' + traveladvisor_var_gallery_id + '_temp').html('');
        });

        // Finally, open the modal.
        gallery_frame.open();
    });

});

/**
 * @Sorting
 *
 */

function traveladvisor_var_gallery_sorting_list(id, random_id) {
    'use strict';
    var gallery = []; // more efficient than new Array()
    jQuery('#gallery_sortable_' + random_id + ' li').each(function () {
        var data_value = jQuery.trim(jQuery(this).data('attachment_id'));
        gallery.push(jQuery(this).data('attachment_id'));
    });

    jQuery("#" + id).val(gallery.toString());
}

//user reviews

var counter_review = 0;
function add_review_list(admin_url, theme_url) {
    'use strict';
 counter_review++;
    var newSrc = $('#traveladvisor_var_point_of_interest_image_img').attr('src');
    var dataString = 'traveladvisor_var_destination_name=' + jQuery("#traveladvisor_var_destination_name").val() +
            '&traveladvisor_var_destination_desc=' + jQuery("#traveladvisor_var_destination_desc").val() +
            '&traveladvisor_var_title_url=' + jQuery("#traveladvisor_var_title_url").val() +
            '&traveladvisor_var_point_of_interest_image=' + newSrc +
            '&action=add_review_to_list';
    jQuery(".feature-loader").html("<i class='icon-spinner8 icon-spin'></i>");
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery("#traveladvisor_var_point_of_interest_image_img").attr('src', "");
            jQuery("#traveladvisor_var_point_of_interest_image_box").attr('style', 'display:none;');
            jQuery(".browse-icon").attr('style', 'display:block;');
            jQuery("#total_destinations").append(response);
            jQuery(".feature-loader").html("");
            traveladvisor_var_remove_overlay('add_destination_title', 'append');
            jQuery("#traveladvisor_var_destination_name").val("");
            jQuery("#traveladvisor_var_destination_desc").val("");
            jQuery("#traveladvisor_var_title_url").val("");
        }
    });
    return false;
}

var counter_list = 0;
function add_item_list(admin_url, theme_url) {
    'use strict';
    counter_list++;
    var dataString = 'traveladvisor_var_item_name=' + jQuery("#traveladvisor_var_item_name").val() +
            '&traveladvisor_var_item_time=' + jQuery("#traveladvisor_var_item_time").val() +
            '&traveladvisor_var_item_price=' + jQuery("#traveladvisor_var_item_price").val() +
            '&action=add_item_to_list';
    jQuery(".feature-loader").html("<i class='icon-spinner8 icon-spin'></i>");
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery("#total_items").append(response);
            jQuery(".feature-loader").html("");
            traveladvisor_var_remove_overlay('add_item_title', 'append');
            jQuery("#traveladvisor_var_item_name").val("Title");
            jQuery("#traveladvisor_var_item_time").val("");
            jQuery("#traveladvisor_var_item_price").val("");
        }
    });
    return false;
}

var counter_exp = 0;
function add_exp_list(admin_url, theme_url) {
    'use strict';
    counter_exp++;
    var dataString = 'traveladvisor_var_exp_name=' + jQuery("#traveladvisor_var_exp_name").val() +
            '&traveladvisor_var_exp_desc=' + jQuery("#traveladvisor_var_exp_desc").val() +
            '&traveladvisor_var_exp_icon=' + jQuery("#traveladvisor_var_exp_icon").val() +
            '&action=add_exp_to_list';
    jQuery(".feature-loader").html("<i class='icon-spinner8 icon-spin'></i>");
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery("#total_exps").append(response);
            jQuery(".feature-loader").html("");
            traveladvisor_var_remove_overlay('add_exp_title', 'append');
            jQuery("#traveladvisor_var_exp_name").val("Title");
            jQuery("#traveladvisor_var_exp_desc").val("");
            jQuery("#traveladvisor_var_exp_icon").val("");
        }
    });
    return false;
}

var counter_feature = 0;
function add_feature_list(admin_url, theme_url, infobox_id) {
    'use strict';
    counter_feature++;
    var icon_val = jQuery('#traveladvisor_infobox_' + infobox_id).find('#e9_element_' + infobox_id).val();
    var dataString = 'traveladvisor_var_feature_name=' + jQuery("#traveladvisor_var_feature_name").val() +
            '&traveladvisor_var_feature_desc=' + jQuery("#traveladvisor_var_feature_desc").val() +
            '&traveladvisor_var_feature_icon=' + icon_val +
            '&action=add_feature_to_list';
    jQuery(".feature-loader").html("<i class='icon-spinner8 icon-spin'></i>");
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery("#total_features").append(response);
            jQuery(".feature-loader").html("");
            traveladvisor_var_remove_overlay('add_feature_title', 'append');
            jQuery("#traveladvisor_var_feature_name").val('');
            jQuery("#traveladvisor_var_feature_desc").val('');
            jQuery("#traveladvisor_var_feature_icon").val('');
        }
    });
    return false;
}
var counter_feature = 0;
function add_question_list(admin_url, theme_url, infobox_id) {
    'use strict';
    counter_feature++;
    var icon_val = jQuery('#traveladvisor_infobox_' + infobox_id).find('#e9_element_' + infobox_id).val();
    var dataString = 'traveladvisor_var_exp_name=' + jQuery("#traveladvisor_var_exp_name").val() +
            '&traveladvisor_var_exp_desc=' + jQuery("#traveladvisor_var_exp_desc").val() +
            '&traveladvisor_var_exp_icon=' + icon_val +
            '&action=add_question_to_list';
    jQuery(".feature-loader").html("<i class='icon-spinner8 icon-spin'></i>");
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery("#total_exps").append(response);
            jQuery(".feature-loader").html("");
            traveladvisor_var_remove_overlay('add_fea_title', 'append');
            jQuery("#traveladvisor_var_exp_name").val('');
            jQuery("#traveladvisor_var_exp_desc").val('');
            jQuery("#traveladvisor_var_exp_icon").val('');
        }
    });
    return false;
}



var counter_feature = 0;
function add_highlight_list(admin_url, theme_url, infobox_id) {
    'use strict';
    counter_feature++;
    var icon_val = jQuery('#traveladvisor_infobox_' + infobox_id).find('#e9_element_' + infobox_id).val();
    var dataString = 'traveladvisor_var_highlight_name=' + jQuery("#traveladvisor_var_highlight_name").val() +
            '&traveladvisor_var_highlight_desc=' + jQuery("#traveladvisor_var_highlight_desc").val() +
            '&action=add_highlight_to_list';
    jQuery(".highlight-loader").html("<i class='icon-spinner8 icon-spin'></i>");
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery("#total_highlights").append(response);
            jQuery(".highlight-loader").html("");
            traveladvisor_var_remove_overlay('add_highlight_title', 'append');
            jQuery("#traveladvisor_var_highlight_name").val('');
            jQuery("#traveladvisor_var_highlight_desc").val('');
        }
    });
    return false;
}
var counter_schedule = 0;
function add_schedule_list(admin_url, theme_url) {
    'use strict';
    counter_schedule++;
    var newSrc = $('#traveladvisor_var_point_interest_image_img').attr('src');
    var dataString = 'traveladvisor_var_day=' + jQuery("#traveladvisor_var_day").val() +
            '&traveladvisor_var_place=' + jQuery("#traveladvisor_var_place").val() +
            '&traveladvisor_var_duration=' + jQuery("#traveladvisor_var_duration").val() +
            '&traveladvisor_var_description=' + jQuery("#traveladvisor_var_description").val() +
            '&traveladvisor_var_point_interest_image=' + newSrc +
            '&action=add_schedule_to_list';
    jQuery(".schedule-loader").html("<i class='icon-spinner8 icon-spin'></i>");
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery("#traveladvisor_var_point_interest_image_img").attr('src', "");
            jQuery("#traveladvisor_var_point_interest_image_box").attr('style', 'display:none;');
            jQuery(".browse-icon").attr('style', 'display:block;');
            jQuery("#total_schedules").append(response);
            jQuery(".schedule-loader").html("");
            traveladvisor_var_remove_overlay('add_schedule_title', 'append');
            jQuery("#traveladvisor_var_day").val('');
            jQuery("#traveladvisor_var_place").val('');
            jQuery("#traveladvisor_var_duration").val('');
            jQuery("#traveladvisor_var_description").val('');
        }
    });
    return false;
}


//destination

var counter_destination = 0;
function add_destination_list(admin_url, theme_url) {
    'use strict';
    counter_destination++;
    var newSrc = $('#traveladvisor_var_point_of_interest_image_img').attr('src');
    var dataString = 'traveladvisor_var_destination_name=' + jQuery("#traveladvisor_var_destination_name").val() +
            '&traveladvisor_var_destination_desc=' + jQuery("#traveladvisor_var_destination_desc").val() +
            '&traveladvisor_var_add_url=' + jQuery("#traveladvisor_var_add_url").val() +
            '&traveladvisor_var_title_url=' + jQuery("#traveladvisor_var_title_url").val() +
            '&traveladvisor_var_point_of_interest_image=' + newSrc +
            '&action=add_destination_to_list';
    jQuery(".feature-loader").html("<i class='icon-spinner8 icon-spin'></i>");
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery("#traveladvisor_var_point_of_interest_image_img").attr('src', "");
            jQuery("#traveladvisor_var_point_of_interest_image_box").attr('style', 'display:none;');
            jQuery(".browse-icon").attr('style', 'display:block;');
            jQuery("#total_destinations").append(response);
            jQuery(".feature-loader").html("");
            traveladvisor_var_remove_overlay('add_destination_title', 'append');
            jQuery("#traveladvisor_var_destination_name").val("");
            jQuery("#traveladvisor_var_destination_desc").val("");
            jQuery("#traveladvisor_var_add_url").val("");
            jQuery("#traveladvisor_var_title_url").val("");
        }
    });
    return false;
}
function _removerlay(object) {
    'use strict';
    jQuery("#cs-widgets-list .loader").remove();
    var _elem1 = "<div id='cs-pbwp-outerlay'></div>",
            _elem2 = "<div id='cs-widgets-list'></div>";
    var $elem;
    $elem = object.closest('div[class*="cs-wrapp-class-"]');
    $elem.unwrap(_elem2);
    $elem.unwrap(_elem1);
    $elem.hide()
}
function pagination_hide(view) {
    'use strict';
    if (view == 'destination_slider') {
        jQuery(".paginations").hide();
		jQuery(".paginationsz").show();
    } else if (view == 'destination_grid') {
        jQuery(".paginationsz").hide();
		jQuery(".paginations").show();
    }  else if (view == 'destination_masnory') {
        jQuery(".paginationsz").hide();
		jQuery(".paginations").show();
    }  else if (view == 'destination_listing') {
        jQuery(".paginationsz").show();
		jQuery(".paginations").show();
    }
}

function tour_excerpt_hide(view) {
    'use strict';
    if (view == 'tour_grid') {
        jQuery(".tour_hide_show").hide();
	} else {
		jQuery(".tour_hide_show").show();
	}
}



                   