<?php
/**
 * @Twitter Tweets widget Class
 *
 *
 */
if (!class_exists('traveladvisor_twitter_widget')) {

    class traveladvisor_twitter_widget extends WP_Widget {
        /**
         * Outputs the content of the widget
         *
         * @param array $args
         * @param array $instance
         */

        /**
         * @init Twitter Module
         *
         *
         */
        public function __construct() {

            parent::__construct(
                    'traveladvisor_twitter_widget', // Base ID
                    __('CS : Twitter Widget', 'traveladvisor'), // Name
                    array('classname' => 'twitter-widget', 'description' => __('Twitter Widget.', 'traveladvisor'),) // Args
            );
        }

        /**
         * @Twitter html form
         *
         *
         */
        function form($instance) {
            $instance = wp_parse_args((array) $instance, array('title' => ''));
            $title = $instance['title'];
            $username = isset($instance['username']) ? esc_attr($instance['username']) : '';
            $numoftweets = isset($instance['numoftweets']) ? esc_attr($instance['numoftweets']) : '';
            ?>
            <label for="<?php echo traveladvisor_allow_special_char($this->get_field_id('title')); ?>"> <span><?php _e('Title:', 'traveladvisor') ?> </span>
                <input class="upcoming" id="<?php echo traveladvisor_allow_special_char($this->get_field_id('title')); ?>" size="40" name="<?php echo traveladvisor_allow_special_char($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </label>
            <label for="screen_name"><?php _e('User Name', 'traveladvisor') ?><span class="required">(*)</span>: </label>
            <input class="upcoming" id="<?php echo traveladvisor_allow_special_char($this->get_field_id('username')); ?>" size="40" name="<?php echo traveladvisor_allow_special_char($this->get_field_name('username')); ?>" type="text" value="<?php echo esc_attr($username); ?>" />
            <label for="tweet_count">
                <span><?php _e('Num of Tweets:', 'traveladvisor') ?> </span>
                <input class="upcoming" id="<?php echo traveladvisor_allow_special_char($this->get_field_id('numoftweets')); ?>" size="2" name="<?php echo traveladvisor_allow_special_char($this->get_field_name('numoftweets')); ?>" type="text" value="<?php echo esc_attr($numoftweets); ?>" />
                <div class="clear"></div>
            </label>
            <?php
        }

        /**
         * @Twitter update form data 
         *
         *
         */
        function update($new_instance, $old_instance) {
            $instance = $old_instance;
            $instance['title'] = $new_instance['title'];
            $instance['username'] = $new_instance['username'];
            $instance['numoftweets'] = $new_instance['numoftweets'];
            return $instance;
        }

        /**
         * @Display Twitter widget
         *
         *
         */
        function widget($args, $instance) {
            global $traveladvisor_var_options, $traveladvisor_twitter_arg, $traveladvisor_traveldvisor_theme_options;
            $traveladvisor_twitter_api_switch = isset($traveladvisor_var_options['traveladvisor_var_twitter_api_switch']) ? $traveladvisor_var_options['traveladvisor_var_twitter_api_switch'] : '';
            $traveladvisor_twitter_arg['consumerkey'] = isset($traveladvisor_var_options['traveladvisor_var_consumer_key']) ? $traveladvisor_var_options['traveladvisor_var_consumer_key'] : '';
            $traveladvisor_twitter_arg['consumersecret'] = isset($traveladvisor_var_options['traveladvisor_var_consumer_secret_key']) ? $traveladvisor_var_options['traveladvisor_var_consumer_secret_key'] : '';
            $traveladvisor_twitter_arg['accesstoken'] = isset($traveladvisor_var_options['traveladvisor_var_access_token']) ? $traveladvisor_var_options['traveladvisor_var_access_token'] : '';
            $traveladvisor_twitter_arg['accesstokensecret'] = isset($traveladvisor_var_options['traveladvisor_var_access_token_secret']) ? $traveladvisor_var_options['traveladvisor_var_access_token_secret'] : '';
            $traveladvisor_cache_limit_time = isset($traveladvisor_var_options['traveladvisor_var_cache_limit_time']) ? $traveladvisor_var_options['traveladvisor_var_cache_limit_time'] : '';
            $traveladvisor_tweet_num_from_twitter = isset($traveladvisor_var_options['traveladvisor_var_tweet_num_post']) ? $traveladvisor_var_options['traveladvisor_var_tweet_num_post'] : '';
            $traveladvisor_twitter_datetime_formate = isset($traveladvisor_var_options['traveladvisor_var_twitter_datetime_formate']) ? $traveladvisor_var_options['traveladvisor_var_twitter_datetime_formate'] : '';
            if ($traveladvisor_cache_limit_time == '') {
                $traveladvisor_cache_limit_time = 60;
            }
            if ($traveladvisor_twitter_datetime_formate == '') {
                $traveladvisor_twitter_datetime_formate = 'time_since';
            }
            if ($traveladvisor_tweet_num_from_twitter == '') {
                $traveladvisor_tweet_num_from_twitter = 5;
            }
            if ($traveladvisor_twitter_api_switch == 'on') {
                extract($args, EXTR_SKIP);
                $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
                $title = htmlspecialchars_decode(stripslashes($title));
                $username = $instance['username'];
                $numoftweets = $instance['numoftweets'];
                if ($numoftweets == '') {
                    $numoftweets = 2;
                }

//                echo traveladvisor_allow_special_char($before_widget);
                // WIDGET display CODE Start
		echo '<div class="widget widget-twitter">';
                if (!empty($title) && $title <> ' ') {
                    //echo traveladvisor_allow_special_char($title);
		    echo '<div class="widget-title"><h4>' . traveladvisor_allow_special_char($title) . '</h4></div>';
                }
                if (strlen($username) > 1) {

                    if ($traveladvisor_twitter_arg['consumerkey'] <> '' && $traveladvisor_twitter_arg['consumersecret'] <> '' && $traveladvisor_twitter_arg['accesstoken'] <> '' && $traveladvisor_twitter_arg['accesstokensecret'] <> '') {
                        require_once "display-tweets.php";
                        display_tweets($username, $traveladvisor_twitter_datetime_formate, $traveladvisor_tweet_num_from_twitter, $numoftweets, $traveladvisor_cache_limit_time);
                    } else {
                        echo '<p>' . __('Please Set Twitter API', 'traveladvisor') . '</p>';
                    }
                }
//                echo traveladvisor_allow_special_char($after_widget);
		echo '</div>';
            }
        }

    }

}
add_action('widgets_init', function() {
    return register_widget("traveladvisor_twitter_widget");
});
?>