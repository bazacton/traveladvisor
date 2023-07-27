<?php
$var_arrays = array( 'post', 'traveladvisor_var_static_text' );
$header_global_vars = TRAVELADVISOR_VAR_GLOBALS()->globalizing( $var_arrays );
extract( $header_global_vars );
$traveladvisor_var_options = TRAVELADVISOR_VAR_GLOBALS()->theme_options();
$strings = new traveladvisor_theme_all_strings;
$strings->traveladvisor_short_code_strings();

$default_theme_option_header_style = $traveladvisor_var_options['traveladvisor_var_header_style'];
if ( isset( $traveladvisor_var_options['traveladvisor_var_coming_soon_switch'] ) && $traveladvisor_var_options['traveladvisor_var_coming_soon_switch'] == 'on' && isset( $traveladvisor_var_options['traveladvisor_var_maintinance_mode_page'] ) && $traveladvisor_var_options['traveladvisor_var_maintinance_mode_page'] != get_the_id() && ! is_user_logged_in() ) {
    if ( $traveladvisor_var_options['traveladvisor_var_maintinance_mode_page'] != '' && $traveladvisor_var_options['traveladvisor_var_maintinance_mode_page'] != '0' ) {
        wp_redirect( get_permalink( $traveladvisor_var_options['traveladvisor_var_maintinance_mode_page'] ) );
    } else {
        echo '<script>
                alert("' . traveladvisor_var_theme_text_srt( 'traveladvisor_var_please_select_a_maintenance_page' ) . '";
             </script>';
    }
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>        
        <?php
        $traveladvisor_var_layout = $traveladvisor_var_options['traveladvisor_var_layout'];
        $traveladvisor_var_book_now = $traveladvisor_var_options['traveladvisor_var_book_now'];
        ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
            <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php endif; ?>
        <?php
        if ( function_exists( 'traveladvisor_var_load_fonts' ) ) {
            traveladvisor_var_load_fonts();
        }

        wp_head();
        ?>
    </head>
    <?php
    
    ?>
    <body <?php body_class() ?>  >
        <?php
        $traveladvisor_posttype = get_post_type( get_the_id() );
        if ( isset( $traveladvisor_var_layout ) && $traveladvisor_var_layout == 'boxed' ) {
            $traveladvisor_var_layout = 'wrapper-boxed';
        }
        ?>
        <div class="wrapper <?php echo esc_attr( $traveladvisor_var_layout ); ?>" > 
            <div id="overlay"></div>
            <?php
            if ( isset( $traveladvisor_var_options['traveladvisor_var_autosidebar'] ) ? $traveladvisor_var_options['traveladvisor_var_autosidebar'] : '' == 'on' ) {
                ?>
                <div id="mobile-menu">
                    <ul class="mobile-menu">
                        <li>
                            <div class="mm-search">
                                <form  name="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <div class="input-group">
                                        <input type="text" id="srch-term" name="s"
                                               placeholder="<?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_header_search_placeholder' ); ?>" 
                                               class="form-control simple">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="icon-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                    <?php
                    dynamic_sidebar( $traveladvisor_var_options['traveladvisor_var_autosidebar_select'] );
                    ?>
                </div>
                <?php
            }
            $traveladvisor_var_current_page_header = get_post_meta( get_the_id(), 'traveladvisor_var_header_style', 'true' );
            $traveladvisor_var_post_type = get_post_type( get_the_id() );
            if ( isset( $traveladvisor_var_options['traveladvisor_var_maintinance_mode_page'] ) &&
                    $traveladvisor_var_options['traveladvisor_var_maintinance_mode_page'] == get_the_id() &&
                    isset( $traveladvisor_var_options['traveladvisor_var_header_switch'] ) &&
                    $traveladvisor_var_options['traveladvisor_var_header_switch'] != 'on' && ! is_404() ) {
						 get_template_part( 'template/cs-header/cs-header-classic' );
                echo '<div class="cs-noheader"></div>';
            } else {
                if ( isset( $traveladvisor_var_current_page_header ) && $traveladvisor_var_current_page_header == 'default_header_style' && $traveladvisor_var_post_type == 'page' ) {              
				   get_template_part( 'template/cs-header/cs-header-classic' );
                } else {
                    if ( $default_theme_option_header_style == 'default' ) {
                        get_template_part( 'template/cs-header/cs-header-classic' );
                    }
                }
            }
            $traveladvisor_posttype = get_post_type( get_the_id() );
            if ( $traveladvisor_posttype <> "tours" || is_search() || is_category() || is_home() || is_404() ) {
                if ( function_exists( 'traveladvisor_var_subheader_style' ) ) {
                    traveladvisor_var_subheader_style();
                }
            }
            ?>
            <!-- Header End --> 
