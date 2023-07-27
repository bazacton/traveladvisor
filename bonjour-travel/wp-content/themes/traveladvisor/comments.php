<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Traveladvisor
 * @since Traveladvisor
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
if (have_comments()) :
    if (function_exists('the_comments_navigation')) {
        the_comments_navigation();
    }
    ?> 
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div id="comments" class="cs-comments">
            <h3 class="comments-title">
                <?php
                $strings = new traveladvisor_theme_all_strings;
                $strings->traveladvisor_short_code_strings();
                $strings->traveladvisor_theme_strings();
                $comments_number = get_comments_number();
                if (1 === $comments_number) {
                    /* translators: %s: post title */
                    printf(_x('One thought on &ldquo;%s&rdquo;', 'comments title', 'traveladvisor'), get_the_title());
                } else {
                    printf(
                            /* translators: 1: number of comments, 2: post title */
                            _nx(
                                    '%1$s comment', '%1$s comments', $comments_number, 'comments title', 'traveladvisor'
                            ), number_format_i18n($comments_number), get_the_title()
                    );
                }
                ?>
            </h3>
            <ul>
                <?php wp_list_comments(array('callback' => 'traveladvisor_var_comment')); ?>
            </ul>	
        </div>
    </div><!-- .comment-list -->
    <?php
    if (function_exists('the_comments_navigation')) {
        the_comments_navigation();
    }
endif; // Check for have_comments().  
// If comments are closed and there are comments, let's leave a little note, shall we?
if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
    ?>
    <p class="no-comments"><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_comments_are_closed'); ?></p>
<?php endif; ?>

<div id="respond" class="cs-contact-form">

        <?php
		add_filter( 'comment_form_default_fields', 'tu_filter_comment_fields', 20 );
		function tu_filter_comment_fields( $fields ) {
			$commenter = wp_get_current_commenter();

			$consent   = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

			$fields['cookies'] = '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' . '<label for="wp-comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label></p></div>';

			return $fields;
		}
        $traveladvisor_msg_class = '';
        if (is_user_logged_in()) {
            $traveladvisor_msg_class = ' cs-message';
        }
        $var_arrays = array('post_id');
        $comment_global_vars = TRAVELADVISOR_VAR_GLOBALS()->globalizing($var_arrays);
        extract($comment_global_vars);
        $you_may_use = traveladvisor_var_theme_text_srt('traveladvisor_var_you_may_use_this');
        $must_login = '<a href="%s">You must be logged in to post a comment</a>';
        $logged_in_as = '<a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">' . traveladvisor_var_theme_text_srt('traveladvisor_var_log_out') . '</a>' . traveladvisor_var_theme_text_srt('traveladvisor_var_logged_in_as');
        $required_fields_mark = ' ' . traveladvisor_var_theme_text_srt('traveladvisor_var_required_files_are_marked');
        $required_text = sprintf($required_fields_mark, '<span class="required">*</span>');
        $defaults = array(
            'fields' => apply_filters('comment_form_default_fields', array(
                // 'notes' => '<span class="cs-error">' .  traveladvisor_var_theme_text_srt('traveladvisor_var_error_notice'). '</span>',
                'author' => '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><div class="input-holder">
                <label>' . traveladvisor_var_theme_text_srt('traveladvisor_var_name') . '</label><i class="icon-user"></i>
                    <input id="author"  name="author" class="nameinput" type="text" placeholder="' . traveladvisor_var_theme_text_srt('traveladvisor_var_full_name') . '" value=""' .
                esc_attr($commenter['comment_author']) . ' tabindex="1"></div></div>' .
                '<!-- #form-section-author .form-section -->',
                'email' => '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><div class="input-holder">' .
                '<label>' . traveladvisor_var_theme_text_srt('traveladvisor_var_email') . '</label><i class="icon-envelope"></i>
                <input id="email" name="email" class="emailinput" type="text" placeholder="' . traveladvisor_var_theme_text_srt('traveladvisor_var_please_enter_email_address') . '"  value=""' .
                esc_attr($commenter['comment_author_email']) . ' size="30" tabindex="2">' .
                '</div></div>'
                . '<!-- #form-section-email .form-section -->',
                'url' => '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><div class="input-holder">' .
                '<label>' . traveladvisor_var_theme_text_srt('traveladvisor_var_website') . '</label><i class="icon-phone3"></i>
                    <input id="url" name="url" type="text" class="websiteinput" placeholder="' . traveladvisor_var_theme_text_srt('traveladvisor_var_url') . '" value="" size="30" tabindex="3">' .
                '</div></div>'
            )),
            'comment_field' => '<div class="input-holder">' . $traveladvisor_msg_class . '">
             <label>' . traveladvisor_var_theme_text_srt('traveladvisor_var_message') . '</label>
            <textarea id="comment_mes" name="comment"  placeholder="' . traveladvisor_var_theme_text_srt('traveladvisor_var_text_here') . '" class="commenttextarea" rows="55" cols="15"></textarea>' .
            '</div>',
            'must_log_in' => '<span class="comment-login-option">' . sprintf($must_login, wp_login_url(apply_filters('the_permalink', get_permalink($post_id)))) . '</span>',
            'logged_in_as' => '<span class="comment-login-option">' . sprintf($logged_in_as, admin_url('profile.php'), $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink($post_id)))) . '</span>',
            'comment_notes_before' => '',
            'comment_notes_after' => '',
            'class_form' => 'comment-form contact-form',
            'id_form' => 'form-style',
            'class_submit' => 'cs-button cs-bgcolor csborder-color',
            'id_submit' => 'cs-bg-color',
            'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title col-lg-12 col-md-12 col-sm-12 col-xs-12">',
            'title_reply_after' => '</h3>',
            'title_reply' => traveladvisor_var_theme_text_srt('traveladvisor_var_post_a_comment'),
            'title_reply_to' => '<h2 class="cs-section-title">' . traveladvisor_var_theme_text_srt('traveladvisor_var_leave_a_comment') . '</h2>',
            'cancel_reply_link' => traveladvisor_var_theme_text_srt('traveladvisor_var_cancel_reply'),
            'label_submit' => traveladvisor_var_theme_text_srt('traveladvisor_var_post_comments'),
        );
        comment_form($defaults, $post_id);
        ?>
  
</div>

<!-- .comments-area -->