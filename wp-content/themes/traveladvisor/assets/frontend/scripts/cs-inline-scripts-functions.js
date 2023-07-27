var $ = jQuery;

function traveladvisor_var_inline_style(input_style) {
    "use strict";
    var styleNode = document.createElement('style');
    styleNode.type = "text/css";
    // browser detection (based on prototype.js)
    if (!!(window.attachEvent && !window.opera)) {
        styleNode.styleSheet.cssText = input_style;
    } else {
        var styleText = document.createTextNode(input_style);
        styleNode.appendChild(styleText);
    }
    document.getElementsByTagName('head')[0].appendChild(styleNode);
}

function traveladvisor_var_inline_js(input_js) {
    "use strict";
    var jsNode = document.createElement('script');
    jsNode.type = "text/javascript";
    // browser detection (based on prototype.js)
    if (!!(window.attachEvent && !window.opera)) {
        jsNode.styleSheet.cssText = input_js;
    } else {
        var jsText = document.createTextNode(input_js);
        jsNode.appendChild(jsText);
    }
    document.getElementsByTagName('body')[0].appendChild(jsNode);
}
"use strict";
if (typeof (traveladvisor_page_style) === 'object') {
    if (traveladvisor_page_style.css !== 'undefined') {

        traveladvisor_var_inline_style(traveladvisor_page_style.css);
    }
}
