<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Traveladvisor
 * @since Traveladvisor
 */
$traveladvisor_var_options = TRAVELADVISOR_VAR_GLOBALS()->theme_options();
$traveladvisor_var_sub_footer_social_icons = $traveladvisor_var_options['traveladvisor_var_sub_footer_social_icons'];
$strings = new traveladvisor_theme_all_strings;
$strings->traveladvisor_theme_option_strings();
//traveladvisor_theme_option_strings();
$traveladvisor_var_footer_switch = $traveladvisor_var_options['traveladvisor_var_footer_switch'];
$traveladvisor_var_footer_widget = $traveladvisor_var_options['traveladvisor_var_footer_widget'];
$traveladvisor_var_footer_menu = $traveladvisor_var_options['traveladvisor_var_footer_menu'];
$traveladvisor_var_footer_logo = $traveladvisor_var_options['traveladvisor_var_footer_logo'];
$traveladvisor_var_copy_write_section = $traveladvisor_var_options['traveladvisor_var_copy_write_section'];
$traveladvisor_var_logo_link = $traveladvisor_var_options['traveladvisor_var_logo_link'];
$traveladvisor_var_copy_right = $traveladvisor_var_options['traveladvisor_var_copy_right'];
$traveladvisor_var_copyright_bg_color = isset($traveladvisor_var_options['traveladvisor_var_copyright_bg_color']) ? $traveladvisor_var_options['traveladvisor_var_copyright_bg_color'] : '';
//payment gateway images
$traveladvisor_var_footer_card1 = isset($traveladvisor_var_options['traveladvisor_var_footer_card1']) ? $traveladvisor_var_options['traveladvisor_var_footer_card1'] : '';
$traveladvisor_var_footer_card2 = isset($traveladvisor_var_options['traveladvisor_var_footer_card2']) ? $traveladvisor_var_options['traveladvisor_var_footer_card2'] : '';
$traveladvisor_var_footer_card3 = isset($traveladvisor_var_options['traveladvisor_var_footer_card3']) ? $traveladvisor_var_options['traveladvisor_var_footer_card3'] : '';
$traveladvisor_var_footer_card4 = isset($traveladvisor_var_options['traveladvisor_var_footer_card4']) ? $traveladvisor_var_options['traveladvisor_var_footer_card4'] : '';

if (isset($traveladvisor_var_options['traveladvisor_var_footer_widget_sidebar']) and $traveladvisor_var_options['traveladvisor_var_footer_widget_sidebar'] == 'sidebar') {


    $traveladvisor_var_footer_widget_sidebar = $traveladvisor_var_options['traveladvisor_var_footer_widget_sidebar'];
}


if ($traveladvisor_var_footer_logo == '') {
    $traveladvisor_var_footer_logo = trailingslashit(get_template_directory_uri()) . 'assets/frontend/images/cs-footer-logo.png';
}
?>
<!-- Footer Start -->
<?php
$footer_sidebar_list = '';
$traveladvisor_footer_sidebar_width = '';

if (isset($traveladvisor_var_options) and isset($traveladvisor_var_options['traveladvisor_var_footer_sidebar'])) {
    if (is_array($traveladvisor_var_options['traveladvisor_var_footer_sidebar']) and count($traveladvisor_var_options['traveladvisor_var_footer_sidebar']) > 0) {
        $traveladvisor_footer_sidebar = array('traveladvisor_var_footer_sidebar' => $traveladvisor_var_options['traveladvisor_var_footer_sidebar']);
    } else {
        $traveladvisor_footer_sidebar = array('traveladvisor_var_footer_sidebar' => array());
    }
} else {
    $traveladvisor_footer_sidebar = isset($traveladvisor_var_footer_sidebar) ? $traveladvisor_var_footer_sidebar : '';
}
if ((isset($traveladvisor_var_footer_switch) && $traveladvisor_var_footer_switch == 'on')) {
    $cssidebar = false;
    $i = 0;
    if (isset($traveladvisor_footer_sidebar['traveladvisor_var_footer_sidebar']) && is_array($traveladvisor_footer_sidebar['traveladvisor_var_footer_sidebar'])) {
        foreach ($traveladvisor_footer_sidebar['traveladvisor_var_footer_sidebar'] as $footer_sidebar_var => $footer_sidebar_val) {

            $footer_sidebar_list[$footer_sidebar_var] = $footer_sidebar_val;
            $traveladvisor_footer_sidebar_width = wp_trim_words($traveladvisor_var_options['traveladvisor_var_footer_width'][$i], 2);
            $footer_sidebar_id = sanitize_title($footer_sidebar_val);
            if (is_active_sidebar($footer_sidebar_id)) {
                $cssidebar = true;
            }
            $i++;
        }
    }
    //if (isset($traveladvisor_var_options['traveladvisor_var_maintinance_mode_page']) && $traveladvisor_var_options['traveladvisor_var_maintinance_mode_page'] == get_the_id() && //isset($traveladvisor_var_options['traveladvisor_var_footer_setting']) && $traveladvisor_var_options['traveladvisor_var_footer_setting'] != 'on') {
        //echo '<div class="cs-nofooter"></div>';
   // } else {
        ?>
        <footer id="footer">
            <div class="top-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                            <?php
                            if ($traveladvisor_var_sub_footer_social_icons == 'on') {
                                if (function_exists('traveladvisor_var_social_network')) {
                                    ?>
                                    <div class="cs-social-media">
                                        <ul>
                                            <?php
                                            traveladvisor_var_social_network('', 'yes');
                                            ?>
                                        </ul>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"> <a href="#" class="btn-to-top"><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_option_back_to_top'); ?><i class="icon-keyboard_arrow_up"></i></a> </div>
                    </div>
                </div>
            </div>

            <?php
            $footer_sidebar_count = '';
            if (isset($traveladvisor_footer_sidebar['traveladvisor_var_footer_sidebar']) and $traveladvisor_footer_sidebar['traveladvisor_var_footer_sidebar'] != '') {

                $footer_sidebar_count = count($traveladvisor_footer_sidebar['traveladvisor_var_footer_sidebar']);
            }
            if ($traveladvisor_var_options['traveladvisor_var_footer_widget'] == 'on' && $footer_sidebar_count != '') {
                ?>
                <div class="cs-footer-widgets">
                    <div class="container"> 
                        <?php
                        $i = 0;
                        if (isset($traveladvisor_footer_sidebar['traveladvisor_var_footer_sidebar'])) {
                            if (is_array($traveladvisor_footer_sidebar['traveladvisor_var_footer_sidebar'])) {
                                echo '<div class="row">';
                                foreach ($traveladvisor_footer_sidebar['traveladvisor_var_footer_sidebar'] as $footer_sidebar_var => $footer_sidebar_val) {
                                    $size = '';
                                    $column = '';
                                    $footer_sidebar_list[$footer_sidebar_var] = $footer_sidebar_val;
                                    $traveladvisor_footer_sidebar_width = wp_trim_words($traveladvisor_var_options['traveladvisor_var_footer_width'][$i], 2);
                                    $footer_sidebar_id = sanitize_title($footer_sidebar_val);
                                    $size = absint($traveladvisor_footer_sidebar_width);
                                    if ($size == 2) {
                                        $column = 'col-lg-2 col-md-2 col-sm-4 col-xs-6';
                                    } else if ($size == 3) {
                                        $column = 'col-lg-3 col-md-3 col-sm-6 col-xs-12';
                                    } else if ($size == 4) {
                                        $column = 'col-lg-4 col-md-4 col-sm-6 col-xs-12';
                                    } else if ($size == 6) {
                                        $column = 'col-lg-6 col-md-6 col-sm-12 col-xs-12';
                                    } else if ($size == 8) {
                                        $column = 'col-lg-8 col-md-8 col-sm-12 col-xs-12';
                                    } else if ($size == 9) {
                                        $column = 'col-lg-9 col-md-9 col-sm-12 col-xs-12';
                                    } else if ($size == 10) {
                                        $column = 'col-lg-10 col-md-10 col-sm-12 col-xs-12';
                                    } else if ($size == 12) {
                                        $column = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
                                    }

                                    if (is_active_sidebar(traveladvisor_get_sidebar_id($footer_sidebar_id))) {
                                        echo '<div class="' . $column . '">';
                                        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($footer_sidebar_id)) :

                                        endif;
                                        echo '</div>';
                                    }
                                    $i++;
                                }
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
            if ($traveladvisor_var_copy_write_section == 'on') {
                ?>
                <div style="background-color:<?php echo traveladvisor_allow_special_char($traveladvisor_var_copyright_bg_color); ?>;" class="cs-copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="copyright-text">
                                    <?php
                                    if (isset($traveladvisor_var_footer_logo) && $traveladvisor_var_footer_logo != '') {
                                        ?>
                                        <div class="cs-logo">
                                            <a href="<?php echo esc_url($traveladvisor_var_logo_link) ?>"><img src="<?php echo esc_url($traveladvisor_var_footer_logo); ?>" alt="footer_logo" ></a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <p>
                                        <?php
                                        if ($traveladvisor_var_copy_write_section == 'on') {
                                            $traveladvisor_allowed_tags = array(
                                                'a' => array('href' => array(), 'class' => array()),
                                                'b' => array(),
                                                'i' => array('class' => array()),
                                            );
                                            echo wp_kses(wp_specialchars_decode($traveladvisor_var_copy_right), $traveladvisor_allowed_tags);
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="cs-shop-card">
                                    <ul>
                                        <?php
                                        if ($traveladvisor_var_copy_write_section == 'on') {
                                            if (isset($traveladvisor_var_footer_card1) && $traveladvisor_var_footer_card1 != "") {
                                                ?>
                                                <li><img src="<?php echo esc_html($traveladvisor_var_footer_card1); ?>" alt="traveladvisor_var_footer_card1"></li>
                                                <?php
                                            }
                                            if (isset($traveladvisor_var_footer_card2) && $traveladvisor_var_footer_card2 != "") {
                                                ?>
                                                <li><img src="<?php echo esc_html($traveladvisor_var_footer_card2); ?>" alt="traveladvisor_var_footer_card2"></li>
                                                <?php
                                            }
                                            if (isset($traveladvisor_var_footer_card3) && $traveladvisor_var_footer_card3 != "") {
                                                ?>
                                                <li><img src="<?php echo esc_html($traveladvisor_var_footer_card3); ?>" alt="traveladvisor_var_footer_card3"></li>
                                                <?php
                                            }
                                            if (isset($traveladvisor_var_footer_card4) && $traveladvisor_var_footer_card4 != "") {
                                                ?>
                                                <li><img src="<?php echo esc_html($traveladvisor_var_footer_card4); ?>" alt="traveladvisor_var_footer_card4"></li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </footer>
        <?php
    //}
}
?>
<!-- Footer End -->
</div>
<!-- wrapper -->
<?php
//print_r (get_option('traveladvisor_var_options'));
wp_footer();
?>
</body>
</html>