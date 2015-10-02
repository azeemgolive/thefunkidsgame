<tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0">
    <th colspan="4" scope="col"><h2><?php _e('Pagination Button Style', ACP_Core::$TEXT_DOMAIN); ?></h2></th>
</tr>

<tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
    <th scope="row">
        <label for="acp_buttons_border_css"><?php _e('Button Border CSS', ACP_Core::$TEXT_DOMAIN); ?>:</label>
    </th>
    <td colspan="3">
        <input type="text" class="regular-text" value="<?php echo $this->acp_options_serialized->acp_buttons_border_css; ?>" id="acp_buttons_border_css" name="acp_buttons_border_css" placeholder="<?php _e('Example: 1px solid #ff0000', ACP_Core::$TEXT_DOMAIN); ?>"/>
    </td>
</tr>

<tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
    <th scope="row">
        <label for="acp_buttons_background_css"><?php _e('Button Background Color', ACP_Core::$TEXT_DOMAIN); ?>: </label>
    </th>
    <td class="picker_input_cell">
        <input type="text" class="regular-text" value="<?php echo $this->acp_options_serialized->acp_buttons_background_css; ?>" id="acp_buttons_background_css" name="acp_buttons_background_css" placeholder="<?php _e('Example: #0000ff', ACP_Core::$TEXT_DOMAIN); ?>"/>
    </td>

    <td class="picker_img_cell">
        <a href="#openModal1">
            <img class="colorpicker_img1" src="<?php echo plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/img/colorpicker_icon_22.png'); ?>" />
        </a>
    </td>
    <td class="color_picker">
        <div id="openModal1" class="acp_modalDialog">
            <div id="box1" style="border-top-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px; border-bottom-left-radius: 10px;">
                <a href="#close" title="Close" class="close">X</a>
                <h2><?php _e('Color Picker', ACP_Core::$TEXT_DOMAIN); ?></h2>
                <p id="colorpickerHolder1"></p>
            </div>
        </div>
    </td>
</tr>

<tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
    <th scope="row">
        <label for="acp_buttons_background_hover_css"><?php _e('Button Hover Background Color', ACP_Core::$TEXT_DOMAIN); ?>: </label>
    </th>
    <td>
        <input type="text" class="regular-text" value="<?php echo $this->acp_options_serialized->acp_buttons_background_hover_css; ?>" id="acp_buttons_background_hover_css" name="acp_buttons_background_hover_css" placeholder="<?php _e('Example: #00ff00', ACP_Core::$TEXT_DOMAIN); ?>"/>
    </td>

    <td class="picker_img_cell">
        <a href="#openModal2">
            <img class="colorpicker_img2" src="<?php echo plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/img/colorpicker_icon_22.png'); ?>" />
        </a>
    </td>
    <td class="color_picker">
        <div id="openModal2" class="acp_modalDialog">
            <div id="box2">
                <a href="#close" title="Close" class="close">X</a>
                <h2><?php _e('Color Picker', ACP_Core::$TEXT_DOMAIN); ?></h2>
                <p id="colorpickerHolder2"></p>
            </div>
        </div>
    </td>
</tr>

<tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
    <th scope="row">
        <label for="acp_buttons_font_css"><?php _e('Button Text Font', ACP_Core::$TEXT_DOMAIN); ?>:  </label>
    </th>
    <td colspan="3">
        <input type="text" class="regular-text" value="<?php echo $this->acp_options_serialized->acp_buttons_font_css; ?>" id="acp_buttons_font_css" name="acp_buttons_font_css" placeholder="<?php _e('Example: Times New Roman, Times, serif', ACP_Core::$TEXT_DOMAIN); ?>"/>
    </td>
</tr>

<tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
    <th scope="row">
        <label for="acp_buttons_text_color_css"><?php _e('Button Text Color', ACP_Core::$TEXT_DOMAIN); ?>: </label>
    </th>
    <td>
        <input type="text" class="regular-text" value="<?php echo $this->acp_options_serialized->acp_buttons_text_color_css; ?>" id="acp_buttons_text_color_css" name="acp_buttons_text_color_css" placeholder="<?php _e('Example: #f0000f', ACP_Core::$TEXT_DOMAIN); ?>"/>
    </td>

    <td class="picker_img_cell">
        <a href="#openModal3">
            <img class="colorpicker_img3" src="<?php echo plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/img/colorpicker_icon_22.png'); ?>" />
        </a>
    </td>
    <td class="color_picker">
        <div id="openModal3" class="acp_modalDialog">
            <div id="box3">
                <a href="#close" title="Close" class="close">X</a>
                <h2><?php _e('Color Picker', ACP_Core::$TEXT_DOMAIN); ?></h2>
                <p id="colorpickerHolder3"></p>
            </div>
        </div>
    </td>
</tr>
<tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
    <th scope="row">
        <label for="acp_buttons_hover_text_color"><?php _e('Button Hover Text Color', ACP_Core::$TEXT_DOMAIN); ?>: </label>
    </th>
    <td>
        <input type="text" class="regular-text" value="<?php echo $this->acp_options_serialized->acp_buttons_hover_text_color; ?>" id="acp_buttons_hover_text_color" name="acp_buttons_hover_text_color" placeholder="<?php _e('Example: #000000', ACP_Core::$TEXT_DOMAIN); ?>"/>
    </td>
    <td class="picker_img_cell">
        <a href="#openModal6">
            <img class="colorpicker_img6" src="<?php echo plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/img/colorpicker_icon_22.png'); ?>" />
        </a>
    </td>
    <td class="color_picker">
        <div id="openModal6" class="acp_modalDialog">
            <div id="box6">
                <a href="#close" title="Close" class="close">X</a>
                <h2><?php _e('Color Picker', ACP_Core::$TEXT_DOMAIN); ?></h2>
                <p id="colorpickerHolder6"></p>
            </div>
        </div>
    </td>
</tr>

<tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0">
    <th scope="row">
        <label for="acp_buttons_title_size_css"><?php _e('Button Title Size', ACP_Core::$TEXT_DOMAIN); ?>: </label>
    </th>
    <td colspan="3">
        <select id="acp_buttons_title_size_css" name="acp_buttons_title_size_css">
            <?php $acp_btns_text_size = $this->acp_options_serialized->acp_buttons_title_size_css; ?>
            <option value="10px" <?php selected($acp_btns_text_size, '10px'); ?>>10px</option>
            <option value="11px" <?php selected($acp_btns_text_size, '11px'); ?>>11px</option>
            <option value="12px" <?php selected($acp_btns_text_size, '12px'); ?>>12px</option>
            <option value="13px" <?php selected($acp_btns_text_size, '13px'); ?>>13px</option>
            <option value="14px" <?php selected($acp_btns_text_size, '14px'); ?>>14px</option>
            <option value="15px" <?php selected($acp_btns_text_size, '15px'); ?>>15px</option>
            <option value="16px" <?php selected($acp_btns_text_size, '16px'); ?>>16px</option>
            <option value="17px" <?php selected($acp_btns_text_size, '17px'); ?>>17px</option>
            <option value="18px" <?php selected($acp_btns_text_size, '18px'); ?>>18px</option>
            <option value="19px" <?php selected($acp_btns_text_size, '19px'); ?>>19px</option>
            <option value="20px" <?php selected($acp_btns_text_size, '20px'); ?>>20px</option>
        </select>
    </td>
</tr>

<tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
    <th scope="row">
        <?php _e('Carousel Buttons Arrows Fixed Position', ACP_Core::$TEXT_DOMAIN); ?>:
    </th>
    <td colspan="3">                                
        <label for="acp_buttons_is_arrow_fixed">
            <input type="checkbox" <?php checked($this->acp_options_serialized->acp_buttons_is_arrow_fixed == 1) ?> value="1" name="acp_buttons_is_arrow_fixed" id="acp_buttons_is_arrow_fixed" />
        </label>
    </td>
</tr>