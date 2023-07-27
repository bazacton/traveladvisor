<?php
/**
 * The template for 
 * displaying shop page
 */
get_header();
$var_arrays = array('post', 'traveladvisor_node', 'traveladvisor_sidebarLayout', 'column_class', 'traveladvisor_xmlObject', 'traveladvisor_node_id', 'column_attributes', 'traveladvisor_elem_id');
$page_global_vars = TRAVELADVISOR_VAR_GLOBALS()->globalizing($var_arrays);
extract($page_global_vars);

if (is_shop()) {

    $traveladvisor_shop_id = wc_get_page_id('shop');

    $traveladvisor_page_bulider = get_post_meta($traveladvisor_shop_id, "traveladvisor_page_builder", true);

    $traveladvisor_xmlObject = new stdClass();
    if (isset($traveladvisor_page_bulider) && $traveladvisor_page_bulider <> '') {
        $traveladvisor_xmlObject = new SimpleXMLElement($traveladvisor_page_bulider);
    }
    ?>
    <!-- Main Content Section -->
    <div class="main-section">
        <?php
        $traveladvisor_page_sidebar_right = '';
        $traveladvisor_page_sidebar_left = '';
        $traveladvisor_postObject = get_post_meta($traveladvisor_shop_id, 'traveladvisor_var_full_data', true);
        $traveladvisor_page_layout = get_post_meta($traveladvisor_shop_id, 'traveladvisor_var_page_layout', true);
        $traveladvisor_page_sidebar_right = get_post_meta($traveladvisor_shop_id, 'traveladvisor_var_page_sidebar_right', true);
        $traveladvisor_page_sidebar_left = get_post_meta($traveladvisor_shop_id, 'traveladvisor_var_page_sidebar_left', true);
        $traveladvisor_page_bulider = get_post_meta($traveladvisor_shop_id, "traveladvisor_page_builder", true);
        $section_container_width = '';
        $page_element_size = 'page-content-fullwidth';

        if (!isset($traveladvisor_page_layout) || $traveladvisor_page_layout == "none") {
            $page_element_size = 'page-content-fullwidth';
        } else {
            $page_element_size = 'page-content col-lg-9 col-md-9 col-sm-12 col-xs-12';
        }
        $traveladvisor_xmlObject = new stdClass();

        if (isset($traveladvisor_page_bulider) && $traveladvisor_page_bulider <> '') {
            $traveladvisor_xmlObject = new SimpleXMLElement($traveladvisor_page_bulider);
        }
        if (isset($traveladvisor_page_layout)) {
            $traveladvisor_sidebarLayout = $traveladvisor_page_layout;
        }
        $pageSidebar = false;
        if ($traveladvisor_sidebarLayout == 'left' || $traveladvisor_sidebarLayout == 'right') {
            $pageSidebar = true;
        }
        if (!empty($traveladvisor_xmlObject) && is_array($traveladvisor_xmlObject) && count($traveladvisor_xmlObject) > 1) {
            if (isset($traveladvisor_page_layout)) {
                $traveladvisor_page_sidebar_right = $traveladvisor_page_sidebar_right;
                $traveladvisor_page_sidebar_left = $traveladvisor_page_sidebar_left;
            }
            $traveladvisor_counter_node = $column_no = 0;
            $fullwith_style = '';
            $section_container_style_elements = ' ';
            if (isset($traveladvisor_page_layout) && $traveladvisor_sidebarLayout <> '' and $traveladvisor_sidebarLayout <> "none") {

                $fullwith_style = 'style="width:100%;"';
                $section_container_style_elements = ' width: 100%;';
                echo '<div class="container">';
                echo '<div class="row">';


                if (isset($traveladvisor_page_layout) && $traveladvisor_sidebarLayout <> '' and $traveladvisor_sidebarLayout <> "none" and $traveladvisor_sidebarLayout == 'left') :
                    if (is_active_sidebar(traveladvisor_get_sidebar_id($traveladvisor_page_sidebar_left))) {
                        ?>
                        <aside class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($traveladvisor_page_sidebar_left)) : endif; ?>
                        </aside>
                        <?php
                    }
                endif;
                echo '<div class="' . ($page_element_size) . '">';
            }

            if (post_password_required()) {
                echo '<header class="heading"><h6 class="transform">' . get_the_title($traveladvisor_shop_id) . '</h6></header>';
                echo traveladvisor_password_form();
            } else {
                $width = 840;
                $height = 328;
                $traveladvisor_post_thumbnail_id = get_post_thumbnail_id($traveladvisor_shop_id);
                $image_url = traveladvisor_attachment_image_src($traveladvisor_post_thumbnail_id, $width, $height);
                wp_reset_postdata();

                if ($pageSidebar != true) {
                    ?>
                    <div class="page-section">
                        <div class="container">
                            <div class="row">
                                <?php
                            }
                            if (isset($image_url) && $image_url != '') {
                                ?>
                                <a href="<?php echo esc_url($image_url); ?>" data-rel="prettyPhoto" data-title="prettyPhoto">
                                    <figure>
                                        <div class="page-featured-image">
                                            <img class="img-thumbnail cs-page-thumbnail" title="prettyPhoto" alt="thumbnail" data-src="" src="<?php echo esc_url($image_url); ?>">
                                        </div>
                                    </figure>
                                </a>
                                <?php
                            }
                            $content_post = get_post($traveladvisor_shop_id);
                            if (is_object($content_post)) {
                                $content = $content_post->post_content;
                              
                                if (trim($content) <> '') {
                                    echo '<div class="cs-shop-wrap"><div class="cs-rich-editor">';
                                    $content = apply_filters('the_content', $content);
                                    $content = str_replace(']]>', ']]&gt;', $content);
                                    echo do_shortcode($content);
                                    echo '</div></div>';
                                }
                            }
                            if ($pageSidebar != true) {
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                get_template_part('woocommerce/products-loop', 'page');
            }

            if (isset($traveladvisor_xmlObject->column_container)) {
                $traveladvisor_elem_id = 0;
            }
            foreach ($traveladvisor_xmlObject->column_container as $column_container) {

                $traveladvisor_section_bg_image = $traveladvisor_var_section_title = $traveladvisor_var_section_subtitle = $traveladvisor_section_bg_image_position = $traveladvisor_section_bg_image_repeat = $traveladvisor_section_bg_color = $traveladvisor_section_padding_top = $traveladvisor_section_padding_bottom = $traveladvisor_section_custom_style = $traveladvisor_section_css_id = $traveladvisor_layout = $traveladvisor_sidebar_left = $traveladvisor_sidebar_right = $css_bg_image = '';
                $section_style_elements = '';
                $section_container_style_elements = '';
                $section_video_element = '';
                $traveladvisor_section_bg_color = '';
                $traveladvisor_section_view = 'container';
                if (isset($column_container)) {

                    $column_attributes = $column_container->attributes();
                    $column_class = $column_attributes->class;
                    $parallax_class = '';
                    $parallax_data_type = '';
                    $traveladvisor_section_parallax = $column_attributes->traveladvisor_section_parallax;
                    if (isset($traveladvisor_section_parallax) && (string) $traveladvisor_section_parallax == 'yes') {

                        $parallax_class = ($traveladvisor_section_parallax == 'yes') ? 'parallex-bg' : '';
                        $parallax_data_type = ' data-type="background"';
                    }
                    $traveladvisor_var_section_title = $column_attributes->traveladvisor_var_section_title;
                    $traveladvisor_var_section_subtitle = $column_attributes->traveladvisor_var_section_subtitle;
                    $traveladvisor_section_margin_top = $column_attributes->traveladvisor_section_margin_top;
                    $traveladvisor_section_margin_bottom = $column_attributes->traveladvisor_section_margin_bottom;
                    $traveladvisor_section_padding_top = $column_attributes->traveladvisor_section_padding_top;
                    $traveladvisor_section_padding_bottom = $column_attributes->traveladvisor_section_padding_bottom;
                    $traveladvisor_section_view = $column_attributes->traveladvisor_section_view;
                    $traveladvisor_section_border_color = $column_attributes->traveladvisor_section_border_color;
                    if (isset($traveladvisor_section_border_color) && $traveladvisor_section_border_color != '') {
                        $section_style_elements .= '';
                    }
                    if (isset($traveladvisor_section_margin_top) && $traveladvisor_section_margin_top != '') {
                        $section_style_elements .= 'margin-top: ' . $traveladvisor_section_margin_top . 'px;';
                    }
                    if (isset($traveladvisor_section_padding_top) && $traveladvisor_section_padding_top != '') {
                        $section_style_elements .= 'padding-top: ' . $traveladvisor_section_padding_top . 'px;';
                    }
                    if (isset($traveladvisor_section_padding_bottom) && $traveladvisor_section_padding_bottom != '') {
                        $section_style_elements .= 'padding-bottom: ' . $traveladvisor_section_padding_bottom . 'px;';
                    }
                    if (isset($traveladvisor_section_margin_bottom) && $traveladvisor_section_margin_bottom != '') {
                        $section_style_elements .= 'margin-bottom: ' . $traveladvisor_section_margin_bottom . 'px;';
                    }
                    $traveladvisor_section_border_top = $column_attributes->traveladvisor_section_border_top;
                    $traveladvisor_section_border_bottom = $column_attributes->traveladvisor_section_border_bottom;
                    if (isset($traveladvisor_section_border_top) && $traveladvisor_section_border_top != '') {
                        $section_style_elements .= 'border-top: ' . $traveladvisor_section_border_top . 'px ' . $traveladvisor_section_border_color . ' solid;';
                    }
                    if (isset($traveladvisor_section_border_bottom) && $traveladvisor_section_border_bottom != '') {
                        $section_style_elements .= 'border-bottom: ' . $traveladvisor_section_border_bottom . 'px ' . $traveladvisor_section_border_color . ' solid;';
                    }
                    $traveladvisor_section_background_option = $column_attributes->traveladvisor_section_background_option;
                    $traveladvisor_section_bg_image_position = $column_attributes->traveladvisor_section_bg_image_position;
                    if (isset($column_attributes->traveladvisor_section_bg_color))
                        $traveladvisor_section_bg_color = $column_attributes->traveladvisor_section_bg_color;
                    if (isset($traveladvisor_section_background_option) && $traveladvisor_section_background_option == 'section-custom-background-image') {
                        $traveladvisor_section_bg_image = $column_attributes->traveladvisor_section_bg_image;
                        $traveladvisor_section_bg_image_position = $column_attributes->traveladvisor_section_bg_image_position;
                        $traveladvisor_section_bg_imageg = '';
                        if (isset($traveladvisor_section_bg_image) && $traveladvisor_section_bg_image != '') {
                            if (isset($traveladvisor_section_parallax) && (string) $traveladvisor_section_parallax == 'yes') {
                                $traveladvisor_section_bg_imageg = 'url(' . $traveladvisor_section_bg_image . ') ' . $traveladvisor_section_bg_image_position . ' ' . ' fixed';
                            } else {
                                $traveladvisor_section_bg_imageg = 'url(' . $traveladvisor_section_bg_image . ') ' . $traveladvisor_section_bg_image_position . ' ';
                            }
                        }
                        $section_style_elements .= 'background: ' . $traveladvisor_section_bg_imageg . ' ' . $traveladvisor_section_bg_color . ';';
                    } else if (isset($traveladvisor_section_background_option) && $traveladvisor_section_background_option == 'section_background_video') {
                        $traveladvisor_section_video_url = $column_attributes->traveladvisor_section_video_url;
                        $traveladvisor_section_video_mute = $column_attributes->traveladvisor_section_video_mute;
                        $traveladvisor_section_video_autoplay = $column_attributes->traveladvisor_section_video_autoplay;
                        $mute_flag = $mute_control = '';
                        $mute_flag = 'true';
                        if ($traveladvisor_section_video_mute == 'yes') {
                            $mute_flag = 'false';
                            $mute_control = 'controls muted ';
                        }
                        $traveladvisor_video_autoplay = 'autoplay';
                        if ($traveladvisor_section_video_autoplay == 'yes') {
                            $traveladvisor_video_autoplay = 'autoplay';
                        } else {
                            $traveladvisor_video_autoplay = '';
                        }
                        $section_video_class = 'video-parallex';
                        $url = parse_url($traveladvisor_section_video_url);
                        if ($url['host'] == $_SERVER["SERVER_NAME"]) {
                            $file_type = wp_check_filetype($traveladvisor_section_video_url);
                            if (isset($file_type['type']) && $file_type['type'] <> '') {
                                $file_type = $file_type['type'];
                            } else {
                                $file_type = 'video/mp4';
                            }
                            $rand_player_id = rand(6, 555);
                            $section_video_element = '<div class="page-section-video cs-section-video">
                                        <video id="player' . $rand_player_id . '" width="100%" height="100%" ' . $traveladvisor_video_autoplay . ' loop="true" preload="none" volume="false" controls="controls" class="nectar-video-bg   cs-video-element"  ' . $mute_control . ' >
                                            <source src="' . esc_url($traveladvisor_section_video_url) . '" type="' . $file_type . '">
                                        </video>
                                    </div>';
                        } else {
                            $section_video_element = wp_oembed_get($traveladvisor_section_video_url, array('height' => '1083'));
                        }
                    } else {
                        if (isset($traveladvisor_section_bg_color) && $traveladvisor_section_bg_color != '') {
                            $section_style_elements .= 'background: ' . esc_attr($traveladvisor_section_bg_color) . ';';
                        }
                    }
                    $traveladvisor_section_padding_top = $column_attributes->traveladvisor_section_padding_top;
                    $traveladvisor_section_padding_bottom = $column_attributes->traveladvisor_section_padding_bottom;
                    if (isset($traveladvisor_section_padding_top) && $traveladvisor_section_padding_top != '') {
                        $section_container_style_elements .= 'padding-top: ' . $traveladvisor_section_padding_top . 'px; ';
                    }
                    if (isset($traveladvisor_section_padding_bottom) && $traveladvisor_section_padding_bottom != '') {
                        $section_container_style_elements .= 'padding-bottom: ' . $traveladvisor_section_padding_bottom . 'px; ';
                    }
                    $traveladvisor_section_custom_style = $column_attributes->traveladvisor_section_custom_style;
                    $traveladvisor_section_css_id = $column_attributes->traveladvisor_section_css_id;
                    if (isset($traveladvisor_section_css_id) && trim($traveladvisor_section_css_id) != '') {
                        $traveladvisor_section_css_id = 'id="' . $traveladvisor_section_css_id . '"';
                    }

                    $page_element_size = 'section-fullwidth';
                    $traveladvisor_layout = $column_attributes->traveladvisor_layout;
                    if (!isset($traveladvisor_layout) || $traveladvisor_layout == '' || $traveladvisor_layout == 'none') {
                        $traveladvisor_layout = "none";
                        $page_element_size = 'section-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12';
                    } else {
                        $page_element_size = 'section-content col-lg-9 col-md-9 col-sm-12 col-xs-12 ';
                    }
                    $traveladvisor_sidebar_left = $column_attributes->traveladvisor_sidebar_left;
                    $traveladvisor_sidebar_right = $column_attributes->traveladvisor_sidebar_right;
                }
                if (isset($traveladvisor_section_bg_image) && $traveladvisor_section_bg_image <> '' && $traveladvisor_section_background_option == 'section-custom-background-image') {
                    $css_bg_image = 'url(' . $traveladvisor_section_bg_image . ')';
                }

                $section_style_element = '';
                if ($section_style_elements) {
                    $section_style_element = 'style="' . $section_style_elements . '"';
                }
                if ($section_container_style_elements) {
                    $section_container_style_elements = 'style="' . $section_container_style_elements . '"';
                }
                ?>
                <!-- Page Section -->
                <div <?php echo traveladvisor_allow_special_char($traveladvisor_section_css_id); ?> class="page-section <?php echo sanitize_html_class($parallax_class); ?>" <?php echo traveladvisor_allow_special_char($parallax_data_type); ?>  <?php echo traveladvisor_allow_special_char($section_style_element); ?> >
                    <?php
                    echo traveladvisor_allow_special_char($section_video_element);
                    if (isset($traveladvisor_section_background_option) && $traveladvisor_section_background_option == 'section-custom-slider') {
                        $traveladvisor_section_custom_slider = $column_attributes->traveladvisor_section_custom_slider;
                        if ($traveladvisor_section_custom_slider != '') {
                            echo do_shortcode($traveladvisor_section_custom_slider);
                        }
                    }
                    if ($traveladvisor_page_layout == '' || $traveladvisor_page_layout == 'none') {
                        if ($traveladvisor_section_view == 'container') {
                            $traveladvisor_section_view = 'container';
                        } else {
                            $traveladvisor_section_view = 'wide';
                        }
                    } else {
                        $traveladvisor_section_view = '';
                    }
                    ?>
                    <!-- Container Start -->
                    <div class="<?php echo sanitize_html_class($traveladvisor_section_view); ?> "> 
                        <?php
                        if (isset($traveladvisor_layout) && ( $traveladvisor_layout != '' || $traveladvisor_layout != 'none' )) {
                            ?>
                            <div class="row">
                                <?php
                            }
                            // start page section
                            if ($traveladvisor_var_section_title != '' || $traveladvisor_var_section_subtitle != '') {
                                ?>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-section-title" style="margin-bottom:27px;">
                                        <?php if ($traveladvisor_var_section_title != '') { ?>
                                            <h2 style="font-size:24px !important; letter-spacing:1px !important; text-align:center; margin-bottom:20px;"><?php echo esc_html($traveladvisor_var_section_title) ?></h2>
                                        <?php } if ($traveladvisor_var_section_subtitle != '') { ?>
                                            <span><?php echo esc_html($traveladvisor_var_section_subtitle) ?></span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php
                            }// end page section
                            if (isset($traveladvisor_layout) && $traveladvisor_layout == "left" && $traveladvisor_sidebar_left <> '') {
                                echo '<aside class="section-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">';
                                if (is_active_sidebar(traveladvisor_get_sidebar_id($traveladvisor_sidebar_left))) {
                                    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($traveladvisor_sidebar_left)) : endif;
                                }
                                echo '</aside>';
                            }
                            $traveladvisor_node_id = 0;
                            echo '<div class="' . ($page_element_size) . ' ">';
                            echo '<div class="row">';

                            foreach ($column_container->children() as $column) {
                                $column_no++;
                                $traveladvisor_node_id++;
                                foreach ($column->children() as $traveladvisor_node) {

                                    $traveladvisor_elem_id++;
                                    $page_element_size = '100';
                                    if (isset($traveladvisor_node->page_element_size))
                                        $page_element_size = $traveladvisor_node->page_element_size;
                                    echo '<div class="' . traveladvisor_var_page_builder_element_sizes($page_element_size) . '">';
                                    $shortcode = trim((string) $traveladvisor_node->traveladvisor_shortcode);
                                    $shortcode = html_entity_decode($shortcode);
                                    echo do_shortcode($shortcode);
                                    echo '</div>';
                                }
                            }
                            echo '</div></div>';
                            if (isset($traveladvisor_layout) && $traveladvisor_layout == "right" && $traveladvisor_sidebar_right <> '') {
                                echo '<aside class="section-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">';
                                if (is_active_sidebar(traveladvisor_get_sidebar_id($traveladvisor_sidebar_right))) {
                                    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($traveladvisor_sidebar_right)) : endif;
                                }
                                echo '</aside>';
                            }
                            if (isset($traveladvisor_layout) && ( $traveladvisor_layout != '' || $traveladvisor_layout != 'none' )) {
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
                $column_no = 0;
            }
            if (isset($traveladvisor_page_layout) && $traveladvisor_sidebarLayout <> '' && $traveladvisor_sidebarLayout <> "none") {

                echo '</div>';
            }
            if (isset($traveladvisor_page_layout) && $traveladvisor_sidebarLayout <> '' and $traveladvisor_sidebarLayout <> "none" and $traveladvisor_sidebarLayout == 'right') :
                if (is_active_sidebar(traveladvisor_get_sidebar_id($traveladvisor_page_sidebar_right))) {
                    ?>
                    <aside class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($traveladvisor_page_sidebar_right)) : endif; ?>
                    </aside>
                    <?php
                }
            endif;
            if (isset($traveladvisor_page_layout) && $traveladvisor_sidebarLayout <> '' and $traveladvisor_sidebarLayout <> "none") {
                echo '</div>';
                echo '</div>';
            }
        } else {
            ?>
            <div class="container">        
                <!-- Row Start -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php get_template_part('woocommerce/products-loop', 'page'); ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}
get_footer();
