<?php
/**
 * @Add Meta Box For Galleries
 * @return
 *
 */
if (!class_exists('traveladvisor_var_gallery_meta')) {

    class traveladvisor_var_gallery_meta {

        public function __construct() {
            add_action('add_meta_boxes', array($this, 'traveladvisor_var_meta_gallery_add'));
        }

        function traveladvisor_var_meta_gallery_add() {
            $strings = new traveladvisor_plugin_all_strings;
            $strings -> traveladvisor_plugin_activation_strings();
            add_meta_box('traveladvisor_var_meta_gallery', traveladvisor_var_theme_text_srt('traveladvisor_var_gallery_meta_options'), array($this, 'traveladvisor_var_meta_gallery'), 'gallery', 'normal', 'high');
        }

        function traveladvisor_var_meta_gallery($post) {
            global $post, $traveladvisor_var_theme_options, $page_option, $traveladvisor_var_form_meta;
            $traveladvisor_var_theme_options = get_option('traveladvisor_var_theme_options');
            $traveladvisor_var_builtin_seo_fields = isset($traveladvisor_var_theme_options['traveladvisor_var_builtin_seo_fields']) ? $traveladvisor_var_theme_options['traveladvisor_var_builtin_seo_fields'] : '';
            $traveladvisor_var_header_position = isset($traveladvisor_var_theme_options['traveladvisor_var_header_position']) ? $traveladvisor_var_theme_options['traveladvisor_var_header_position'] : '';
            ?>		
            <div class="page-wrap page-opts left" style="overflow:hidden; position:relative;">
                <div class="option-sec" style="margin-bottom:0;">
                    <div class="opt-conts">
                        <div class="elementhidden">
                            <nav class="admin-navigtion">
                                <ul id="cs-options-tab">
                                    <li><a href="javascript:;" name="#tab-galleries-settings-cs-galleries"><i class="icon-briefcase"></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_gallery_meta_options'); ?></a></li>
                                </ul>
                            </nav>
                            <div id="tabbed-content">
                                <div id="tab-galleries-settings-cs-galleries">
                                    <?php $this->traveladvisor_var_post_gallery_fields(); ?>
                                    <a href="../post-types/cs-gallery.php"></a>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <?php
        }

        /**
         * @Gallery Custom Fileds Function
         * @return
         */
        function traveladvisor_var_post_gallery_fields() {

            global $post, $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
            $strings = new traveladvisor_plugin_all_strings;
            $strings -> traveladvisor_plugin_activation_strings();

            $traveladvisor_var_html_fields->traveladvisor_var_gallery_render(
                    array(
                        'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_gallery_add_images'),
                        'id' => 'list_gallery',
                        'classes' => '',
                        'std' => 'gallery_meta_form',
                    )
            );
        }

    }

    return new traveladvisor_var_gallery_meta();
}
