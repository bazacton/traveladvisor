var icons_load_call;
var loaded_icons;
jQuery(document).ready(function ($) {
    'use strict';
    var site_url = icons_vars.site_url;

    icons_load_call = $.getJSON(site_url + "assets/common/icomoon/js/selection.json")
    .done(function (response) {
        loaded_icons = response;
    });
});