<?php
if (!function_exists('cs_widget_register')) {

    //function cs_widget_register($name = '') {
        //if ($name != '') {
            //add_action('widgets_init',  function($name){return register_widget($name);});
            
        //}
    //}
    function cs_widget_register($name) {
        //$name = 'traveladvisor_aboutus';
    
 add_action( 'widgets_init', function() use ($name) {   return register_widget($name); } );
}

}
if ( ! function_exists('traveladvisore_set_inventory_view') ) {

	function traveladvisore_set_inventory_view() {
		
		
		$inv_view = isset($_POST['traveladvisore_inventory_view']) ? $_POST['traveladvisore_inventory_view'] : '';
		$inv_counter = isset($_POST['traveladvisore_counter']) ? $_POST['traveladvisore_counter'] : '';
		set_transient( "traveladvisor_inventory_view_$inv_counter", $inv_view, 43200 );
		echo get_transient("traveladvisor_inventory_view_$inv_counter");
		die();
	}

	add_action('wp_ajax_traveladvisore_set_inventory_view', 'traveladvisore_set_inventory_view');
	add_action('wp_ajax_nopriv_traveladvisore_set_inventory_view', 'traveladvisore_set_inventory_view');
}
if ( ! function_exists('ajaxcontact_send_mail') ) {

	function ajaxcontact_send_mail() {
		$results = '';
		$error = 0;
		$error_result = 0;
		$message = "";
		$name = '';
		$email = '';
		$phone = '';
		$contents = '';
		$candidateid = '';
		$user_email = "";
		$date = "";
		$adults = "";
		$children = "";
		$infants = "";
		$traveladvisor_tour_title = "";
		$traveladvisor_hidden_email = "";
		$booking_date = "";
		if ( isset($_POST['booking_date']) ) {
			$date = $_POST['booking_date'];
		}
		if ( isset($_POST['tour_adults']) ) {
			$adults = $_POST['tour_adults'];
		}
		if ( isset($_POST['tour_children']) ) {
			$children = $_POST['tour_children'];
		}
		if ( isset($_POST['tour_infants']) ) {
			$infants = $_POST['tour_infants'];
		}

		if ( isset($_POST['user_name']) ) {
			$user_name = $_POST['user_name'];
		}
		if ( isset($_POST['user_email']) ) {
			$user_email = $_POST['user_email'];
		}
		if ( isset($_POST['traveladvisor_tour_title']) ) {
			$traveladvisor_tour_title = $_POST['traveladvisor_tour_title'];
		}
		if ( isset($_POST['traveladvisor_hidden_email']) ) {
			$traveladvisor_hidden_email = $_POST['traveladvisor_hidden_email'];
		}
		$subject = __("Tour Booking Order", "cs-traveladvisor");
		$to = $traveladvisor_hidden_email;
		// getting email address from user table
		if ( strlen($adults) == 0 ) {
			$results = "&nbsp; <span style=\"color: #ff0000;\">" . __('Please Select Adults.', 'cs-traveladvisor') . "</span><br/>";
			$error = 1;
			$error_result = 1;
		} else if ( strlen($date) == 0 ) {
			$results = "&nbsp; <span style=\"color: #ff0000;\">" . __('Please Enter Date of Booking.', 'cs-traveladvisor') . "</span><br/>";
			$error = 1;
			$error_result = 1;
		} else if ( strlen($user_name) == 0 ) {
			$results = "&nbsp; <span style=\"color: #ff0000;\">" . __('Please enter name.', 'cs-traveladvisor') . "</span><br/>";
			$error = 1;
			$error_result = 1;
		} else if ( strlen($user_email) == 0 ) {
			$results = "&nbsp; <span style=\"color: #ff0000;\">" . __('Please enter email.', 'cs-traveladvisor') . "</span><br/>";
			$error = 1;
			$error_result = 1;
		} elseif ( ! filter_var($user_email, FILTER_VALIDATE_EMAIL) ) {
			$results = " '" . $email . "' " . __('email address is not valid.', 'cs-traveladvisor');
			$error = 1;
			$error_result = 1;
		}
		if ( $error <> 1 ) {
			$headers = "From: " . $user_email . "\r\n";
			$headers .= "Reply-To: " . $user_email . "\r\n";
			$headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
			$headers .= "MIME-Version: 1.0" . "\r\n";
			$contents.= '<table border="2"><tr><th>User Name:</th><th>Tour Title:</th><th>User Email:</th><th>Date:</th><th>Adults:</th><th>Children:</th><th>Infants:</th></tr>';
			$contents.= '<tr<td>' . $user_name . '</td><td>' . $traveladvisor_tour_title . '</td><td>' . $user_email . '</td><td>' . $date . '</td><td>' . $adults . '</td><td>' . $children . '</td><td>' . $infants . '</td></tr><table>';
			$respose = mail($to, $subject, $contents, $headers);
			if ( $respose ) {
				$error = 0;
				$error_result = 0;
				$results = __("&nbsp; <span style=\"color: #060;\">Your inquery has been sent organizer will contact you shortly</span>", "cs-traveladvisor");
			} else {
				$error = 1;
				$error_result = 1;
				$results = __("&nbsp; <span style=\"color: #ff0000;\">*The mail could not be sent due to some resons, Please try again</span>", "cs-traveladvisor");
			}
		}
		if ( $error_result == 1 ) {
			$data = 1;
			$message = $results;
			die($message);
		} else {
			$data = 0;
			$message = $results;
			die($message);
		}
	}

	// creating Ajax call for WordPress
	add_action('wp_ajax_nopriv_ajaxcontact_send_mail', 'ajaxcontact_send_mail');
	add_action('wp_ajax_ajaxcontact_send_mail', 'ajaxcontact_send_mail');
}
