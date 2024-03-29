<?php

function get_auth($id, $max_tweets) {
    global $traveladvisor_twitter_arg;
    $include_rts = true; // include retweets is set to true by default, if you don't want to include retweets set this to false
    $exclude_replies = true; //Replies are not displayed by default.  If you wish to change this set this to false
    $consumer_key = $traveladvisor_twitter_arg['consumerkey'];
    $consumer_secret = $traveladvisor_twitter_arg['consumersecret'];
    $user_token = $traveladvisor_twitter_arg['accesstoken'];
    $user_secret = $traveladvisor_twitter_arg['accesstokensecret'];


//    $consumer_key = 'uIu0b1tP9mzrDXUdKAPgHSa98'; //Add your Twitter Consumer Key here
//    $consumer_secret = 'AtuBTeaQ4cusB96YgflpIW0BoYwC9HI38NmlVzPGE5NmI8oL5V'; //Add your Twitter Consumer Secret here
//    $user_token = '4512507383-2wnZADxan7GxPqkTLetgMh589bbMfQdAEm9OGgt'; //Add your Twitter User Token here
//    $user_secret = 'bBX7Rjzf43Uy4QCUaWmv7COhiakBiMf9D47AjpmS3uhoh'; //Add your Twitter User Secret here


    require_once 'includes/tmhOAuth.php';

    $tmhOAuth = new tmhOAuth(array(
        'consumer_key' => $consumer_key,
        'consumer_secret' => $consumer_secret,
        'user_token' => $user_token,
        'user_secret' => $user_secret
    ));
    $twitter_settings_arr = array(
        'count' => $max_tweets,
        'screen_name' => $id,
        'include_rts' => $include_rts,
        'exclude_replies' => $exclude_replies
    );

    $code = $tmhOAuth->request('GET', $tmhOAuth->url('1.1/statuses/user_timeline'), $twitter_settings_arr);
    $res_code = array(
        '200',
        '304'
    );
    if (in_array($code, $res_code)) {
        $data = $tmhOAuth->response['response'];
        return $data;
    } else {
        return $data = '500';
    }
}
//$id='Envato';

function cache_json($id, $max_tweets, $time) {
  
    $cache = plugin_dir_path( __FILE__ ) . 'cache/' . $id . '.json';
	$cache_folder = plugin_dir_path( __FILE__ ) . 'cache/';
    

    if (!file_exists($cache)) {
        if (!file_exists($cache_folder)) {
            $cache_dir = mkdir($cache_folder);
            $cache_data = true;
        }
        if (!file_exists($cache)) {
            $cache_data = true;
        }
    } else {
        $cache_time = time() - filemtime($cache);
        if ($cache_time > 60 * $time) {
            $cache_data = true;
        }
    }
    $tweets = '';

    global $wp_filesystem;
    if (empty($wp_filesystem)) {
        require_once (ABSPATH . '/wp-admin/includes/file.php');
        WP_Filesystem();
    }

    if (isset($cache_data)) {
        $data = get_auth($id, $max_tweets);
        if ($data != '500') {
            $cached = $wp_filesystem->put_contents($cache, $data);
        }
    }
    $tweets = json_decode($wp_filesystem->get_contents($cache), true);


    return $tweets;
}

function dateDiff($time1, $time2, $precision = 6) {
    if (!is_int($time1)) {
        $time1 = strtotime($time1);
    }
    if (!is_int($time2)) {
        $time2 = strtotime($time2);
    }
    if ($time1 > $time2) {
        $ttime = $time1;
        $time1 = $time2;
        $time2 = $ttime;
    }
    $intervals = array(
        'year',
        'month',
        'day',
        'hour',
        'minute',
        'second'
    );
    $diffs = array();
    foreach ($intervals as $interval) {
        $diffs[$interval] = 0;
        $ttime = strtotime("+1 " . $interval, $time1);
        while ($time2 >= $ttime) {
            $time1 = $ttime;
            $diffs[$interval] ++;
            $ttime = strtotime("+1 " . $interval, $time1);
        }
    }
    $count = 0;
    $times = array();
    foreach ($diffs as $interval => $value) {
        if ($count >= $precision) {
            break;
        }
        if ($value > 0) {
            if ($value != 1) {
                $interval .= "s";
            }
            $times[] = $value . " " . $interval;
            $count++;
        }
    }
    return implode(", ", $times);
}

function display_tweets($id, $style = '', $max_tweets = 10, $max_cache_tweets = 10, $time = 60) {
    $tweets = cache_json($id, $max_tweets, $time);
    $twitter = '';

    $twitter .= '<ul class="tweeter">';
    if (!empty($tweets)) {
        $tweet_flag = 1;
        foreach ($tweets as $tweet) {
            $pubDate = $tweet['created_at'];
            $tweet = $tweet['text'];
            $today = time();
            $time = substr($pubDate, 11, 5);
            $day = substr($pubDate, 0, 3);
            $date = substr($pubDate, 7, 4);
            $month = substr($pubDate, 4, 3);
            $year = substr($pubDate, 25, 5);
            $english_suffix = date('jS', strtotime(preg_replace('/\s+/', ' ', $pubDate)));
            $full_month = date('F', strtotime($pubDate));


            #pre-defined tags
            $default = $full_month . $date . $year;
            $full_date = $day . $date . $month . $year;
            $ddmmyy = $date . $month . $year;
            $mmyy = $month . $year;
            $mmddyy = $month . $date . $year;
            $ddmm = $date . $month;

            #Time difference
            $timeDiff = dateDiff($today, $pubDate, 1);

            # Turn URLs into links
            $tweet = preg_replace('@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\./-]*(\?\S+)?)?)?)@', '<a target="blank" title="$1" href="$1">$1</a>', $tweet);

            #Turn hashtags into links
            $tweet = preg_replace('/#([0-9a-zA-Z_-]+)/', "<a target='blank' title='$1' href=\"http://twitter.com/search?q=%23$1\">#$1</a>", $tweet);

            #Turn @replies into links
            $tweet = preg_replace("/@([0-9a-zA-Z_-]+)/", "<a target='blank' title='$1' href=\"http://twitter.com/$1\">@$1</a>", $tweet);


            $twitter .= "<li class='tweet'>" . $tweet . "<br /><i class='icon-twitter2'></i>";

            if (isset($style)) {
                if (!empty($style)) {
                    //$when = ($style == 'time_since' ? 'About' : 'On');
                    $when = ($style == 'time_since' ? '' : 'On');
                    $twitter.="<strong>" . $when . "&nbsp;";

                    switch ($style) {
                        case 'eng_suff': {
                                $twitter .= $english_suffix . '&nbsp;' . $full_month;
                            }
                            break;
                        case 'time_since'; {
                                $twitter .= $timeDiff . "&nbsp;ago";
                            }
                            break;
                        case 'ddmmyy'; {
                                $twitter .= $ddmmyy;
                            }
                            break;
                        case 'ddmm'; {
                                $twitter .= $ddmm;
                            }
                            break;
                        case 'full_date'; {
                                $twitter .= $full_date;
                            }
                            break;
                        case 'default'; {
                                $twitter .= $default;
                            }
                    } //end switch statement
                    $twitter .= "</strong></li>"; //end of List
                }
            }
            if ($max_cache_tweets <= $tweet_flag) {
                break;
            }
            $tweet_flag++;
        } //end of foreach
    } else {
        $twitter .= '<li>'.__('No tweets','jobhunt').'</li>';
    } //end if statement
    $twitter .= '</ul>'; //end of Unordered list (Notice it's after the foreach loop!)
    echo force_balance_tags($twitter);
}

?>