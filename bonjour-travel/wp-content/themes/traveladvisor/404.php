<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Traveladvisor
 * @since Traveladvisor
 */
get_header();
$traveladvisor_subheader_pic = $traveladvisor_var_options['traveladvisor_var_sub_header_bg_img'];
$strings = new traveladvisor_theme_all_strings;
$strings->traveladvisor_short_code_strings();
?>

<div class="main-section">
    <div class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-error-content">
                        <span><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_page_not_found'); ?></span>
                        <strong><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_404'); ?><em><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_error'); ?></em></strong>                            
                        <p><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_sorry_the_page_you_are_looking_for_does_not_exist'); ?></p>
                        <form action="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <div class="input-holder">
                                <i class="icon-envelope2"> </i>
                                <input type="text" name="s" placeholder="<?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_enter_any_thing_to_search'); ?>">
                                <input type="submit" value="Search">
                            </div>                       	
                        </form>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_return_to_homepage'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--</main> .site-main -->
<?php //get_sidebar('content-bottom'); ?>
<!--</div> .content-area -->
<?php get_footer(); ?>
