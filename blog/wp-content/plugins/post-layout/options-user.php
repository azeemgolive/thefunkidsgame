<?php

function pstl_field_textarea2($name) {
    global $options;

    echo '<textarea style="width: 550px;" wrap="off" id="' . $name . '" rows="5" name="options[' . $name . ']">' . htmlspecialchars($options[$name]) . '</textarea>';
}

$pstl_categories = get_categories();

function pstl_print_categories($prefix) {
    global $pstl_categories, $options;
    echo '<select onchange="pstl_change_category(this, \'' . $prefix . '\')">';

    echo '<option value="">- default -</option>';
    foreach ($pstl_categories as $c) {
        echo '<option value="' . $c->cat_ID . '">' . $c->cat_name . ((trim($options[$prefix . $c->cat_ID]) != '') ? ' *' : '') . '</option>';
    }
    echo '</select>';
}

function pstl_print_textareas($prefix) {
    global $pstl_categories, $options;
    echo '<textarea style="width: 500px;" wrap="off" rows="5" id="' . $prefix . '" name="options[' . $prefix . ']">' . htmlspecialchars($options[$prefix]) . '</textarea><br />';
    foreach ($pstl_categories as $c) {
        echo '<textarea style="width: 500px; display: none" wrap="off" rows="5" id="' . $prefix . $c->cat_ID . '" name="options[' . $prefix . $c->cat_ID . ']">' . htmlspecialchars($options[$prefix . $c->cat_ID]) . '</textarea>';
    }
}

if (isset($_POST['save'])) {
    if (!wp_verify_nonce($_POST['_wpnonce'], 'save')) die('Securety violated');
    $options = stripslashes_deep($_POST['options']);
    foreach ($options as $key => $value) {
        if (trim($value) == '') unset($options[$key]);
    }
    update_option('pstl' . $user_ID, $options);
}
else {
    $options = get_option('pstl' . $user_ID);
}

$pstl_img_right = get_option('siteurl') . '/wp-content/plugins/post-layout/images/right.gif';
$pstl_img_down = get_option('siteurl') . '/wp-content/plugins/post-layout/images/down.gif';
?>
<script type="text/javascript">
    var pstl_current_id = new Object();
    function pstl_change_category(s, prefix)
    {
        var current_id = prefix;
        if (pstl_current_id[prefix] != null) current_id = pstl_current_id[prefix];
        document.getElementById(current_id).style.display = "none";
        document.getElementById(prefix + s.value).style.display = "inline";
        pstl_current_id[prefix] = prefix + s.value;
    }

    function pstl_show_hide(id)
    {
        var d = document.getElementById("div_" + id);
        var i = document.getElementById("img_" + id);
        if (d.style.display == "none") {
            d.style.display = "block";
            i.src = "<?php echo $pstl_img_down; ?>";
        }
        else {
            d.style.display = "none";
            i.src = "<?php echo $pstl_img_right; ?>";
        }
    }
</script>
<div class="wrap">

        <div id="satollo-header">
            <a href="http://www.satollo.net/plugins/comment-notifier" target="_blank">Get Help</a>
            <a href="http://www.satollo.net/forums" target="_blank">Forum</a>

            <form style="display: inline; margin: 0;" action="http://www.satollo.net/wp-content/plugins/newsletter/do/subscribe.php" method="post" target="_blank">
                Subscribe to satollo.net <input type="email" name="ne" required placeholder="Your email">
                <input type="hidden" name="nr" value="comment-notifier">
                <input type="submit" value="Go">
            </form>
            <!--
            <a href="https://www.facebook.com/satollo.net" target="_blank"><img style="vertical-align: bottom" src="http://www.satollo.net/images/facebook.png"></a>
            -->
            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=5PHGDGNHAYLJ8" target="_blank"><img style="vertical-align: bottom" src="http://www.satollo.net/images/donate.png"></a>
            <a href="http://www.satollo.net/donations" target="_blank">Even <b>1$</b> helps: read more</a>
        </div>
        <h2>Post Layout - User Configurations</h2>


    <form method="post">
        <?php wp_nonce_field('save') ?>
        <a name="pstl_post"></a>
        <h3>
            <a href="javascript:pstl_show_hide('post')"><img id="img_post" src="<?php echo $pstl_img_right; ?>" border="0"/></a> 
            Single post
        </h3> 

        <div id="div_post" style="display: none">
            <p>
                The codes below will be used when a single post is showed and 
                added before, after or in the middle of the post. If you specify a code
                for a category, it will be used in place of the "default" code. You can "merge" the
                "default" code and the category code, using the tag [default] in the
                category code.
            </p>

            <h4>Code to add before the post</h4> 

            <p>
                Category: <?php pstl_print_categories('post_before'); ?><br />
                <?php pstl_print_textareas('post_before'); ?>
            </p>

            <h4>Code to add <strong>in the "more" break point</strong> of a post</h4>
            <p>
                Category: <?php pstl_print_categories('post_more'); ?><br />
                <?php pstl_print_textareas('post_more'); ?><br />
                Suspend if post length is less than <input type="text" size="6" name="options[post_more_size]" value="<?php echo htmlspecialchars($options['post_more_size']); ?>"/> characters
            </p>

            <h4>Code to add after the post</h4>
            <p>
                Category: <?php pstl_print_categories('post_after'); ?><br />
                <?php pstl_print_textareas('post_after'); ?>
            </p>        

            <p class="submit"><input type="submit" name="save" value="Save"/></p>

        </div>


        <a name="pstl_page"></a>
        <h3>
            <a href="javascript:pstl_show_hide('page')"><img id="img_page" src="<?php echo $pstl_img_right; ?>" border="0"/></a>
            Page
        </h3>
        <div id="div_page" style="display: none">
            <h4>Code to add <strong>before</strong> the page</h4>
            <p>
                <?php pstl_field_textarea2('page_before'); ?>
            </p>

            <h4>Code after the page</h4>
            <p>
                <?php pstl_field_textarea2('page_after'); ?>
            </p>

            <p class="submit"><input type="submit" name="save" value="Save"/></p>

        </div>


        <a name="pstl_home"></a>
        <h3>
            <a href="javascript:pstl_show_hide('home')"><img id="img_home" src="<?php echo $pstl_img_right; ?>" border="0"/></a>
            Home and tags and categories pages
        </h3>
        <div id="div_home" style="display: none">
            <h4>To add before the post content</h4>
            <p>
                <?php pstl_field_textarea2('home_before'); ?>
            </p>

            <h4>To add after the post content</h4>
            <p>
                <?php pstl_field_textarea2('home_after'); ?>
            </p>

            <p class="submit"><input type="submit" name="save" value="Save"/></p>
        </div>

        <h3>
            <a href="javascript:pstl_show_hide('comment')"><img id="img_comment" src="<?php echo $pstl_img_right; ?>" border="0"/></a>
            Comments
        </h3>
        <div id="div_comment" style="display: none">
            <p>
                Be aware that after a lot of experimenting and usages, I found out that injecting AdSense
                in the comment area doesn't produce interesting results.
            </p>
            <h4>Code to add after the comment form</h4>
            <p>
                <?php pstl_field_textarea2('comment_form'); ?>
            </p>

            <h4>Code after the last comment</h4>
            <p>
                <?php pstl_field_textarea2('comment_last'); ?>
                <br />
                (may not work properly with comment pagination)
            </p>    

            <!-- pstl_field_textarea('comment_after', 'Code after the current comment'); -->
            <p class="submit"><input type="submit" name="save" value="Save"/></p>
        </div>

        <a name="pstl_mobile"></a>
        <h3>
            <a href="javascript:pstl_show_hide('mobile')"><img id="img_mobile" src="<?php echo $pstl_img_right; ?>" border="0"/></a>
            Mobile configuration
        </h3>
        <div id="div_mobile" style="display: none">
            <p>
                If mobile detection is active (see "General Options") the code blocks below are used. Not only you can
                modified the blog behaviour for mobile devices, but in this way you can use the AdSense for mobile
                PHP code.
            </p>

            <p>
                <input type="checkbox" name="options[mobile]" value="1" <?php echo ($options['mobile'] != null ? 'checked' : ''); ?> />
                <label for="options[mobile]">Enable mobile user agents detection</label>
            </p>

            <h4>Single post code blocks</h4>
            <p>
                Code to add before the post content<br />
                <?php pstl_field_textarea2('post_before_mobile'); ?>
            </p>

            <p>
                Code to add in the middle of the content (where a "more" break point is inserted)<br />
                <?php pstl_field_textarea2('post_more_mobile'); ?>
            </p>

            <p>
                Code to add after the post content<br />
                <?php pstl_field_textarea2('post_after_mobile'); ?>
            </p>

            <h4>Page code blocks</h4>
            <p>
                Code to add before the page content<br />
                <?php pstl_field_textarea2('page_before_mobile'); ?>
            </p>

            <p>
                Code to add after the page content<br />
                <?php pstl_field_textarea2('page_after_mobile'); ?>
            </p>

            <h4>Home, categories, tags, archvies code blocks</h4>
            <p>
                Code to add before the post content<br />
                <?php pstl_field_textarea2('home_before_mobile'); ?>
            </p>

            <p>
                Code to add after the post content<br />
                <?php pstl_field_textarea2('home_after_mobile'); ?>
            </p>
            <p class="submit"><input type="submit" name="save" value="Save"/></p>
        </div>

        <a name="pstl_blocks"></a>
        <h3>
            <a href="javascript:pstl_show_hide('blocks')"><img id="img_blocks" src="<?php echo $pstl_img_right; ?>" border="0"/></a>
            Code blocks
        </h3>
        <div id="div_blocks" style="display: none">
            <p>Here you can define blocks of code to be used in the above textareas. A block is referenced 
                using the syntax "[block name]". The tag will be replaced with the block code. It's useful to define
                some common code to be used in different categories.</p>

            <?php for ($x = 1; $x < 5; $x++) { ?>
                <p>
                    Name: <input type="text" size="30" name="options[block_name_<?php echo $x; ?>]" value="<?php echo htmlspecialchars($options['block_name_' . $x]); ?>"/>
                    End date: <input type="text" size="15" name="options[block_end_<?php echo $x; ?>]" value="<?php echo htmlspecialchars($options['block_end_' . $x]); ?>"/> (yyyy-mm-dd)
                    <br />
                    <?php pstl_field_textarea2('block_code_' . $x); ?>
                </p>
            <?php } ?>

                <p class="submit"><input type="submit" name="save" value="Save" class="button button-primary"/></p>
        </div>

        <a name="pstl_htlp"></a>
        <h3>
            <a href="javascript:pstl_show_hide('help')"><img id="img_help" src="<?php echo $pstl_img_right; ?>" border="0"/></a>
            Help
        </h3>
        <div id="div_help" style="display: none">
            <p>In the code text you can use:
            <ul>
                <li>[title] - will be replaced by the post title</li>
                <li>[title_encoded] - will be replaced by the post title encoded to be used as an URL parameter</li>
                <li>[link] - will be replaced by the post permalink</li>
                <li>[link_encoded] - will be replaced by the post permalink encoded to be used as an URL parameter</li>
                <li>[author_aim] - will be replaced by the author aim</li>
                <li>[default] - used in a category block code include the "default" block code</li>
            </ul>
        </div>
    </form>
</div>
