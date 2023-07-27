<?php
/*
 * Template for Gallery Default View
 */
//global $traveladvisor_var_gallery_elements, $traveladvisor_var_wp_traveladvisor_core, $wp_traveladvisor;
$traveladvisor_var_gallery_default = array('traveladvisor_var_gallery_elements', 'traveladvisor_var_static_text', 'traveladvisor_var_wp_traveladvisor_core', 'wp_traveladvisor');
$traveladvisor_var_gallery_default_return = TRAVELADVISOR_VAR_GLOBALS()->globalizing($traveladvisor_var_gallery_default);
extract($traveladvisor_var_gallery_default_return);
$strings = new traveladvisor_plugin_all_strings;
$strings->traveladvisor_plugin_activation_strings();
extract($wp_query->query_vars);
$title_limit = 5;
$query = new WP_Query($args);
$post_count = $query->post_count;
$traveladvisor_var_rand = $traveladvisor_var_gallery_elements['traveladvisor_var_rand'];
$traveladvisor_var_gallery_column = $traveladvisor_var_gallery_elements['traveladvisor_var_gallery_column'];
$traveladvisor_var_gallery_item_per_page = $traveladvisor_var_gallery_elements['traveladvisor_var_gallery_item_per_page'];
$traveladvisor_var_gallery_paging_filter_style = $traveladvisor_var_gallery_elements['traveladvisor_var_gallery_paging_filter_style'];
?>
<div class="row">
    <?php
    $colum = isset($traveladvisor_var_gallery_column) ? $traveladvisor_var_gallery_column : '3';
    ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php
        $rand = $traveladvisor_var_rand;
        while ($query->have_posts()) : $query->the_post();
            $traveladvisor_var_gallery_images = get_post_meta($post->ID, 'traveladvisor_var_list_gallery_url', true);
            $traveladvisor_var_list_gallery_title = get_post_meta($post->ID, 'traveladvisor_var_list_gallery_title', true);
			$traveladvisor_var_list_gallery_desc = get_post_meta($post->ID, 'traveladvisor_var_list_gallery_desc', true);
            $count_images = 0;
            $count_images = count($traveladvisor_var_gallery_images);
            if (isset($traveladvisor_var_gallery_images) && $traveladvisor_var_gallery_images != '') {
                if ($traveladvisor_var_gallery_images[0] != '') {
                    ?>
                    <div class="col-lg-<?php echo esc_html($colum); ?> col-md-<?php echo esc_html($colum); ?> col-sm-6 col-xs-12">
                        <div class="cs-gallery grid">
                            <div class="cs-media">
                                <ul class="cs-gallery grid gallery">
                                    <?php
                                    $display_check = 1;
                                    foreach ($traveladvisor_var_gallery_images as $key => $img_url) {
                                        $traveladvisor_var_img_id = $traveladvisor_var_wp_traveladvisor_core->traveladvisor_var_get_attachment_id($img_url);
                                        $traveladvisor_var_src = wp_get_attachment_image_src($traveladvisor_var_img_id, 'traveladvisor_var_media_2');
                                        if ($display_check == 1) {
                                            $display = '';
                                        } else {
                                            $display = ' style="display:none;"';
                                        }
                                        $display_check++;
                                        ?>	
                                        <li <?php echo $display; ?> class="cs-media">
                                            <a href="<?php echo esc_url($img_url); ?>" rel="prettyPhoto[gallery_<?php echo $rand; ?>]" title="<?php echo $traveladvisor_var_list_gallery_desc[$key]; ?>">
                                                <figure>
                                                    <img src="<?php echo esc_url($traveladvisor_var_src[0]); ?>" alt="<?php echo $traveladvisor_var_list_gallery_title[$key]; ?>" />
                                                    <figcaption>
                                                        <span class="cs-bgcolor"><?php echo $count_images; ?> <?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_photos'); ?></span>
                                                        <div class="media-title">
                                                            <h4><?php the_title(); ?></h4>
                                                            <em><?php echo get_the_date(); ?></em>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </a>
                                        </li>
                                    <?php }
                                    ?> 
                                </ul>
                            </div>
                            <div class="cs-text">
                                <h4><?php the_title(); ?></h4>
                                <span><?php echo get_the_date(); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }$rand++;
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
</div>
<?php
wp_reset_postdata();