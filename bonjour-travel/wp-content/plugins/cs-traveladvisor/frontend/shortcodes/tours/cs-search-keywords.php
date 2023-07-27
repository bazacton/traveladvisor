<?php if (isset($qrystr) && $qrystr != '') { ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <ul class="cs-listing-categories">
            <?php
            //get all query string
            if (isset($qrystr)) {
                $qrystr_arr = getMultipleParameters($qrystr);
                foreach ($qrystr_arr as $qry_var => $qry_val) {
                    if ($qry_val != '') {
                        if (!is_array($qry_val))
                            if (strpos($qry_val, ',') !== FALSE) {
                                $qry_val = explode(",", $qry_val);
                            }
                        // only if specialism child selected
                        if (is_array($qry_val)) {
                            foreach ($qry_val as $qry_val_var => $qry_val_value) {
                                if ($qry_val_value != '') {
                                    echo "<li id='editt'>";
                                    if ($qry_var == 'specialisms') { // only one remove the specialism
                                        if (strpos($qrystr, ',' . $qry_val_value) !== FALSE) {
                                            $speciliasim_new_qry = str_replace(',' . $qry_val_value, "", $qrystr);
                                        } else if (strpos($qrystr, $qry_val_value . ',') !== FALSE) {
                                            $speciliasim_new_qry = str_replace($qry_val_value . ',', "", $qrystr);
                                        } else {
                                            $speciliasim_new_qry = str_replace($qry_val_value, "", $qrystr);
                                        }

                                        echo '<a href="?' . $speciliasim_new_qry . '">' . str_replace("+", " ", $qry_val_value) . ' <i class="icon-cross3"></i></a>';
                                    } else {
                                        $qrystr1 = str_replace("&" . $qry_var . '[]=' . $qry_val_value, "", $qrystr);
                                        $qrystr1 = str_replace("&" . $qry_var . '=' . $qry_val_value, "", $qrystr);

                                        echo '<a href="?' . $qrystr1 . '">' . str_replace("+", " ", $qry_val_value) . ' <i class="icon-cross3"></i></a>';
                                    }

                                    echo '</li>';
                                }
                            }
                        } else {
                            echo '<li>';
                            if ($qry_var == 'specialisms') { // only remove the 
                                if (strpos($qrystr, ',' . $qry_val) !== FALSE) {
                                    $speciliasim_new_qry = str_replace(',' . $qry_val, "", $qrystr);
                                } elseif (strpos($qrystr, $qry_val . ",") !== FALSE) {
                                    $speciliasim_new_qry = str_replace($qry_val . ",", "", $qrystr);
                                } else {
                                    $speciliasim_new_qry = str_replace($qry_val, "", $qrystr);
                                }
                                echo '<a href="?' . $speciliasim_new_qry . '">' . str_replace("+", " ", $qry_val) . ' <i class="icon-cross3"></i></a>';
                            } else {
                                echo '<a href="' . traveladvisor_remove_qrystr_extra_var($qrystr, $qry_var) . '">' . str_replace("+", " ", $qry_val) . ' <i class="icon-close"></i></a>';
                            }
                            echo '</li>';
                        }
                    }
                }
            }
            ?>
            <a class="clear-tags" href="<?php echo esc_url(get_permalink()); ?>"><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_tours_clear_all') ?></a>
        </ul>

    </div>

<?php } ?>
