<?php
/**
 * @ Start function for Add Meta Box For Product  
 * @return
 *
 */
add_action('add_meta_boxes', 'traveladvisor_meta_product_add');
if (!function_exists('traveladvisor_meta_product_add')) {

    function traveladvisor_meta_product_add() {
        $strings = new traveladvisor_frame_plugin_all_strings;
        $strings -> traveladvisor_plugin_activation_strings();
        add_meta_box('traveladvisor_meta_product', traveladvisor_var_theme_text_srt('traveladvisor_var_product_meta_options'), 'traveladvisor_meta_product', 'product', 'normal', 'high');
    }

}

/**
 * @ Start function for Meta Box For Post  
 * @return
 *
 */
if (!function_exists('traveladvisor_meta_product')) {

    function traveladvisor_meta_product($post) {
        ?>
        <div class="page-wrap page-opts left" style="overflow:hidden; position:relative;">
            <div class="option-sec" style="margin-bottom:0;">
                <div class="opt-conts">
                    <div class="elementhidden">
                        <nav class="admin-navigtion">
                            <ul id="cs-options-tab">
                                <li><a name="#tab-general-settings" href="javascript:;"><i class="icon-gear"></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_post_meta_general_settings'); ?> </a></li>
                                <li><a name="#tab-slideshow" href="javascript:;"><i class="icon-forward2"></i> <?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_post_meta_subheader'); ?></a></li>
                            </ul> 
                        </nav>
                        <div id="tabbed-content">
                            <div id="tab-general-settings">
                                <?php
                                traveladvisor_sidebar_layout_options();
                                ?>
                            </div>
                            <div id="tab-slideshow">
                                <?php traveladvisor_subheader_element(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <?php
    }
}
