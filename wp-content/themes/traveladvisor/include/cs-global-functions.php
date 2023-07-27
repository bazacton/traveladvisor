<?php
/**
 * File Type: Global Varibles Functions
 */
if (!class_exists('traveladvisor_global_functions')) {

    class traveladvisor_global_functions {

        // The single instance of the class
        protected static $_instance = null;

        public function __construct() {
            // Do something...
        }

        public static function instance() {
            if (is_null(self::$_instance)) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function theme_options() {
            global $traveladvisor_var_options;

            return $traveladvisor_var_options;
        }

        public function globalizing($var_array = array()) {
            if (is_array($var_array) && sizeof($var_array) > 0) {
                $return_array = array();
                foreach ($var_array as $value) {
                    global $$value;
                    $return_array[$value] = $$value;
                }
                return $return_array;
            }
        }

    }

    function TRAVELADVISOR_VAR_GLOBALS() {
        return traveladvisor_global_functions::instance();
    }

    $GLOBALS['traveladvisor_global_functions'] = TRAVELADVISOR_VAR_GLOBALS();
}

//=====================================================================
//  Post Slick Detail function
//=====================================================================

if (!function_exists('traveladvisor_post_slick_detail')) {

    function traveladvisor_post_slick_detail($width, $height, $postid, $view, $return_li = 1) {
        global $post, $traveladvisor_node, $traveladvisor_options, $traveladvisor_counter_node;
        $traveladvisor_post_counter = rand(40, 9999999);
        $traveladvisor_counter_node++;

        if ($view == 'post-list') {
            $viewMeta = 'traveladvisor_post_list_gallery';
        } else {
            $viewMeta = $view;
        }
        $traveladvisor_meta_slider_options = get_post_meta("$postid", $viewMeta, true);
        $totaImages = '';
        ?>
        <?php
        $traveladvisor_counter = 1;
        if ($view == 'post') {
            $sliderData = get_post_meta($post->ID, 'traveladvisor_post_detail_gallery_url', true);
            $totaImages = count($sliderData);
        } else if ($view == 'post-list') {
            $sliderData = get_post_meta($post->ID, 'traveladvisor_post_list_gallery_url', true);
            $totaImages = count($sliderData);
        } else {
            $sliderData = get_post_meta($post->ID, 'traveladvisor_post_list_gallery_url', true);
            $totaImages = count($sliderData);
        }
        if (is_array($sliderData)) {
            asort($sliderData);
            foreach ($sliderData as $as_node) {
                $as_node = traveladvisor_attachment_image_id($as_node);
                $image_url = traveladvisor_attachment_image_src((int) $as_node, $width, $height);
                echo traveladvisor_allow_special_char($return_li == 0) ? '' : '<li>';
                echo '<figure>
			<img src="' . esc_url($image_url) . '" alt="frame">';
                if (isset($as_node['title']) && $as_node['title'] != '') {
                    ?>         
                <?php
                }
                echo traveladvisor_allow_special_char($return_li == 0) ? '' : '</li>';
                ?>
                </figure>
                <?php
                $traveladvisor_counter++;
            }
        }
        ?>

        <?php
    }

}


if (!function_exists('traveladvisor_post_detail')) {

    function traveladvisor_post_detail($width, $height, $postid, $view) {
        global $post, $traveladvisor_node, $traveladvisor_options, $traveladvisor_counter_node;
        $traveladvisor_post_counter = rand(40, 9999999);
        $traveladvisor_counter_node++;

        if ($view == 'post-list') {
            $viewMeta = 'traveladvisor_post_list_gallery';
        } else {
            $viewMeta = $view;
        }
        $traveladvisor_meta_slider_options = get_post_meta("$postid", $viewMeta, true);
        $totaImages = '';
        ?>
        <?php
        $traveladvisor_counter = 1;

        $sliderData = get_post_meta($post->ID, 'traveladvisor_post_detail_gallery_url', true);
        $totaImages = count($sliderData);

        asort($sliderData);
        foreach ($sliderData as $as_node) {
            $as_node = traveladvisor_attachment_image_id($as_node);
            $image_url = traveladvisor_attachment_image_src((int) $as_node, $width, $height);

            echo ' <li><figure>
							<img src="' . esc_url($image_url) . '" alt="frame">';
            if (isset($as_node['title']) && $as_node['title'] != '') {
                ?>         
            <?php } ?>
            </li></figure>
            <?php
            $traveladvisor_counter++;
        }
        ?>

        <?php
    }

}

/**
 * Start Function Related posts
 */
if (!function_exists('traveladvisor_related_posts')) {

    function traveladvisor_related_posts($traveladvisor_limit = '-1') {

        global $post, $traveladvisor_var_plugin_core, $traveladvisor_var_static_text, $traveladvisor_blog_excerpt;
       $strings = new traveladvisor_theme_all_strings;
            $strings->traveladvisor_theme_option_field_strings();
        $current_post_id = $post->ID;
        $title_limit = 10;
        $custom_taxterms = '';
        $width = 250;
        $height = 188;
        $categories = get_the_category();
        $cat_arr = array();
        foreach ($categories as $category) {
            $cat_arr[] = $category->term_id;
        }
        $exclude_ids = $exclude_ids = array($current_post_id);
        $args_value = array('post__not_in' => $exclude_ids, 'category__in' => $cat_arr, 'post_type' => 'post', 'posts_per_page' => -1, 'orderby' => 'post_date', 'order' => 'DESC');

        $query = new WP_Query($args_value);
        $post_count = $query->post_count;
        if ($query->have_posts()) {
            $postCounter = 0;
            ?>
            <?php
            while ($query->have_posts()) : $query->the_post();
                $thumbnail = traveladvisor_get_post_img_src($post->ID, $width, $height);
                $traveladvisor_postObject = get_post_meta($post->ID, "traveladvisor_full_data", true);
                $traveladvisor_gallery = get_post_meta($post->ID, 'traveladvisor_post_list_gallery', true);
                $traveladvisor_gallery = explode(',', $traveladvisor_gallery);
                $traveladvisor_thumb_view = get_post_meta($post->ID, 'traveladvisor_thumb_view', true);
                $audioFile = get_post_meta($post->ID, 'traveladvisor_audio_url', true);
                $videoFile = get_post_meta($post->ID, 'traveladvisor_video_url', true);
                $traveladvisor_post_view = isset($traveladvisor_thumb_view) ? $traveladvisor_thumb_view : '';
                $current_user = wp_get_current_user();
                $current_category = get_the_category();
                $custom_image_url = get_user_meta(get_the_author_meta('ID'), 'user_avatar_display', true);
                $tags = get_tags();
                ?> 
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="blog-listing medium-view">

                        <?php if ($thumbnail <> '') { ?>

                            <div class="cs-media">
                                <?php if ($traveladvisor_thumb_view == 'slider') { ?>
                                    <div class="cs-media blog-medium-slider">
                                        <?php echo traveladvisor_post_slick_detail($width, $height, get_the_id(), 'post-list', 0); ?>
                                    </div>
                                    <?php
                                } elseif ($traveladvisor_thumb_view == 'audio') {
                                    if ($audioFile <> '') {
                                        ?>
                                        <?php echo wp_audio_shortcode(array('src' => $audioFile)); ?>
                                        <?php
                                    }
                                } elseif ($traveladvisor_thumb_view == 'video') {
                                    if ($videoFile <> '') {
                                        echo wp_oembed_get($videoFile, array('height' => 210));
                                    }
                                } else {
                                    ?>
                                    <figure>
                                        <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php the_title(); ?>"><img alt="<?php the_title(); ?>" src="<?php echo esc_url($thumbnail); ?>"></a>
                                        <figcaption>
                                            <?php if (is_sticky()) { ?>
                                                <div class="caption-text"><span><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_sticky_text'); ?></span></div>
                                            <?php } ?>
                                        </figcaption>
                                    </figure>
                                <?php } ?>
                            </div>
                        <?php } ?>	

                        <div class="cs-text">
                            <div class="post-title">
                                <h4><a href="<?php echo esc_url(get_permalink()); ?>" title="<?php the_title(); ?>"><?php echo wp_trim_words(get_the_title(),60);
                echo strlen(get_the_title()) > 60 ? '...' : ''
                        ?></a></h4>
                            </div>
                            <ul class="cs-auto-categories">
                                <li><a href="#" class="cs-color"><?php echo esc_html($current_category[0]->cat_name); ?></a></li>
                            </ul>
                            <p> <?php echo traveladvisor_get_excerpt($traveladvisor_blog_excerpt, 'true', ''); ?></p>
                            <a href="<?php the_permalink(); ?>" class="read-more cs-color"><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_readmore_text'); ?></a>

                            <div class="post-detail">
                                <span class="post-author"><i class="icon-user4"></i> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></span>
                                <span class="post-comments"><a href="<?php the_permalink(); ?>#comments"> <?php
                                        $num_comments = get_comments_number($post->ID); // get_comments_number returns only a numeric value
                                        echo absint($num_comments) . " ";
                                        if ($num_comments > 1) {
                                            echo traveladvisor_var_theme_text_srt('traveladvisor_var_comment_text');
                                        } else {
                                            echo traveladvisor_var_theme_text_srt('traveladvisor_var_comments_text');
                                        }
                                        ?></a></span>
                                <span class="post-date"><a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><?php echo date('F d, Y', strtotime(get_the_date())); ?></a></span>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            endwhile;
            ?><?php
        } else {
            $traveladvisor_notification->error(traveladvisor_var_theme_text_srt('traveladvisor_var_no_post_error'));
        }
        wp_reset_postdata();
        ?>
        <?php
    }

}
/**
 * End Function Related Cars
 */

