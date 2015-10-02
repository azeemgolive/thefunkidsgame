<tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0">
    <th colspan="4" scope="col"><h2><?php _e('Pagination Button Layout', ACP_Core::$TEXT_DOMAIN); ?></h2></th>
</tr>

<tr>
    <th scope="row">
        <?php _e('Display Only Previous and Next Buttons', ACP_Core::$TEXT_DOMAIN); ?>:
<p style="font-size:13px; color:#666666; margin:0px; "><?php _e('This option is only related to the first and second layouts. Allows to only show the previous and next titles in subPage buttons.', ACP_Core::$TEXT_DOMAIN); ?></p>
</th>
<td colspan="3">
    <label title="Only Prev/Next Buttons">
        <?php $acp_buttons_prev_next = isset($this->acp_options_serialized->acp_buttons_prev_next) ? $this->acp_options_serialized->acp_buttons_prev_next : 0; ?>
        <input type="checkbox" <?php checked($acp_buttons_prev_next == 1); ?> value="1" name="acp_buttons_prev_next" id="acp_buttons_prev_next"/> 
    </label><br>
</td>
</tr>

<tr class="paging_btn_layout type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
    <th scope="row"><?php _e('Pagination Button Style', ACP_Core::$TEXT_DOMAIN); ?>:</th>
    <td colspan="3">
        <fieldset>
            <?php
            $acp_btns_visual_style = $this->acp_options_serialized->acp_buttons_visual_style;
            ?>
            <label title="Title">
                <input type="radio" <?php checked($acp_btns_visual_style == 1); ?> value="1" name="acp_buttons_visual_style" id="t_button" /> 
                <span>
                    <img src="<?php echo plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/img/t_button.png'); ?>" align="absmiddle" style="padding:3px 5px;"  />
                </span>
            </label><br>
            <label title="Title and Number">
                <input type="radio" <?php checked($acp_btns_visual_style == 2); ?> value="2" name="acp_buttons_visual_style" id="nt_button" /> 
                <span>
                    <img src="<?php echo plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/img/nt_button.png'); ?>" align="absmiddle" style="padding:3px 5px;" />
                </span>
            </label><br>
            <label title="Next and Prev">
                <input type="radio" <?php checked($acp_btns_visual_style == 4); ?> value="4" name="acp_buttons_visual_style" id="nt_button" /> 
                <span>
                    <img src="<?php echo plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/img/pn_button.png'); ?>" align="absmiddle" style="padding:3px 5px;"  />
                </span>
            </label><br>
        </fieldset>
    </td>
</tr>

