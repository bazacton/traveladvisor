<?php
/*
 * Theme style 
 */
if (!function_exists('traveladvisor_var_custom_style_theme_options')) {
    $traveladvisor_var_custom_themeoption_str = '';


    /*
     * Start function for theme option backend setting and classes
     */

    function traveladvisor_var_custom_style_theme_options() {
        global $traveladvisor_var_custom_themeoption_str;
        ob_start();
        $traveladvisor_var_options = get_option('traveladvisor_var_options');
       // $traveladvisor_var_options = TRAVELADVISOR_VAR_GLOBALS()->theme_options();
        $traveladvisor_var_theme_color = $traveladvisor_var_options['traveladvisor_var_theme_color'];
        $traveladvisor_var_bg_color = $traveladvisor_var_options['traveladvisor_var_bg_color'];
        $traveladvisor_var_widget_title_color = $traveladvisor_var_options['traveladvisor_var_widget_title_color'];
        $traveladvisor_var_text_color = $traveladvisor_var_options['traveladvisor_var_text_color'];
        $traveladvisor_var_post_title_color = $traveladvisor_var_options['traveladvisor_var_post_title_color'];
        ?>
        /*!
        * Theme Color File */
        .cs-color, .active > a, .active > a:hover, .active > a:focus, footer#footer .footer-links a, .pagination > li > a:hover, .pagination > li > a:focus, .pagination > li > a:hover i, .pagination > li > a.active,
        .widget .post-title h6:hover, .widget .post-title h6 a:hover, .widget .post-title h5:hover, .widget .post-title h5 a:hover,.widget-categories li a:hover,
        .cs-blog .post-title h3:hover, .cs-blog .post-title h3 a:hover, .cs-blog .post-title h2:hover, .cs-blog .post-title h2 a:hover, .cs-blog .post-title h4:hover, .cs-blog .post-title h4 a:hover,.cs-blog .cs-categorise a:hover, .cs-blog-detail .post-meta span a:hover,
        .cs-prvnext-post h6:hover, .cs-prvnext-post h6 a:hover, .cs-prvnext-post a:hover, .cs-interest-listing .post-title h4:hover, .cs-interest-listing .post-title h4 a:hover
        ,.main-navigation ul ul li a:hover,.main-navigation ul ul > li:hover > a, .top-footer .cs-social-media ul li a:hover, .top-footer .cs-social-media ul li a:hover i,.cs-footer-widgets ul li a:before,.breadcrumbs ul li.active,header.modern .mm-toggle i, header.modern .cs-cart a i,header.modern .main-navigation > ul > li:hover > a,
        .widget-price-filter .slider.slider-horizontal .slider-tick, .widget-price-filter .slider.slider-horizontal .slider-handle, .widget-price-filter .slider-selection, .nav-widget ul li:hover i, .cs-team.classic:hover .cs-text h3 a, .cs-team-directors:hover .cs-text h6 a, .cs-blog.fancy:hover .blog-author a, 
        .cs-blog.fancy:hover .blog-fancy-detail h3 a, .cs-blog.fancy:hover .blog-fancy-detail ul li a,
        .wp-traveladvisor .cs-pagination ul.pagination li a:hover,
        .wp-traveladvisor .cs-list .cs-text .cs-heading-section .cs-post-title h3 a:hover,
        .wp-traveladvisor .page-sidebar .cs-listing-filters .panel-group .panel-heading a:after,
        .cs-error-content a,.cs-search-field span a,.cs-search-post .cs-text a,.cs-construction .cs-social-media ul li:hover a,.cs-term-condition p a , .single-trip ul.cs-detail-next-post li .cs-date-post .cs-post-thumb .cs-text h5:hover a,
        .panel-group .panel .panel-heading .panel-title a,
        .panel-group .panel .panel-heading .panel-title a:before,
        .wp-traveladvisor ul.cs-listing-short-by li span.active,
        .wp-traveladvisor ul.cs-listing-short-by li:hover span,
        .cs-search-post .cs-text h3 a:hover, .cs-destination-listing.destination-grid .cs-text .cs-location-sec h6 a:hover, .breadcrumbs ul li a:hover, .mobile-menu .expand,
        .woocommerce ul.products li.product .price del,
        .widget_product_categories li a:hover,
        .woocommerce.widget_top_rated_products li a:hover span,
        .cs-blog .post-option a:hover,
        .input-button input:hover,
        .nav-widget ul li:hover a,
        .cs-services .cs-text h4 a:hover,
        .widget-faq a,
        .widget_shopping_cart li a:hover,
        .woocommerce.single-product #review_form #respond .input-button input,
        .woocommerce .woocommerce-info .showlogin:hover, .woocommerce-info .showcoupon:hover, .cs-list-short ul li a.active i,
        .woocommerce.single-product div.product form.cart .button {
        <?php if (isset($traveladvisor_var_theme_color) || $traveladvisor_var_theme_color != '') { ?>
            color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_theme_color); ?> !important;
        <?php } ?>
        }
        /*!
        * Theme Background Color */
        .cs-bgcolor, .chosen-container-multi .chosen-choices li.search-choice, .chosen-container .chosen-results li.highlighted, .cs-tags ul li a:hover ,.slicknav_nav,.slicknav_btn,
        #add_payment_method #payment ul.payment_methods li.wc_payment_method input[type="radio"]:checked + label:after, 
        .woocommerce-checkout #payment ul.payment_methods li.wc_payment_method input[type="radio"]:checked + label:after, .widget-price-filter .slider-selection, .cs-team-directors:hover .cs-media figcaption,
        .wp-traveladvisor ul.cs-listing-categories li a:hover,
        .wp-traveladvisor .cs-list .cs-text ul.cs-listing-option li a:hover,
        .wp-traveladvisor .cs-pagination ul.pagination li a:after,
        .wp-traveladvisor .page-sidebar .cs-listing-filters .cs-filter-title:after,
        .wp-traveladvisor .page-sidebar .cs-listing-filters  ul.cs-checkbox-list li input[type="checkbox"]:checked + label:after,
        .wp-traveladvisor .page-sidebar .cs-listing-filters  ul.cs-checkbox-list li input[type="radio"]:checked + label:after,
        .wp-traveladvisor .page-sidebar .cs-listing-filters  ul.price-list li a:hover:before,
        .wp-traveladvisor .page-sidebar .cs-listing-filters  ul.price-list li.active a:before,
        .wp-traveladvisor .cs-pagination ul.pagination li a.active:after,
        .wp-traveladvisor .woocommerce form.checkout .form-row input.button,
        .woocommerce form.login .form-row input.button,
        .woocommerce form.checkout_coupon .form-row input.button,
        .woocommerce.widget_shopping_cart .buttons a,
        .woocommerce form.lost_reset_password .form-row input.button,
        .cs-blog.fancy:hover .blog-fancy-detail .btn-fwd,
        .wp-traveladvisor .cs-counter .cs-text strong:after, 
        .wp-traveladvisor .cs-counter .cs-text strong:after,
        .slick-dots li.slick-active button,
        .cs-team.grid .cs-media:hover figcaption,
        .wp-traveladvisor .cs-gallery.grid .cs-media figcaption .media-title,
        .input-holder input[type="submit"], .cs-comments ul li .cs-text .cs-replay-btn:hover, .cs-team.classic .cs-text .social-media li a:hover, .mobile-menu .input-group-btn > .btn, .mobile-menu li.active, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,
        .woocommerce form table.shop_table.cart button.button,
        .woocommerce .woocommerce-checkout-payment .button {
        <?php if (isset($traveladvisor_var_theme_color) || $traveladvisor_var_theme_color != '') { ?>
            background-color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_theme_color); ?> !important;
        <?php } ?>
        }

        /*!
        * Theme Border Color */
        .csborder-color, .cs-blog .cs-readmore-btn, .pagination > li > a:hover, .pagination > li > a.active  , blockquote, .cs-contact-form form .input-holder input[type="text"]:focus,.cs-contact-form form .input-holder input[type="email"]:focus, .cs-contact-form form .input-holder textarea:focus,
        .woocommerce.single-product div.product form.cart .button, .woocommerce.single-product #review_form #respond .form-submit input[type="submit"],
        .woocommerce #payment ul li .radiobox input[type="radio"]:checked + label:after, .nav-widget ul li:hover:after, .cs-construction .time-box h4,
        .slick-dots li.slick-active button {
        <?php if (isset($traveladvisor_var_theme_color) || $traveladvisor_var_theme_color != '') { ?>
            border-color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_theme_color); ?> !important;
        <?php } ?>
        }
        
        <?php
        $traveladvisor_var_sitcky_header_switch = $traveladvisor_var_options['traveladvisor_var_sitcky_header_switch'];
        $traveladvisor_var_layout = $traveladvisor_var_options['traveladvisor_var_layout'];
        $traveladvisor_var_custom_bgimage = $traveladvisor_var_options['traveladvisor_var_custom_bgimage'];
        $traveladvisor_var_bg_image = $traveladvisor_var_options['traveladvisor_var_bg_image'];
        $traveladvisor_var_pattern_image = $traveladvisor_var_options['traveladvisor_var_pattern_image'];
        $traveladvisor_var_background_position = $traveladvisor_var_options['traveladvisor_var_bgimage_position'];

        if ($traveladvisor_var_layout != 'full_width') {
            $traveladvisor_repeat_options = false;
            if ($traveladvisor_var_custom_bgimage != "") {
                $traveladvisor_repeat_options = true;
                $traveladvisor_var_background_image = $traveladvisor_var_custom_bgimage;
            } else if ($traveladvisor_var_bg_image != "" && $traveladvisor_var_bg_image != 'bg0') {
                $traveladvisor_var_background_image = trailingslashit(get_template_directory_uri()) . "assets/backend/images/background/" . $traveladvisor_var_bg_image . ".png";
            } else if ($traveladvisor_var_pattern_image != "" && $traveladvisor_var_pattern_image != 'pattern0') {
                $traveladvisor_var_background_image = trailingslashit(get_template_directory_uri()) . "assets/backend/images/patterns/" . $traveladvisor_var_pattern_image . ".png";
            }

            if (isset($traveladvisor_var_background_image) && $traveladvisor_var_background_image <> "") {
                if ($traveladvisor_repeat_options == true) {
                    $wrppaer_style = 'background:url(' . $traveladvisor_var_background_image . ') ' . $traveladvisor_var_background_position . ' ' . $traveladvisor_var_bg_color . ' !important;';
                } else {
                    $wrppaer_style = 'background:url(' . $traveladvisor_var_background_image . ') repeat ' . $traveladvisor_var_bg_color . ' !important;';
                }
            } else if ($traveladvisor_var_bg_color != '') {
                $wrppaer_style = 'background:' . $traveladvisor_var_bg_color . ' !important;';
            }
        } else if ($traveladvisor_var_custom_bgimage != '') {
            $wrppaer_style = 'background:url(' . $traveladvisor_var_custom_bgimage . ') ' . $traveladvisor_var_background_position . ' ' . $traveladvisor_var_bg_color . ' !important;';
        } else if ($traveladvisor_var_bg_color != '') {
            $wrppaer_style = 'background:' . $traveladvisor_var_bg_color . ' !important;';
        }

        if (isset($wrppaer_style) && $wrppaer_style != '') {
            ?>
            .wrapper{
            <?php echo traveladvisor_allow_special_char($wrppaer_style) ?>
            }
            <?php
        }
        if (isset($traveladvisor_var_sitcky_header_switch) && $traveladvisor_var_sitcky_header_switch == 'on') {
            ?>
            .cs-main-nav {
            position: fixed !important;

            z-index: 99 !important;
            }
            <?php
        } else {
            ?>
            .cs-main-nav {

            position: relative !important;

            z-index: 99 !important;
            }
            <?php
        }

        /**
         * @Set Header color Css
         *
         *
         */
        $traveladvisor_var_header_bgcolor = $traveladvisor_var_options['traveladvisor_var_header_bgcolor'];
        $traveladvisor_var_menu_color = $traveladvisor_var_options['traveladvisor_var_menu_color'];
        $traveladvisor_var_menu_active_color = $traveladvisor_var_options['traveladvisor_var_menu_active_color'];
        $traveladvisor_var_modern_menu_color = $traveladvisor_var_options['traveladvisor_var_modern_menu_color'];
        $traveladvisor_var_modern_menu_active_color = $traveladvisor_var_options['$traveladvisor_var_modern_menu_active_color'];
        $traveladvisor_var_submenu_bgcolor = $traveladvisor_var_options['traveladvisor_var_submenu_bgcolor'];
        $traveladvisor_var_submenu_color = $traveladvisor_var_options['traveladvisor_var_submenu_color'];
        $traveladvisor_var_menu_heading_color = $traveladvisor_var_options['traveladvisor_var_menu_heading_color'];
        $traveladvisor_var_submenu_hover_color = $traveladvisor_var_options['traveladvisor_var_submenu_hover_color'];
        $traveladvisor_var_topstrip_bgcolor = $traveladvisor_var_options['traveladvisor_var_topstrip_bgcolor'];
        $traveladvisor_var_topstrip_text_color = $traveladvisor_var_options['traveladvisor_var_topstrip_text_color'];
        $traveladvisor_var_topstrip_link_color = $traveladvisor_var_options['traveladvisor_var_topstrip_link_color'];
        $traveladvisor_var_menu_activ_bg = $traveladvisor_var_options['traveladvisor_var_theme_color'];
        $traveladvisor_var_page_title_color = $traveladvisor_var_options['traveladvisor_var_page_title_color'];

        /* logo margins */
        $traveladvisor_var_logo_margint = $traveladvisor_var_options['traveladvisor_var_logo_margint'];
        $traveladvisor_var_logo_marginb = $traveladvisor_var_options['traveladvisor_var_logo_marginb'];

        $traveladvisor_var_logo_marginr = $traveladvisor_var_options['traveladvisor_var_logo_marginr'];
        $traveladvisor_var_logo_marginl = $traveladvisor_var_options['traveladvisor_var_logo_marginl'];

        /* font family */
        $traveladvisor_var_content_font = $traveladvisor_var_options['traveladvisor_var_content_font'];
        $traveladvisor_var_content_font_att = $traveladvisor_var_options['traveladvisor_var_content_font_att'];

        $traveladvisor_var_mainmenu_font = $traveladvisor_var_options['traveladvisor_var_mainmenu_font'];
        $traveladvisor_var_mainmenu_font_att = $traveladvisor_var_options['traveladvisor_var_mainmenu_font_att'];

        $traveladvisor_var_heading1_font = $traveladvisor_var_options['traveladvisor_var_heading1_font'];
        $traveladvisor_var_heading1_font_att = $traveladvisor_var_options['traveladvisor_var_heading1_font_att'];

        $traveladvisor_var_heading2_font = $traveladvisor_var_options['traveladvisor_var_heading2_font'];
        $traveladvisor_var_heading2_font_att = $traveladvisor_var_options['traveladvisor_var_heading2_font_att'];

        $traveladvisor_var_heading3_font = $traveladvisor_var_options['traveladvisor_var_heading3_font'];
        $traveladvisor_var_heading3_font_att = $traveladvisor_var_options['traveladvisor_var_heading3_font_att'];

        $traveladvisor_var_heading4_font = $traveladvisor_var_options['traveladvisor_var_heading4_font'];
        $traveladvisor_var_heading4_font_att = $traveladvisor_var_options['traveladvisor_var_heading4_font_att'];

        $traveladvisor_var_heading5_font = $traveladvisor_var_options['traveladvisor_var_heading5_font'];
        $traveladvisor_var_heading5_font_att = $traveladvisor_var_options['traveladvisor_var_heading5_font_att'];

        $traveladvisor_var_heading6_font = $traveladvisor_var_options['traveladvisor_var_heading6_font'];
        $traveladvisor_var_heading6_font_att = $traveladvisor_var_options['traveladvisor_var_heading6_font_att'];

        $traveladvisor_var_section_title_font = $traveladvisor_var_options['traveladvisor_var_section_title_font'];
        $traveladvisor_var_section_title_font_att = $traveladvisor_var_options['traveladvisor_var_section_title_font_att'];

        $traveladvisor_var_page_title_font = $traveladvisor_var_options['traveladvisor_var_page_title_font'];
        $traveladvisor_var_page_title_font_att = $traveladvisor_var_options['traveladvisor_var_page_title_font_att'];

        $traveladvisor_var_post_title_font = $traveladvisor_var_options['traveladvisor_var_post_title_font'];
        $traveladvisor_var_post_title_font_att = $traveladvisor_var_options['traveladvisor_var_post_title_font_att'];

        $traveladvisor_var_widget_heading_font = $traveladvisor_var_options['traveladvisor_var_widget_heading_font'];
        $traveladvisor_var_widget_heading_font_att = $traveladvisor_var_options['traveladvisor_var_widget_heading_font_att'];

        $traveladvisor_var_ft_widget_heading_font = $traveladvisor_var_options['traveladvisor_var_ft_widget_heading_font'];
        $traveladvisor_var_ft_widget_heading_font_att = $traveladvisor_var_options['traveladvisor_var_ft_widget_heading_font_att'];

        // setting content fonts
        $traveladvisor_var_content_fonts = preg_split('#(?<=\d)(?=[a-z])#i', $traveladvisor_var_content_font_att);

        $traveladvisor_var_content_font_atts = traveladvisor_var_get_font_att_array($traveladvisor_var_content_fonts);

        // setting main menu fonts
        $traveladvisor_var_mainmenu_fonts = preg_split('#(?<=\d)(?=[a-z])#i', $traveladvisor_var_mainmenu_font_att);

        $traveladvisor_var_mainmenu_font_atts = traveladvisor_var_get_font_att_array($traveladvisor_var_mainmenu_fonts);

        // setting heading fonts
        $traveladvisor_var_heading1_fonts = preg_split('#(?<=\d)(?=[a-z])#i', $traveladvisor_var_heading1_font_att);
        $traveladvisor_var_heading1_font_atts = traveladvisor_var_get_font_att_array($traveladvisor_var_heading1_fonts);

        $traveladvisor_var_heading2_fonts = preg_split('#(?<=\d)(?=[a-z])#i', $traveladvisor_var_heading2_font_att);
        $traveladvisor_var_heading2_font_atts = traveladvisor_var_get_font_att_array($traveladvisor_var_heading2_fonts);

        $traveladvisor_var_heading3_fonts = preg_split('#(?<=\d)(?=[a-z])#i', $traveladvisor_var_heading3_font_att);
        $traveladvisor_var_heading3_font_atts = traveladvisor_var_get_font_att_array($traveladvisor_var_heading3_fonts);

        $traveladvisor_var_heading4_fonts = preg_split('#(?<=\d)(?=[a-z])#i', $traveladvisor_var_heading4_font_att);
        $traveladvisor_var_heading4_font_atts = traveladvisor_var_get_font_att_array($traveladvisor_var_heading4_fonts);

        $traveladvisor_var_heading5_fonts = preg_split('#(?<=\d)(?=[a-z])#i', $traveladvisor_var_heading5_font_att);
        $traveladvisor_var_heading5_font_atts = traveladvisor_var_get_font_att_array($traveladvisor_var_heading5_fonts);

        $traveladvisor_var_heading6_fonts = preg_split('#(?<=\d)(?=[a-z])#i', $traveladvisor_var_heading6_font_att);
        $traveladvisor_var_heading6_font_atts = traveladvisor_var_get_font_att_array($traveladvisor_var_heading6_fonts);

        // section title fonts
        $traveladvisor_var_section_title_fonts = preg_split('#(?<=\d)(?=[a-z])#i', $traveladvisor_var_section_title_font_att);
        $traveladvisor_var_section_title_font_atts = traveladvisor_var_get_font_att_array($traveladvisor_var_section_title_fonts);

        // page title heading fonts
        $traveladvisor_var_page_title_fonts = preg_split('#(?<=\d)(?=[a-z])#i', $traveladvisor_var_page_title_font_att);
        $traveladvisor_var_page_title_font_atts = traveladvisor_var_get_font_att_array($traveladvisor_var_page_title_fonts);

        //post title heading fonts
        $traveladvisor_var_post_title_fonts = preg_split('#(?<=\d)(?=[a-z])#i', $traveladvisor_var_post_title_font_att);
        $traveladvisor_var_post_title_font_atts = traveladvisor_var_get_font_att_array($traveladvisor_var_post_title_fonts);

        // setting widget heading fonts
        $traveladvisor_var_widget_heading_fonts = preg_split('#(?<=\d)(?=[a-z])#i', $traveladvisor_var_widget_heading_font_att);
        $traveladvisor_var_widget_heading_font_atts = traveladvisor_var_get_font_att_array($traveladvisor_var_widget_heading_fonts);

        // setting footer widget heading fonts
        $traveladvisor_var_ft_widget_heading_fonts = preg_split('#(?<=\d)(?=[a-z])#i', $traveladvisor_var_ft_widget_heading_font_att);
        $traveladvisor_var_ft_widget_heading_font_atts = traveladvisor_var_get_font_att_array($traveladvisor_var_ft_widget_heading_fonts);

        /* font size */
        $traveladvisor_var_content_size = $traveladvisor_var_options['traveladvisor_var_content_size'];
        $traveladvisor_var_mainmenu_size = $traveladvisor_var_options['traveladvisor_var_mainmenu_size'];
        $traveladvisor_var_heading_1_size = $traveladvisor_var_options['traveladvisor_var_heading_1_size'];
        $traveladvisor_var_heading_2_size = $traveladvisor_var_options['traveladvisor_var_heading_2_size'];
        $traveladvisor_var_heading_3_size = $traveladvisor_var_options['traveladvisor_var_heading_3_size'];
        $traveladvisor_var_heading_4_size = $traveladvisor_var_options['traveladvisor_var_heading_4_size'];
        $traveladvisor_var_heading_5_size = $traveladvisor_var_options['traveladvisor_var_heading_5_size'];
        $traveladvisor_var_heading_6_size = $traveladvisor_var_options['traveladvisor_var_heading_6_size'];
        $traveladvisor_var_section_title_size = $traveladvisor_var_options['traveladvisor_var_section_title_size'];
        $traveladvisor_var_page_title_size = $traveladvisor_var_options['traveladvisor_var_page_title_size'];
        $traveladvisor_var_post_title_size = $traveladvisor_var_options['traveladvisor_var_post_title_size'];
        $traveladvisor_var_widget_heading_size = $traveladvisor_var_options['traveladvisor_var_post_title_size'];
        $traveladvisor_var_ft_widget_heading_size = $traveladvisor_var_options['traveladvisor_var_ft_widget_heading_size'];

        // Font Line Heights
        $traveladvisor_var_content_lh = $traveladvisor_var_options['traveladvisor_var_content_lh'];
        $traveladvisor_var_mainmenu_lh = $traveladvisor_var_options['traveladvisor_var_mainmenu_lh'];
        $traveladvisor_var_heading_1_lh = $traveladvisor_var_options['traveladvisor_var_heading_1_lh'];
        $traveladvisor_var_heading_2_lh = $traveladvisor_var_options['traveladvisor_var_heading_2_lh'];
        $traveladvisor_var_heading_3_lh = $traveladvisor_var_options['traveladvisor_var_heading_3_lh'];
        $traveladvisor_var_heading_4_lh = $traveladvisor_var_options['traveladvisor_var_heading_4_lh'];
        $traveladvisor_var_heading_5_lh = $traveladvisor_var_options['traveladvisor_var_heading_5_lh'];
        $traveladvisor_var_heading_6_lh = $traveladvisor_var_options['traveladvisor_var_heading_6_lh'];
        $traveladvisor_var_section_title_lh = $traveladvisor_var_options['traveladvisor_var_section_title_lh'];
        $traveladvisor_var_page_title_lh = $traveladvisor_var_options['traveladvisor_var_page_title_lh'];
        $traveladvisor_var_post_title_lh = $traveladvisor_var_options['traveladvisor_var_post_title_lh'];
        $traveladvisor_var_widget_heading_lh = $traveladvisor_var_options['traveladvisor_var_widget_heading_lh'];
        $traveladvisor_var_ft_widget_heading_lh = $traveladvisor_var_options['traveladvisor_var_ft_widget_heading_lh'];

        // Font Line Heights
        $traveladvisor_var_content_spc = $traveladvisor_var_options['traveladvisor_var_content_spc'];
        $traveladvisor_var_mainmenu_spc = $traveladvisor_var_options['traveladvisor_var_mainmenu_spc'];
        $traveladvisor_var_heading_1_spc = $traveladvisor_var_options['traveladvisor_var_heading_1_spc'];
        $traveladvisor_var_heading_2_spc = $traveladvisor_var_options['traveladvisor_var_heading_2_spc'];
        $traveladvisor_var_heading_3_spc = $traveladvisor_var_options['traveladvisor_var_heading_3_spc'];
        $traveladvisor_var_heading_4_spc = $traveladvisor_var_options['traveladvisor_var_heading_4_spc'];
        $traveladvisor_var_heading_5_spc = $traveladvisor_var_options['traveladvisor_var_heading_5_spc'];
        $traveladvisor_var_heading_6_spc = $traveladvisor_var_options['traveladvisor_var_heading_6_spc'];
        $traveladvisor_var_section_title_spc = $traveladvisor_var_options['traveladvisor_var_section_title_spc'];
        $traveladvisor_var_page_title_spc = $traveladvisor_var_options['traveladvisor_var_page_title_spc'];
        $traveladvisor_var_post_title_spc = $traveladvisor_var_options['traveladvisor_var_post_title_spc'];
        $traveladvisor_var_widget_heading_spc = $traveladvisor_var_options['traveladvisor_var_widget_heading_spc'];
        $traveladvisor_var_ft_widget_heading_spc = $traveladvisor_var_options['traveladvisor_var_ft_widget_heading_spc'];

        // Font Text Transfrom
        $traveladvisor_var_content_textr = $traveladvisor_var_options['traveladvisor_var_content_textr'];
        $traveladvisor_var_mainmenu_textr = $traveladvisor_var_options['traveladvisor_var_mainmenu_textr'];
        $traveladvisor_var_heading_1_textr = $traveladvisor_var_options['traveladvisor_var_heading_1_textr'];
        $traveladvisor_var_heading_2_textr = $traveladvisor_var_options['traveladvisor_var_heading_2_textr'];
        $traveladvisor_var_heading_3_textr = $traveladvisor_var_options['traveladvisor_var_heading_3_textr'];
        $traveladvisor_var_heading_4_textr = $traveladvisor_var_options['traveladvisor_var_heading_4_textr'];
        $traveladvisor_var_heading_5_textr = $traveladvisor_var_options['traveladvisor_var_heading_5_textr'];
        $traveladvisor_var_heading_6_textr = $traveladvisor_var_options['traveladvisor_var_heading_6_textr'];
        $traveladvisor_var_section_title_textr = $traveladvisor_var_options['traveladvisor_var_section_title_textr'];
        $traveladvisor_var_page_title_textr = $traveladvisor_var_options['traveladvisor_var_page_title_textr'];
        $traveladvisor_var_post_title_textr = $traveladvisor_var_options['traveladvisor_var_post_title_textr'];
        $traveladvisor_var_widget_heading_textr = $traveladvisor_var_options['traveladvisor_var_widget_heading_textr'];
        $traveladvisor_var_ft_widget_heading_textr = $traveladvisor_var_options['traveladvisor_var_ft_widget_heading_textr'];


        $traveladvisor_var_widget_color = $traveladvisor_var_options['traveladvisor_var_widget_color'];
        $traveladvisor_var_ft_widget_title_color = $traveladvisor_var_options['traveladvisor_var_footer_widget_title_color'];


        /* font Color */
        $traveladvisor_var_heading_h1_color = $traveladvisor_var_options['traveladvisor_var_heading_h1_color'];
        $traveladvisor_var_heading_h2_color = $traveladvisor_var_options['traveladvisor_var_heading_h2_color'];
        $traveladvisor_var_heading_h3_color = $traveladvisor_var_options['traveladvisor_var_heading_h3_color'];
        $traveladvisor_var_heading_h4_color = $traveladvisor_var_options['traveladvisor_var_heading_h4_color'];
        $traveladvisor_var_heading_h5_color = $traveladvisor_var_options['traveladvisor_var_heading_h5_color'];
        $traveladvisor_var_heading_h6_color = $traveladvisor_var_options['traveladvisor_var_heading_h6_color'];

        $traveladvisor_var_widget_heading_size = $traveladvisor_var_options['traveladvisor_var_widget_heading_size'];
        $traveladvisor_var_section_heading_size = $traveladvisor_var_options['traveladvisor_var_section_heading_size'];
        $traveladvisor_var_copyright_bg_color = $traveladvisor_var_options['traveladvisor_var_copyright_bg_color'];

        if (
                ( isset($traveladvisor_var_options['traveladvisor_var_custom_font_woff']) && $traveladvisor_var_options['traveladvisor_var_custom_font_woff'] <> '' ) &&
                ( isset($traveladvisor_var_options['traveladvisor_var_custom_font_ttf']) && $traveladvisor_var_options['traveladvisor_var_custom_font_ttf'] <> '' ) &&
                ( isset($traveladvisor_var_options['traveladvisor_var_custom_font_svg']) && $traveladvisor_var_options['traveladvisor_var_custom_font_svg'] <> '' ) &&
                ( isset($traveladvisor_var_options['traveladvisor_var_custom_font_eot']) && $traveladvisor_var_options['traveladvisor_var_custom_font_eot'] <> '' )
        ):

            $font_face_html = "
        @font-face {
	font-family: 'traveladvisor_var_custom_font';
	src: url('" . $traveladvisor_var_options['traveladvisor_var_custom_font_eot'] . "');
	src:
		url('" . $traveladvisor_var_options['traveladvisor_var_custom_font_eot'] . "?#iefix') format('eot'),
		url('" . $traveladvisor_var_options['traveladvisor_var_custom_font_woff'] . "') format('woff'),
		url('" . $traveladvisor_var_options['traveladvisor_var_custom_font_ttf'] . "') format('truetype'),
		url('" . $traveladvisor_var_options['traveladvisor_var_custom_font_svg'] . "#traveladvisor_var_custom_font') format('svg');
	font-weight: 400;
	font-style: normal;
        }";

            $custom_font = true;
        else: $custom_font = false;
        endif;

        if ($custom_font == true) {
            echo traveladvisor_allow_special_char($font_face_html);
        }
        if ((isset($traveladvisor_var_content_size) && $traveladvisor_var_content_size != '') || (isset($traveladvisor_var_content_spc) && $traveladvisor_var_content_spc != '') || (isset($traveladvisor_var_content_textr) && $traveladvisor_var_content_textr != '') || (isset($traveladvisor_var_text_color) && $traveladvisor_var_text_color != '')) {
            ?>
            .main-section p, .mce-content-body p {
            <?php
            if ($custom_font == true) {
                echo 'font-family: traveladvisor_var_custom_font;';
                if (isset($traveladvisor_var_content_size) && $traveladvisor_var_content_size != '') {
                    echo 'font-size: ' . $traveladvisor_var_content_size . ';';
                }
                if (isset($traveladvisor_var_content_spc) && $traveladvisor_var_content_spc != '') {
                    echo esc_html($traveladvisor_var_content_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_content_spc . 'px;' : '');
                }
                if (isset($traveladvisor_var_content_textr) && $traveladvisor_var_content_textr != '') {
                    echo esc_html($traveladvisor_var_content_textr != '' ? 'text-transform: ' . $traveladvisor_var_content_textr . ';' : '');
                }
                if (isset($traveladvisor_var_text_color) && $traveladvisor_var_text_color != '') {
                    echo esc_html($traveladvisor_var_text_color != '' ? 'color: ' . $traveladvisor_var_text_color . ' !important;' : '');
                }
            } else {
                echo traveladvisor_var_font_font_print($traveladvisor_var_content_font_atts, $traveladvisor_var_content_size, $traveladvisor_var_content_lh, $traveladvisor_var_content_font);
                if (isset($traveladvisor_var_content_spc) && $traveladvisor_var_content_spc != '') {
                    echo esc_html($traveladvisor_var_content_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_content_spc . 'px;' : '');
                }
                if (isset($traveladvisor_var_content_textr) && $traveladvisor_var_content_textr != '') {
                    echo esc_html($traveladvisor_var_content_textr != '' ? 'text-transform: ' . $traveladvisor_var_content_textr . ';' : '');
                }
                if (isset($traveladvisor_var_text_color) && $traveladvisor_var_text_color != '') {
                    echo esc_html($traveladvisor_var_text_color != '' ? 'color: ' . $traveladvisor_var_text_color . ' !important;' : '');
                }
            }
            ?>
            }
            <?php
        }
        if ((isset($traveladvisor_var_logo_margint) && $traveladvisor_var_logo_margint != '') || (isset($traveladvisor_var_logo_marginr) && $traveladvisor_var_logo_marginr != '') || (isset($traveladvisor_var_logo_marginb) && $traveladvisor_var_logo_marginb != '') || (isset($traveladvisor_var_logo_marginl) && $traveladvisor_var_logo_marginl != '')) {
            ?>
            header .logo{
            <?php if (isset($traveladvisor_var_logo_margint) && $traveladvisor_var_logo_margint != '') { ?>
                margin-top:<?php echo traveladvisor_allow_special_char($traveladvisor_var_logo_margint); ?>px;
            <?php } if (isset($traveladvisor_var_logo_marginr) && $traveladvisor_var_logo_marginr != '') { ?>
                margin-right:<?php echo traveladvisor_allow_special_char($traveladvisor_var_logo_marginr); ?>px;
            <?php } if (isset($traveladvisor_var_logo_marginb) && $traveladvisor_var_logo_marginb != '') { ?>
                margin-bottom:<?php echo traveladvisor_allow_special_char($traveladvisor_var_logo_marginb); ?>px;
            <?php }if (isset($traveladvisor_var_logo_marginl) && $traveladvisor_var_logo_marginl != '') { ?>
                margin-left:<?php echo traveladvisor_allow_special_char($traveladvisor_var_logo_marginl); ?>px;
            <?php } ?>

            }
            <?php
        }
        if ((isset($traveladvisor_var_mainmenu_size) && $traveladvisor_var_mainmenu_size != '') || (isset($traveladvisor_var_mainmenu_spc) && $traveladvisor_var_mainmenu_spc != '') || (isset($traveladvisor_var_mainmenu_textr) && $traveladvisor_var_mainmenu_textr != '')) {
            ?>

            #header .main-navigation > ul > li > a, #header .main-navigation > ul > li{
            <?php
            if ($custom_font == true) {
                echo 'font-family: traveladvisor_var_custom_font;';
                if (isset($traveladvisor_var_mainmenu_size) && $traveladvisor_var_mainmenu_size != '') {
                    echo 'font-size: ' . $traveladvisor_var_mainmenu_size . ';';
                }
                if (isset($traveladvisor_var_mainmenu_spc) && $traveladvisor_var_mainmenu_spc != '') {
                    echo esc_html($traveladvisor_var_mainmenu_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_mainmenu_spc . 'px !important;' : '');
                }
                if (isset($traveladvisor_var_mainmenu_textr) && $traveladvisor_var_mainmenu_textr != '') {
                    echo esc_html($traveladvisor_var_mainmenu_textr != '' ? 'text-transform: ' . $traveladvisor_var_mainmenu_textr . ' !important;' : '');
                }
                if (isset($traveladvisor_var_menu_color) && $traveladvisor_var_menu_color != '') {
                    echo esc_html($traveladvisor_var_menu_color != '' ? 'color: ' . $traveladvisor_var_menu_color . '' : '');
                }
            } else {
                echo traveladvisor_var_font_font_print($traveladvisor_var_mainmenu_font_atts, $traveladvisor_var_mainmenu_size, $traveladvisor_var_mainmenu_lh, $traveladvisor_var_mainmenu_font, true);
                if (isset($traveladvisor_var_mainmenu_spc) && $traveladvisor_var_mainmenu_spc != '') {
                    echo esc_html($traveladvisor_var_mainmenu_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_mainmenu_spc . 'px !important;' : '');
                }
                if (isset($traveladvisor_var_mainmenu_textr) && $traveladvisor_var_mainmenu_textr != '') {
                    echo esc_html($traveladvisor_var_mainmenu_textr != '' ? 'text-transform: ' . $traveladvisor_var_mainmenu_textr . ' !important;' : '');
                }
                if (isset($traveladvisor_var_menu_color) && $traveladvisor_var_menu_color != '') {
                    echo esc_html($traveladvisor_var_menu_color != '' ? 'color: ' . $traveladvisor_var_menu_color . '' : '');
                }
            }
            ?>
            }
            <?php
        }
        if (isset($traveladvisor_var_menu_active_color) && $traveladvisor_var_menu_active_color != '') {
            ?>
            .on-ground .navigation ul li.current-menu-item a, .on-ground .navigation ul li.current-menu-parent a, .on-ground .navigation ul li:hover a, #header.on-ground .pinned .cs-search .form-holder .input-holder button:hover, #header.on-ground .pinned .cs-cart a:hover i, #header.on-ground.modern .pinned.unpinned .navigation ul li a:hover{
            <?php
            echo 'color: ' . $traveladvisor_var_menu_active_color . ' !important;';
            ?>
            }
            #header .pinned.unpinned .navigation > ul > li.current-menu-item > a, #header .pinned.unpinned .navigation > ul > li.current_page_item > a{
            <?php
            echo 'color: ' . $traveladvisor_var_menu_active_color . '!important;';
            ?>
            }
            <?php
        }
        if (isset($traveladvisor_var_menu_active_color) && $traveladvisor_var_menu_active_color != '') {
            ?>
            .main-navigation ul li a:hover{
            <?php
            echo 'color: ' . $traveladvisor_var_menu_active_color . ' !important;';
            ?>
            }
            <?php
        }
        if (isset($traveladvisor_var_submenu_color) && $traveladvisor_var_submenu_color != '') {
            ?>
            .main-navigation > ul ul li > a{
            <?php
            echo 'color: ' . $traveladvisor_var_submenu_color . ' !important;';
            ?>
            }
            <?php
        }
        if (isset($traveladvisor_var_submenu_hover_color) && $traveladvisor_var_submenu_hover_color != '') {
            ?>
            .main-navigation > ul ul li > a:hover {
            <?php
            echo 'color: ' . $traveladvisor_var_submenu_hover_color . ' !important;';
            ?>
            }
            <?php
        }


        if ((isset($traveladvisor_var_heading_1_size) && $traveladvisor_var_heading_1_size != '') || (isset($traveladvisor_var_heading_1_spc) && $traveladvisor_var_heading_1_spc != '') || (isset($traveladvisor_var_heading_1_textr) && $traveladvisor_var_heading_1_textr != '') || (isset($traveladvisor_var_heading_h1_color) && $traveladvisor_var_heading_h1_color != '')) {
            ?>
            h1, h1 a{
            <?php
            if ($custom_font == true) {
                echo 'font-family: traveladvisor_var_custom_font;';
                if (isset($traveladvisor_var_heading_1_size) && $traveladvisor_var_heading_1_size != '') {
                    echo 'font-size: ' . $traveladvisor_var_heading_1_size . ';';
                }
                if (isset($traveladvisor_var_heading_1_spc) && $traveladvisor_var_heading_1_spc != '') {
                    echo esc_html($traveladvisor_var_heading_1_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_heading_1_spc . 'px !important;' : '');
                }
                if (isset($traveladvisor_var_heading_1_textr) && $traveladvisor_var_heading_1_textr != '') {
                    echo esc_html($traveladvisor_var_heading_1_textr != '' ? 'text-transform: ' . $traveladvisor_var_heading_1_textr . ' !important;' : '');
                }
                if (isset($traveladvisor_var_heading_h1_color) && $traveladvisor_var_heading_h1_color != '') {
                    echo esc_html($traveladvisor_var_heading_h1_color != '' ? 'color: ' . $traveladvisor_var_heading_h1_color . ' !important;' : '');
                }
            } else {
                echo traveladvisor_var_font_font_print($traveladvisor_var_heading1_font_atts, $traveladvisor_var_heading_1_size, $traveladvisor_var_heading_1_lh, $traveladvisor_var_heading1_font, true);
                if (isset($traveladvisor_var_heading_1_spc) && $traveladvisor_var_heading_1_spc != '') {
                    echo esc_html($traveladvisor_var_heading_1_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_heading_1_spc . 'px !important;' : '');
                }
                if (isset($traveladvisor_var_heading_1_textr) && $traveladvisor_var_heading_1_textr != '') {
                    echo esc_html($traveladvisor_var_heading_1_textr != '' ? 'text-transform: ' . $traveladvisor_var_heading_1_textr . ' !important;' : '');
                }
                if (isset($traveladvisor_var_heading_h1_color) && $traveladvisor_var_heading_h1_color != '') {
                    echo esc_html($traveladvisor_var_heading_h1_color != '' ? 'color: ' . $traveladvisor_var_heading_h1_color . ' !important;' : '');
                }
            }
            ?>}
            <?php
        }
        if ((isset($traveladvisor_var_heading_2_size) && $traveladvisor_var_heading_2_size != '') || (isset($traveladvisor_var_heading_2_spc) && $traveladvisor_var_heading_2_spc != '') || (isset($traveladvisor_var_heading_2_textr) && $traveladvisor_var_heading_2_textr != '') || (isset($traveladvisor_var_heading_h2_color) && $traveladvisor_var_heading_h2_color != '')) {
            ?>
            h2, h2 a{
            <?php
            if ($custom_font == true) {
                echo 'font-family: traveladvisor_var_custom_font;';
                if (isset($traveladvisor_var_heading_2_size) && $traveladvisor_var_heading_2_size != '') {
                    echo 'font-size: ' . $traveladvisor_var_heading_2_size . ';';
                }
                if (isset($traveladvisor_var_heading_2_spc) && $traveladvisor_var_heading_2_spc != '') {
                    echo esc_html($traveladvisor_var_heading_2_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_heading_2_spc . 'px !important;' : '');
                }
                if (isset($traveladvisor_var_heading_2_textr) && $traveladvisor_var_heading_2_textr != '') {
                    echo esc_html($traveladvisor_var_heading_2_textr != '' ? 'text-transform: ' . $traveladvisor_var_heading_2_textr . ' !important;' : '');
                }
                if (isset($traveladvisor_var_heading_h2_color) && $traveladvisor_var_heading_h2_color != '') {
                    echo esc_html($traveladvisor_var_heading_h2_color != '' ? 'color: ' . $traveladvisor_var_heading_h2_color . ' !important;' : '');
                }
            } else {
                echo traveladvisor_var_font_font_print($traveladvisor_var_heading2_font_atts, $traveladvisor_var_heading_2_size, $traveladvisor_var_heading_2_lh, $traveladvisor_var_heading2_font, true);
                if (isset($traveladvisor_var_heading_2_spc) && $traveladvisor_var_heading_2_spc != '') {
                    echo esc_html($traveladvisor_var_heading_2_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_heading_2_spc . 'px !important;' : '');
                }
                if (isset($traveladvisor_var_heading_2_textr) && $traveladvisor_var_heading_2_textr != '') {
                    echo esc_html($traveladvisor_var_heading_2_textr != '' ? 'text-transform: ' . $traveladvisor_var_heading_2_textr . ' !important;' : '');
                }
                if (isset($traveladvisor_var_heading_h2_color) && $traveladvisor_var_heading_h2_color != '') {
                    echo esc_html($traveladvisor_var_heading_h2_color != '' ? 'color: ' . $traveladvisor_var_heading_h2_color . ' !important;' : '');
                }
            }
            ?>
            }
            <?php
        }
        if ((isset($traveladvisor_var_heading_3_size) && $traveladvisor_var_heading_3_size != '') || (isset($traveladvisor_var_heading_3_spc) && $traveladvisor_var_heading_3_spc != '') || (isset($traveladvisor_var_heading_3_textr) && $traveladvisor_var_heading_3_textr != '') || (isset($traveladvisor_var_heading_h3_color) && $traveladvisor_var_heading_h3_color != '')) {
            ?>
            h3, h3 a{ 
            <?php
            if ($custom_font == true) {
                echo 'font-family: traveladvisor_var_custom_font;';
                if (isset($traveladvisor_var_heading_3_size) && $traveladvisor_var_heading_3_size != '') {
                    echo 'font-size: ' . $traveladvisor_var_heading_3_size . ';';
                }
                if (isset($traveladvisor_var_heading_3_spc) && $traveladvisor_var_heading_3_spc != '') {
                    echo esc_html($traveladvisor_var_heading_3_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_heading_3_spc . 'px !important;' : '');
                }
                if (isset($traveladvisor_var_heading_3_textr) && $traveladvisor_var_heading_3_textr != '') {
                    echo esc_html($traveladvisor_var_heading_3_textr != '' ? 'text-transform: ' . $traveladvisor_var_heading_3_textr . ' !important;' : '');
                }
                if (isset($traveladvisor_var_heading_h3_color) && $traveladvisor_var_heading_h3_color != '') {
                    echo esc_html($traveladvisor_var_heading_h3_color != '' ? 'color: ' . $traveladvisor_var_heading_h3_color . ' !important;' : '');
                }
            } else {
                echo traveladvisor_var_font_font_print($traveladvisor_var_heading3_font_atts, $traveladvisor_var_heading_3_size, $traveladvisor_var_heading_3_lh, $traveladvisor_var_heading3_font, true);
                if (isset($traveladvisor_var_heading_3_spc) && $traveladvisor_var_heading_3_spc != '') {
                    echo esc_html($traveladvisor_var_heading_3_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_heading_3_spc . 'px !important;' : '');
                }
                if (isset($traveladvisor_var_heading_3_textr) && $traveladvisor_var_heading_3_textr != '') {
                    echo esc_html($traveladvisor_var_heading_3_textr != '' ? 'text-transform: ' . $traveladvisor_var_heading_3_textr . ' !important;' : '');
                }
                if (isset($traveladvisor_var_heading_h3_color) && $traveladvisor_var_heading_h3_color != '') {
                    echo esc_html($traveladvisor_var_heading_h3_color != '' ? 'color: ' . $traveladvisor_var_heading_h3_color . ' !important;' : '');
                }
            }
            ?>
            }
            <?php
        }
        if ((isset($traveladvisor_var_heading_4_size) && $traveladvisor_var_heading_4_size != '') || (isset($traveladvisor_var_heading_4_spc) && $traveladvisor_var_heading_4_spc != '') || (isset($traveladvisor_var_heading_4_textr) && $traveladvisor_var_heading_4_textr != '') || (isset($traveladvisor_var_heading_h4_color) && $traveladvisor_var_heading_h4_color != '')) {
            ?>
            h4, h4 a{
            <?php
            if ($custom_font == true) {
                echo 'font-family: traveladvisor_var_custom_font;';
                if (isset($traveladvisor_var_heading_4_size) && $traveladvisor_var_heading_4_size != '') {
                    echo 'font-size: ' . $traveladvisor_var_heading_4_size . ';';
                }
                if (isset($traveladvisor_var_heading_4_spc) && $traveladvisor_var_heading_4_spc != '') {
                    echo esc_html($traveladvisor_var_heading_4_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_heading_4_spc . 'px !important;' : '');
                }
                if (isset($traveladvisor_var_heading_4_textr) && $traveladvisor_var_heading_4_textr != '') {
                    echo esc_html($traveladvisor_var_heading_4_textr != '' ? 'text-transform: ' . $traveladvisor_var_heading_4_textr . ' !important;' : '');
                }
                if (isset($traveladvisor_var_heading_h4_color) && $traveladvisor_var_heading_h4_color != '') {
                    echo esc_html($traveladvisor_var_heading_h4_color != '' ? 'color: ' . $traveladvisor_var_heading_h4_color . ' !important;' : '');
                }
            } else {
                echo traveladvisor_var_font_font_print($traveladvisor_var_heading4_font_atts, $traveladvisor_var_heading_4_size, $traveladvisor_var_heading_4_lh, $traveladvisor_var_heading4_font, true);
                if (isset($traveladvisor_var_heading_4_spc) && $traveladvisor_var_heading_4_spc != '') {
                    echo esc_html($traveladvisor_var_heading_4_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_heading_4_spc . 'px !important;' : '');
                }
                if (isset($traveladvisor_var_heading_4_textr) && $traveladvisor_var_heading_4_textr != '') {
                    echo esc_html($traveladvisor_var_heading_4_textr != '' ? 'text-transform: ' . $traveladvisor_var_heading_4_textr . ' !important;' : '');
                }
                if (isset($traveladvisor_var_heading_h4_color) && $traveladvisor_var_heading_h4_color != '') {
                    echo esc_html($traveladvisor_var_heading_h4_color != '' ? 'color: ' . $traveladvisor_var_heading_h4_color . ' !important;' : '');
                }
            }
            ?>
            }
            <?php
        }
        if ((isset($traveladvisor_var_heading_5_size) && $traveladvisor_var_heading_5_size != '') || (isset($traveladvisor_var_heading_5_spc) && $traveladvisor_var_heading_5_spc != '') || (isset($traveladvisor_var_heading_5_textr) && $traveladvisor_var_heading_5_textr != '') || (isset($traveladvisor_var_heading_h5_color) && $traveladvisor_var_heading_h5_color != '')) {
            ?>
            h5, h5 a{
            <?php
            if ($custom_font == true) {
                echo 'font-family: traveladvisor_var_custom_font;';
                if (isset($traveladvisor_var_heading_5_size) && $traveladvisor_var_heading_5_size != '') {
                    echo 'font-size: ' . $traveladvisor_var_heading_5_size . ';';
                }
                if (isset($traveladvisor_var_heading_5_spc) && $traveladvisor_var_heading_5_spc != '') {
                    echo esc_html($traveladvisor_var_heading_5_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_heading_5_spc . 'px !important;' : '');
                }
                if (isset($traveladvisor_var_heading_5_textr) && $traveladvisor_var_heading_5_textr != '') {
                    echo esc_html($traveladvisor_var_heading_5_textr != '' ? 'text-transform: ' . $traveladvisor_var_heading_5_textr . ' !important;' : '');
                }
                if (isset($traveladvisor_var_heading_h5_color) && $traveladvisor_var_heading_h5_color != '') {
                    echo esc_html($traveladvisor_var_heading_h5_color != '' ? 'color: ' . $traveladvisor_var_heading_h5_color . ' !important;' : '');
                }
            } else {
                echo traveladvisor_var_font_font_print($traveladvisor_var_heading5_font_atts, $traveladvisor_var_heading_5_size, $traveladvisor_var_heading_5_lh, $traveladvisor_var_heading5_font, true);
                if (isset($traveladvisor_var_heading_5_spc) && $traveladvisor_var_heading_5_spc != '') {
                    echo esc_html($traveladvisor_var_heading_5_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_heading_5_spc . 'px !important;' : '');
                }
                if (isset($traveladvisor_var_heading_5_textr) && $traveladvisor_var_heading_5_textr != '') {
                    echo esc_html($traveladvisor_var_heading_5_textr != '' ? 'text-transform: ' . $traveladvisor_var_heading_5_textr . ' !important;' : '');
                }
                if (isset($traveladvisor_var_heading_h5_color) && $traveladvisor_var_heading_h5_color != '') {
                    echo esc_html($traveladvisor_var_heading_h5_color != '' ? 'color: ' . $traveladvisor_var_heading_h5_color . ' !important;' : '');
                }
            }
            ?>
            }
            <?php
        }
        if ((isset($traveladvisor_var_heading_6_size) && $traveladvisor_var_heading_6_size != '') || (isset($traveladvisor_var_heading_6_spc) && $traveladvisor_var_heading_6_spc != '') || (isset($traveladvisor_var_heading_6_textr) && $traveladvisor_var_heading_6_textr != '') || (isset($traveladvisor_var_heading_h6_color) && $traveladvisor_var_heading_h6_color != '')) {
            ?>
            h6, h6 a{
            <?php
            if ($custom_font == true) {
                echo 'font-family: traveladvisor_var_custom_font;';
                if (isset($traveladvisor_var_heading_6_size) && $traveladvisor_var_heading_6_size != '') {
                    echo 'font-size: ' . $traveladvisor_var_heading_6_size . ';';
                }
                if (isset($traveladvisor_var_heading_6_spc) && $traveladvisor_var_heading_6_spc != '') {
                    echo esc_html($traveladvisor_var_heading_6_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_heading_6_spc . 'px !important;' : '');
                }
                if (isset($traveladvisor_var_heading_6_textr) && $traveladvisor_var_heading_6_textr != '') {
                    echo esc_html($traveladvisor_var_heading_6_textr != '' ? 'text-transform: ' . $traveladvisor_var_heading_6_textr . ' !important;' : '');
                }
                if (isset($traveladvisor_var_heading_h6_color) && $traveladvisor_var_heading_h6_color != '') {
                    echo esc_html($traveladvisor_var_heading_h6_color != '' ? 'color: ' . $traveladvisor_var_heading_h6_color . ' !important;' : '');
                }
            } else {
                echo traveladvisor_var_font_font_print($traveladvisor_var_heading6_font_atts, $traveladvisor_var_heading_6_size, $traveladvisor_var_heading_6_lh, $traveladvisor_var_heading6_font, true);
                if (isset($traveladvisor_var_heading_6_spc) && $traveladvisor_var_heading_6_spc != '') {
                    echo esc_html($traveladvisor_var_heading_6_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_heading_6_spc . 'px !important;' : '');
                }
                if (isset($traveladvisor_var_heading_6_textr) && $traveladvisor_var_heading_6_textr != '') {
                    echo esc_html($traveladvisor_var_heading_6_textr != '' ? 'text-transform: ' . $traveladvisor_var_heading_6_textr . ' !important;' : '');
                }
                if (isset($traveladvisor_var_heading_h6_color) && $traveladvisor_var_heading_h6_color != '') {
                    echo esc_html($traveladvisor_var_heading_h6_color != '' ? 'color: ' . $traveladvisor_var_heading_h6_color . ' !important;' : '');
                }
            }
            ?>
            }
            <?php
        }
        if ((isset($traveladvisor_var_section_title_size) && $traveladvisor_var_section_title_size != '') || (isset($traveladvisor_var_section_title_spc) && $traveladvisor_var_section_title_spc != '') || (isset($traveladvisor_var_section_title_textr) && $traveladvisor_var_section_title_textr != '') || (isset($traveladvisor_var_section_title_color) && $traveladvisor_var_section_title_color != '')) {
            ?>       
            .cs-section-title h2{
            <?php
            if ($custom_font == true) {
                echo 'font-family: traveladvisor_var_custom_font;';
                if (isset($traveladvisor_var_section_title_size) && $traveladvisor_var_section_title_size != '') {
                    echo 'font-size: ' . $traveladvisor_var_section_title_size . ';';
                }
                if (isset($traveladvisor_var_section_title_spc) && $traveladvisor_var_section_title_spc != '') {
                    echo esc_html($traveladvisor_var_section_title_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_section_title_spc . 'px !important;' : '');
                }
                if (isset($traveladvisor_var_section_title_textr) && $traveladvisor_var_section_title_textr != '') {
                    echo esc_html($traveladvisor_var_section_title_textr != '' ? 'text-transform: ' . $traveladvisor_var_section_title_textr . ' !important;' : '');
                }
                if (isset($traveladvisor_var_section_title_color) && $traveladvisor_var_section_title_color != '') {
                    echo esc_html($traveladvisor_var_section_title_color != '' ? 'color: ' . $traveladvisor_var_section_title_color . ' !important;' : '');
                }
            } else {

                echo traveladvisor_var_font_font_print($traveladvisor_var_section_title_font_atts, $traveladvisor_var_section_title_size, $traveladvisor_var_section_title_lh, $traveladvisor_var_section_title_font, true);
                if (isset($traveladvisor_var_section_title_spc) && $traveladvisor_var_section_title_spc != '') {
                    echo esc_html($traveladvisor_var_section_title_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_section_title_spc . 'px !important;' : '');
                }
                if (isset($traveladvisor_var_section_title_textr) && $traveladvisor_var_section_title_textr != '') {
                    echo esc_html($traveladvisor_var_section_title_textr != '' ? 'text-transform: ' . $traveladvisor_var_section_title_textr . ' !important;' : '');
                }
                if (isset($traveladvisor_var_section_title_color) && $traveladvisor_var_section_title_color != '') {
                    echo esc_html($traveladvisor_var_section_title_color != '' ? 'color: ' . $traveladvisor_var_section_title_color . ' !important;' : '');
                }
            }
            ?>
            }
            <?php
        }

        if ((isset($traveladvisor_var_post_title_size) && $traveladvisor_var_post_title_size != '') || (isset($traveladvisor_var_post_title_spc) && $traveladvisor_var_post_title_spc != '') || (isset($traveladvisor_var_post_title_textr) && $traveladvisor_var_post_title_textr != '') || (isset($traveladvisor_var_post_title_color) && $traveladvisor_var_post_title_color != '')) {
            ?>
            .post-title h3 a , .cs-blog .post-title h3 , .cs-blog .post-title h4 a , .blog-fancy-detail h3 a , .cs-heading-section .cs-post-title h3 a{
            <?php
            if ($custom_font == true) {
                echo 'font-family: traveladvisor_var_custom_font;';

                if (isset($traveladvisor_var_post_title_size) && $traveladvisor_var_post_title_size != '') {
                    echo 'font-size: ' . $traveladvisor_var_post_title_size . ';';
                }
                if (isset($traveladvisor_var_post_title_spc) && $traveladvisor_var_post_title_spc != '') {
                    echo esc_html($traveladvisor_var_post_title_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_post_title_spc . 'px !important;' : '');
                }
                if (isset($traveladvisor_var_post_title_textr) && $traveladvisor_var_post_title_textr != '') {
                    echo esc_html($traveladvisor_var_post_title_textr != '' ? 'text-transform: ' . $traveladvisor_var_post_title_textr . ' !important;' : '');
                }
                if (isset($traveladvisor_var_post_title_color) && $traveladvisor_var_post_title_color != '') {
                    echo esc_html($traveladvisor_var_post_title_color != '' ? 'color: ' . $traveladvisor_var_post_title_color . ' !important;' : '');
                }
            } else {
                echo traveladvisor_var_font_font_print($traveladvisor_var_post_title_font_atts, $traveladvisor_var_post_title_size, $traveladvisor_var_post_title_lh, $traveladvisor_var_post_title_font, true);
                if (isset($traveladvisor_var_post_title_spc) && $traveladvisor_var_post_title_spc != '') {
                    echo esc_html($traveladvisor_var_post_title_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_post_title_spc . 'px !important;' : '');
                }
                if (isset($traveladvisor_var_post_title_textr) && $traveladvisor_var_post_title_textr != '') {
                    echo esc_html($traveladvisor_var_post_title_textr != '' ? 'text-transform: ' . $traveladvisor_var_post_title_textr . ' !important;' : '');
                }
                if (isset($traveladvisor_var_post_title_color) && $traveladvisor_var_post_title_color != '') {
                    echo esc_html($traveladvisor_var_post_title_color != '' ? 'color: ' . $traveladvisor_var_post_title_color . ' !important;' : '');
                }
            }
            ?>
            }
            <?php
        }
        if ((isset($traveladvisor_var_page_title_size) && $traveladvisor_var_page_title_size != '') || (isset($traveladvisor_var_page_title_spc) && $traveladvisor_var_page_title_spc != '') || (isset($traveladvisor_var_page_title_textr) && $traveladvisor_var_page_title_textr != '')) {
            ?>
            .cs-page-title h2{
            <?php
            if ($custom_font == true) {
                echo 'font-family: traveladvisor_var_custom_font;';
                if (isset($traveladvisor_var_page_title_size) && $traveladvisor_var_page_title_size != '') {
                    echo 'font-size: ' . $traveladvisor_var_page_title_size . ';';
                }
                if (isset($traveladvisor_var_page_title_spc) && $traveladvisor_var_page_title_spc != '') {
                    echo esc_html($traveladvisor_var_page_title_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_page_title_spc . 'px !important;' : '');
                }
                if (isset($traveladvisor_var_page_title_textr) && $traveladvisor_var_page_title_textr != '') {
                    echo esc_html($traveladvisor_var_page_title_textr != '' ? 'text-transform: ' . $traveladvisor_var_page_title_textr . ' !important;' : '');
                }
                if (isset($traveladvisor_var_page_title_color) && $traveladvisor_var_page_title_color != '') {
                    echo esc_html($traveladvisor_var_page_title_color != '' ? 'color: ' . $traveladvisor_var_page_title_color . ' !important;' : '');
                }
            } else {

                echo traveladvisor_var_font_font_print($traveladvisor_var_page_title_font_atts, $traveladvisor_var_page_title_size, $traveladvisor_var_page_title_lh, $traveladvisor_var_page_title_font, true);
                if (isset($traveladvisor_var_page_title_spc) && $traveladvisor_var_page_title_spc != '') {
                    echo esc_html($traveladvisor_var_page_title_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_page_title_spc . 'px !important;' : '');
                }
                if (isset($traveladvisor_var_page_title_textr) && $traveladvisor_var_page_title_textr != '') {
                    echo esc_html($traveladvisor_var_page_title_textr != '' ? 'text-transform: ' . $traveladvisor_var_page_title_textr . ' !important;' : '');
                }
                if (isset($traveladvisor_var_page_title_color) && $traveladvisor_var_page_title_color != '') {
                    echo esc_html($traveladvisor_var_page_title_color != '' ? 'color: ' . $traveladvisor_var_page_title_color . ' !important;' : '');
                }
            }
            ?>
            }
            <?php
        }


        if ((isset($traveladvisor_var_widget_heading_size) && $traveladvisor_var_widget_heading_size != '') || (isset($traveladvisor_var_widget_heading_spc) && $traveladvisor_var_widget_heading_spc != '') || (isset($traveladvisor_var_widget_title_color) && $traveladvisor_var_widget_title_color != '')) {
            ?>
            .widget .twitter-widget .widget .widget-title h5 , .widget .widget-title h4{
            <?php
            if ($custom_font == true) {
                echo 'font-family: traveladvisor_var_custom_font;';
                if (isset($traveladvisor_var_widget_heading_size) && $traveladvisor_var_widget_heading_size != '') {
                    echo 'font-size: ' . $traveladvisor_var_widget_heading_size . ';';
                }
                if (isset($traveladvisor_var_widget_heading_spc) && $traveladvisor_var_widget_heading_spc != '') {
                    echo esc_html($traveladvisor_var_widget_heading_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_widget_heading_spc . 'px !important;' : '');
                }
                if (isset($traveladvisor_var_widget_heading_textr) && $traveladvisor_var_widget_heading_textr != '') {
                    echo esc_html($traveladvisor_var_widget_heading_textr != '' ? 'text-transform: ' . $traveladvisor_var_widget_heading_textr . ' !important;' : '');
                }
                if (isset($traveladvisor_var_widget_title_color) && $traveladvisor_var_widget_title_color != '') {
                    echo esc_html($traveladvisor_var_widget_title_color != '' ? 'color: ' . $traveladvisor_var_widget_title_color . ' !important;' : '');
                }
            } else {
                echo traveladvisor_var_font_font_print($traveladvisor_var_widget_heading_font_atts, $traveladvisor_var_widget_heading_size, $traveladvisor_var_widget_heading_lh, $traveladvisor_var_widget_heading_font, true);
                if (isset($traveladvisor_var_widget_heading_spc) && $traveladvisor_var_widget_heading_spc != '') {
                    echo esc_html($traveladvisor_var_widget_heading_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_widget_heading_spc . 'px !important;' : '');
                }
                if (isset($traveladvisor_var_widget_heading_textr) && $traveladvisor_var_widget_heading_textr != '') {
                    echo esc_html($traveladvisor_var_widget_heading_textr != '' ? 'text-transform: ' . $traveladvisor_var_widget_heading_textr . ' !important;' : '');
                }
                if (isset($traveladvisor_var_widget_title_color) && $traveladvisor_var_widget_title_color != '') {
                    echo esc_html($traveladvisor_var_widget_title_color != '' ? 'color: ' . $traveladvisor_var_widget_title_color . ' !important;' : '');
                }
            }
            ?>
            }
            <?php
        }

        if (isset($traveladvisor_var_ft_widget_title_color) && $traveladvisor_var_ft_widget_title_color <> "") {
            ?>
            #footer .widget-title h5{ <?php echo esc_html($traveladvisor_var_ft_widget_title_color != '' ? 'color: ' . $traveladvisor_var_ft_widget_title_color . ' !important;' : ''); ?>}

            <?php
        }
        if ((isset($traveladvisor_var_ft_widget_heading_size) && $traveladvisor_var_ft_widget_heading_size != '') || (isset($traveladvisor_var_ft_widget_heading_spc) && $traveladvisor_var_ft_widget_heading_spc != '') || (isset($traveladvisor_var_ft_widget_heading_textr) && $traveladvisor_var_ft_widget_heading_textr != '') || (isset($traveladvisor_var_ft_widget_title_color) && $traveladvisor_var_ft_widget_title_color != '')) {
            ?> 
            #footer .widget-title h5{
            <?php
            if ($custom_font == true) {
                echo 'font-family: traveladvisor_var_custom_font;';
                if (isset($traveladvisor_var_ft_widget_heading_size) && $traveladvisor_var_ft_widget_heading_size != '') {
                    echo 'font-size: ' . $traveladvisor_var_ft_widget_heading_size . ';';
                }
                if (isset($traveladvisor_var_ft_widget_heading_spc) && $traveladvisor_var_ft_widget_heading_spc != '') {
                    echo esc_html($traveladvisor_var_ft_widget_heading_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_ft_widget_heading_spc . 'px !important;' : '');
                }
                if (isset($traveladvisor_var_ft_widget_heading_textr) && $traveladvisor_var_ft_widget_heading_textr != '') {
                    echo esc_html($traveladvisor_var_ft_widget_heading_textr != '' ? 'text-transform: ' . $traveladvisor_var_ft_widget_heading_textr . ' !important;' : '');
                }
                if (isset($traveladvisor_var_ft_widget_title_color) && $traveladvisor_var_ft_widget_title_color != '') {
                    echo esc_html($traveladvisor_var_ft_widget_title_color != '' ? 'color: ' . $traveladvisor_var_ft_widget_title_color . ' !important;' : '');
                }
            } else {
                echo traveladvisor_var_font_font_print($traveladvisor_var_ft_widget_heading_font_atts, $traveladvisor_var_ft_widget_heading_size, $traveladvisor_var_ft_widget_heading_lh, $traveladvisor_var_ft_widget_heading_font, true);
                if (isset($traveladvisor_var_ft_widget_heading_spc) && $traveladvisor_var_ft_widget_heading_spc != '') {
                    echo esc_html($traveladvisor_var_ft_widget_heading_spc != '' ? 'letter-spacing: ' . $traveladvisor_var_ft_widget_heading_spc . 'px !important;' : '');
                }
                if (isset($traveladvisor_var_ft_widget_heading_textr) && $traveladvisor_var_ft_widget_heading_textr != '') {
                    echo esc_html($traveladvisor_var_ft_widget_heading_textr != '' ? 'text-transform: ' . $traveladvisor_var_ft_widget_heading_textr . ' !important;' : '');
                }
                if (isset($traveladvisor_var_ft_widget_title_color) && $traveladvisor_var_ft_widget_title_color != '') {
                    echo esc_html($traveladvisor_var_ft_widget_title_color != '' ? 'color: ' . $traveladvisor_var_ft_widget_title_color . ' !important;' : '');
                }
            }
            ?>
            }
            <?php
        }

        if (isset($traveladvisor_var_menu_heading_color) && $traveladvisor_var_menu_heading_color != '') {
            ?>
            .dropdown-menu h6 a{color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_menu_heading_color); ?> !important;}
            <?php
        }
        if (isset($traveladvisor_var_topstrip_bgcolor) && $traveladvisor_var_topstrip_bgcolor != '') {
            ?>
            .top-bar, #lang_sel ul li ul {background-color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_topstrip_bgcolor); ?> !important;}
            <?php
        }
        if (isset($traveladvisor_var_topstrip_bgcolor) && $traveladvisor_var_topstrip_bgcolor != '') {
            ?>
            #lang_sel ul ul:before { border-bottom-color: <?php echo traveladvisor_allow_special_char($traveladvisor_var_topstrip_bgcolor); ?>; }
            <?php
        }
        if (isset($traveladvisor_var_topstrip_text_color) && $traveladvisor_var_topstrip_text_color != '') {
            ?>
            .top-bar p{color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_topstrip_text_color); ?> !important;}
            <?php
        }
        if (isset($traveladvisor_var_topstrip_link_color) && $traveladvisor_var_topstrip_link_color != '') {
            ?>
            .top-bar a,.top-bar i{color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_topstrip_link_color); ?> !important;}
            <?php
        }
        if (isset($traveladvisor_var_header_bgcolor) && $traveladvisor_var_header_bgcolor != '') {
            ?>
            .box-shadow-kit,#header{ background-color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_header_bgcolor); ?> !important;}
            <?php
        }

        if (isset($traveladvisor_var_submenu_bgcolor) && $traveladvisor_var_submenu_bgcolor != '') {
            $traveladvisor_var_submenu_bgcolor_rgba = traveladvisor_var_hex2rgb($traveladvisor_var_submenu_bgcolor, '0.8');
            ?>
            .main-navigation ul ul li { background-color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_submenu_bgcolor_rgba); ?> !important;}

            <?php
        }
        if (isset($traveladvisor_var_submenu_color) && $traveladvisor_var_submenu_color != '') {
            ?>
            .main-navigation > ul ul li > a{color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_submenu_color); ?> !important;}
            <?php
        }
        if (isset($traveladvisor_var_submenu_hover_color) && $traveladvisor_var_submenu_hover_color != '') {
            ?>
            .on-ground .navigation ul li.current-menu-parent ul.sub-dropdown li.current-menu-item a,
            .on-ground .navigation ul li.current-menu-parent ul.sub-dropdown li:hover a {color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_submenu_hover_color); ?> !important;}
            <?php
        }
        if (isset($traveladvisor_var_modern_menu_color) && $traveladvisor_var_modern_menu_color != '') {
            ?>
            #header.on-ground.modern .pinned .cs-search .form-holder .input-holder button, #header.on-ground.modern .pinned .cs-cart a i, .on-ground.modern .navigation ul li a, .on-ground.modern .pinned .navigation > ul > li::after{ color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_modern_menu_color); ?> !important;}
            #header.on-ground.modern .pinned .cs-cart a span {background:none !important; border-color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_modern_menu_color); ?> !important; color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_modern_menu_color); ?> !important;}
            <?php
        }
        if (isset($traveladvisor_var_modern_menu_active_color) && $traveladvisor_var_modern_menu_active_color != '') {
            ?>
            .on-ground.modern .navigation ul li.current-menu-item a, .on-ground.modern .navigation ul li.current-menu-parent a, .on-ground.modern .navigation ul li:hover a, #header.on-ground.modern .pinned .cs-search .form-holder .input-holder button:hover, #header.on-ground.modern .pinned .cs-cart a:hover i{
            <?php
            echo 'color: ' . $traveladvisor_var_modern_menu_active_color . ' !important;';
            ?>
            }
            <?php
        }

        if (isset($traveladvisor_var_menu_color) && $traveladvisor_var_menu_color != '') {
            ?>

            .main-navigation > ul > li > a, .mm-toggle i, .cs-search-area .search-area a i, .cs-cart a i, .main-navigation ul li.menu-item-has-children:after {color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_menu_color); ?> !important;}
            <?php
        }
        if (isset($traveladvisor_var_menu_active_color) && $traveladvisor_var_menu_active_color != '') {
            ?>
            .cs-user,.cs-user-login { border-color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_menu_active_color); ?> !important; }
            <?php
        }
        if (isset($traveladvisor_var_widget_title_color) && $traveladvisor_var_widget_title_color != '') {
            ?>
            .page-sidebar .widget-title h3, .page-sidebar .widget-title h4, .page-sidebar .widget-title h5, .page-sidebar .widget-title h6{
            color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_widget_title_color); ?> !important;
            }<?php
        }
        if (isset($traveladvisor_var_widget_title_color) && $traveladvisor_var_widget_title_color != '') {
            ?>
            .section-sidebar .widget-title h3, .section-sidebar .widget-title h4, .section-sidebar .widget-title h5, .section-sidebar .widget-title h6{
            color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_widget_title_color); ?> !important;
            }
        <?php } ?>

        /**
        * @Set top strip colors
        *
        */
        <?php if (isset($traveladvisor_var_topstr_bg_color) && $traveladvisor_var_topstr_bg_color != '') { ?>
            #header .top-bar {
            background-color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_topstr_bg_color); ?> !important;
            }
            <?php
        }
        if (isset($traveladvisor_var_topstr_text_color) && $traveladvisor_var_topstr_text_color != '') {
            ?>
            #header .top-bar {
            color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_topstr_text_color); ?> !important;
            }
            <?php
        }
        if (isset($traveladvisor_var_topstr_link_color) && $traveladvisor_var_topstr_link_color != '') {
            ?>
            #header .top-bar a {
            color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_topstr_link_color); ?> !important;
            }
            <?php
        }
        if (isset($traveladvisor_var_topstr_linkhover_color) && $traveladvisor_var_topstr_linkhover_color != '') {
            ?>
            #header .top-bar a:hover {
            color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_topstr_linkhover_color); ?> !important;
            }
            <?php
        }
        if (isset($traveladvisor_var_topstr_iconhover_color) && $traveladvisor_var_topstr_iconhover_color != '') {
            ?>
            #header .top-bar .social-media a:hover i {
            color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_topstr_iconhover_color); ?> !important;
            }
        <?php }if (isset($traveladvisor_var_topstr_icon_color) && $traveladvisor_var_topstr_icon_color != '') { ?>
            #header .top-bar .social-media a i {
            color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_topstr_icon_color); ?> !important;
            }
            <?php
        }
        /**
         * @Set Footer colors
         *
         *
         */
        $traveladvisor_var_footerbg_color = (isset($traveladvisor_var_options['traveladvisor_var_footerbg_color']) and $traveladvisor_var_options['traveladvisor_var_footerbg_color'] <> '') ? $traveladvisor_var_options['traveladvisor_var_footerbg_color'] : '';


        $traveladvisor_var_footerbg_image = (isset($traveladvisor_var_options['traveladvisor_var_footer_background_image']) and $traveladvisor_var_options['traveladvisor_var_footer_background_image'] <> '') ? $traveladvisor_var_options['traveladvisor_var_footer_background_image'] : '';

        $traveladvisor_var_footer_text_color = (isset($traveladvisor_var_options['traveladvisor_var_footer_text_color']) and $traveladvisor_var_options['traveladvisor_var_footer_text_color'] <> '') ? $traveladvisor_var_options['traveladvisor_var_footer_text_color'] : '';
        $traveladvisor_var_link_color = (isset($traveladvisor_var_options['traveladvisor_var_link_color']) and $traveladvisor_var_options['traveladvisor_var_link_color'] <> '') ? $traveladvisor_var_options['traveladvisor_var_link_color'] : '';
        $traveladvisor_var_sub_footerbg_color = (isset($traveladvisor_var_options['traveladvisor_var_sub_footerbg_color']) and $traveladvisor_var_options['traveladvisor_var_sub_footerbg_color'] <> '') ? $traveladvisor_var_options['traveladvisor_var_sub_footerbg_color'] : '';

        $traveladvisor_var_copyright_text_color = (isset($traveladvisor_var_options['traveladvisor_var_copyright_text_color']) and $traveladvisor_var_options['traveladvisor_var_copyright_text_color'] <> '') ? $traveladvisor_var_options['traveladvisor_var_copyright_text_color'] : '';

        $traveladvisor_var_copyright_bg_color = (isset($traveladvisor_var_options['traveladvisor_var_copyright_bg_color']) and $traveladvisor_var_options['traveladvisor_var_copyright_bg_color'] <> '') ? $traveladvisor_var_options['traveladvisor_var_copyright_bg_color'] : '';

        if (isset($traveladvisor_var_sub_footerbg_color) && $traveladvisor_var_sub_footerbg_color != '') {
            ?>
            footer#footer-sec, footer.group:before { background-color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_sub_footerbg_color); ?> !important; }
            <?php
        }
        if (isset($traveladvisor_var_footer_text_color) && $traveladvisor_var_footer_text_color != '') {
            ?>
            footer#footer p, footer#footer span, footer#footer .textwidget {color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_footer_text_color); ?> !important;}
            <?php
        }
        if (isset($traveladvisor_var_footerbg_color) && $traveladvisor_var_footerbg_color != '') {
            ?>
            #footer{
            background-color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_footerbg_color); ?> !important;
            }
            <?php
        }
        if (isset($traveladvisor_var_footerbg_image) && $traveladvisor_var_footerbg_image != '') {
            ?>
            #footer-sec {
            background:url("<?php echo traveladvisor_allow_special_char($traveladvisor_var_footerbg_image); ?>") <?php echo traveladvisor_allow_special_char($traveladvisor_var_footerbg_color); ?> no-repeat bottom center !important;
            }
            <?php
        }
        if (isset($traveladvisor_var_copyright_text_color) && $traveladvisor_var_copyright_text_color != '') {
            ?>
            #copyright p, #copyright p a{color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_copyright_text_color); ?> !important;}
            <?php
        }
        if (isset($traveladvisor_var_copyright_bg_color) && $traveladvisor_var_copyright_bg_color != '') {
            ?>.footer-btm {background-color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_copyright_bg_color); ?> !important;}
            <?php
        }
        if (isset($traveladvisor_var_copyright_text_color) && $traveladvisor_var_copyright_text_color != '') {
            ?>
            .footer-content  .copyrights{
            color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_copyright_text_color); ?> !important;
            }
        <?php }if (isset($traveladvisor_var_link_color) && $traveladvisor_var_link_color != '') { ?>
            footer#footer a,.cs-footer-widgets ul li a:before  {
            color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_link_color); ?> !important;
            }<?php
        }


        if (isset($traveladvisor_var_copyright_text_color) && $traveladvisor_var_copyright_text_color != '') {
            ?>
            #footer .cs-copyright .copyright-text p, footer#footer .footer-links a.footer#footer .footer-links {color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_copyright_text_color); ?> !important;}
            <?php
        }
        ?>

        <?php
        $traveladvisor_var_custom_themeoption_str = ob_get_clean();
        return $traveladvisor_var_custom_themeoption_str;
    }

}
?>