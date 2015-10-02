<tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0">
    <th colspan="4" scope="col"><h2><?php _e('Custom Styles', ACP_Core::$TEXT_DOMAIN); ?></h2></th>
</tr>
<tr>
    <th scope="row">
        <?php _e('Custom CSS Code', ACP_Core::$TEXT_DOMAIN); ?>:
    </th>
    <td colspan="3">
        <label title="Custom CSS Code">
            <textarea rows="10" cols="50" name="acp_custom_css" id="acp_custom_css"><?php echo isset($this->acp_options_serialized->acp_custom_css) ? $this->acp_options_serialized->acp_custom_css : ''; ?></textarea>
        </label><br>
    </td>
</tr>