<?php
/*
  Plugin Name: Post Layout
  Plugin URI: http://www.satollo.net/plugins/post-layout
  Description: Adds HTML or JavaScript code into posts and pages with per category configuration without modify the theme.
  Version: 2.2.5
  Author: Stefano Lissa
  Author URI: http://www.satollo.net
 */

add_action('admin_head', 'pstl_admin_head');

function pstl_admin_head() {
    if (isset($_GET['page']) && strpos($_GET['page'], basename(dirname(__FILE__)) . '/') === 0) {
        echo '<link type="text/css" rel="stylesheet" href="' . plugins_url('admin.css', __FILE__) . '">';
    }
}

add_filter("plugin_action_links_post-layout/plugin.php", 'pstl_plugin_action_links');

function pstl_plugin_action_links($links) {
    $settings_link = '<a href="options-general.php?page=post-layout/options.php">' . __('Settings') . '</a>';
    array_unshift($links, $settings_link);
    return $links;
}

$pstl_options = get_option('pstl');
$pstl_comments_count = 0;
$pstl_comments_number = 0;

$pstl_suffix = '';
if (pstl_mobile_type() != '')
    $pstl_suffix = '_mobile';

add_filter('comment_text', 'pstl_comment_text');

function pstl_comment_text($comment = '') {
    global $pstl_comments_count;

    $options = get_option('pstl');

    $pstl_comments_count++;
    if ($pstl_comments_count == $pstl_comments_number) {
        $comment .= $options['comment_last'];
    }
    if (get_comment_ID() == $_GET['cid']) {
        return $comment . $options['comment_after'];
    }

    return $comment;
}

add_action('the_excerpt', 'pstl_the_excerpt');

function pstl_the_excerpt($content) {
    if (!is_search() && !is_archive()) {
        return $content;
    }

    $options = get_option('pstl');

    if (!isset($options['home_excerpt'])) {
        return $content;
    }

    $mobile = pstl_mobile_type();
    $suffix = '';
    if ($mobile != '') {
        $suffix = '_mobile';
    }

    $before = $options['home_before' . $suffix];
    $after = $options['home_after' . $suffix];

    if (strpos($before, '<' . '?') !== false) {
        ob_start();
        eval('?' . '>' . $before);
        $before = ob_get_contents();
        ob_end_clean();
    }

    if (strpos($after, '<' . '?') !== false) {
        ob_start();
        eval('?' . '>' . $after);
        $after = ob_get_contents();
        ob_end_clean();
    }

    return $before . $content . $after;
}

add_action('the_content', 'pstl_the_content');

function pstl_the_content($content) {
    global $post, $pstl_comments_number;

    if (is_feed()) {
        return $content;
    }
    $options = get_option('pstl');

    if (isset($options['home_excerpt'])) {
        return $content;
    }

    $pstl_disabled = get_post_meta($post->ID, 'pstl_disabled', true);
    if ($pstl_disabled) {
        return $content;
    }
    $pstl_before_disabled = get_post_meta($post->ID, 'pstl_before_disabled', true);
    $pstl_after_disabled = get_post_meta($post->ID, 'pstl_after_disabled', true);

    $user_options = array();
    if ($options['multiauthor']) {
        $user_options = get_option('pstl' . $post->post_author);
        if (is_array($user_options)) {
            $options = array_merge($options, $user_options);
        }
    }

    $title = get_the_title();
    $title_encoded = urlencode($title);
    $link = get_permalink();
    $link_encoded = urlencode($link);

    $mobile = pstl_mobile_type();
    $suffix = '';
    if ($mobile != '') {
        $suffix = '_mobile';
    }

    $before = '';
    $after = '';
    $more = '';

    if (is_single()) {

        $pstl_comments_number = get_comments_number();

        $list = get_the_category();

        if (!$pstl_before_disabled) {
            $before = trim($options['post_before' . $suffix . $list[0]->cat_ID]);
            if ($before == '')
                $before = $options['post_before' . $suffix];
            else
                $before = str_replace('[default]', $options['post_before' . $suffix], $before);
        }

        if (!$pstl_after_disabled) {
            $after = trim($options['post_after' . $suffix . $list[0]->cat_ID]);
            if ($after == '')
                $after = $options['post_after' . $suffix];
            else
                $after = str_replace('[default]', $options['post_after' . $suffix], $after);
        }

        if ($options['post_more_size'] > 0) {
            $length = strlen(strip_tags($content));
            if ($length >= $options['post_more_size']) {
                $more = trim($options['post_more' . $suffix . $list[0]->cat_ID]);
                if ($more == '')
                    $more = $options['post_more' . $suffix];
                else
                    $more = str_replace('[default]', $options['post_more' . $suffix], $more);
            }
        }
        else {
            $more = trim($options['post_more' . $suffix . $list[0]->cat_ID]);
            if ($more == '')
                $more = $options['post_more' . $suffix];
            else
                $more = str_replace('[default]', $options['post_more' . $suffix], $more);
        }
    }
    else if (is_page()) {

        $options['comments_number'] = get_comments_number();

        if (!$pstl_before_disabled) {
            $before = $options['page_before' . $suffix];
        }
        if (!$pstl_after_disabled) {
            $after = $options['page_after' . $suffix];
        }
    } else {
        $before = $options['home_before' . $suffix];
        $after = $options['home_after' . $suffix];
    }

    $before = pstl_insert_blocks($before);
    $after = pstl_insert_blocks($after);
    $more = pstl_insert_blocks($more);

    if (strpos($before, '<' . '?') !== false) {
        ob_start();
        eval('?' . '>' . $before);
        $before = ob_get_contents();
        ob_end_clean();
    }

    $before = str_replace('[title]', $title, $before);
    $before = str_replace('[title_encoded]', $title_encoded, $before);
    $before = str_replace('[link]', $link, $before);
    $before = str_replace('[link_encoded]', $link_encoded, $before);
    $before = str_replace('[author_aim]', get_the_author_aim(), $before);

    if (strpos($after, '<' . '?') !== false) {
        ob_start();
        eval('?' . '>' . $after);
        $after = ob_get_contents();
        ob_end_clean();
    }
    $after = str_replace('[title]', $title, $after);
    $after = str_replace('[title_encoded]', $title_encoded, $after);
    $after = str_replace('[link]', $link, $after);
    $after = str_replace('[link_encoded]', $link_encoded, $after);
    $after = str_replace('[author_aim]', get_the_author_aim(), $after);


    $x = strpos($content, 'id="more');
    if ($x !== false) {
        // span end
        $x = strpos($content, '>', $x);
        if ($x !== false) {

            if (strpos($more, '<' . '?') !== false) {
                ob_start();
                eval('?' . '>' . $more);
                $more = ob_get_contents();
                ob_end_clean();
            }
            $more = str_replace('[title]', $title, $more);
            $more = str_replace('[title_encoded]', $title_encoded, $more);
            $more = str_replace('[link]', $link, $more);
            $more = str_replace('[link_encoded]', $link_encoded, $more);
            $more = str_replace('[author_aim]', get_the_author_aim(), $more);

            $content = substr($content, 0, $x + 1) . $more . substr($content, $x + 1);
        }
    }

    return $before . $content . $after;
}

function pstl_insert_blocks($code) {
    $options = get_option('pstl');
    for ($x = 1; $x < 5; $x++) {
        if ($options['block_name_' . $x] == '')
            continue;
        $date = $options['block_end_' . $x];
        if ($date != '') {
            $date = explode(',', $date);
            $time = @mktime(0, 0, 0, $date[1], $date[2], $date[0]);
            if ($time === -1 || $time === false)
                continue;
            if (time() > $time)
                $code = str_replace('[' . $options['block_name_' . $x] . ']', '', $code);
        }
        $code = str_replace('[' . $options['block_name_' . $x] . ']', $options['block_code_' . $x], $code);
    }
    return $code;
}

add_action('comment_form', 'pstl_comment_form', 99);

function pstl_comment_form() {
    $options = get_option('pstl');

    $comment = $options['comment_form'];
    echo $comment;
}

if (is_admin()) {
    add_action('admin_menu', 'pstl_admin_menu');
    add_action('edit_post', 'pstl_post_meta');
    add_action('publish_post', 'pstl_post_meta');
    add_action('save_post', 'pstl_post_meta');
    add_action('edit_page_form', 'pstl_post_meta');
    add_action('edit_form_advanced', 'pstl_post_form_meta');
    add_action('edit_page_form', 'pstl_post_form_meta');
}

function pstl_admin_menu() {
    // http://codex.wordpress.org/Adding_Administration_Menus
    $options = get_option('pstl');
    add_options_page('Post Layout', 'Post Layout', 'manage_options', 'post-layout/options.php');
    if (file_exists(dirname(__FILE__) . '/options-user.php')) {
        if ($options['multiauthor']) {
            add_submenu_page('profile.php', 'Post Layout', 'Post Layout', 5, dirname(__FILE__) . '/options-user.php');
        }
    }
}

function pstl_post_form_meta() {
    global $post;
    $pstl_disabled = get_post_meta($post->ID, 'pstl_disabled', true);
    $pstl_before_disabled = get_post_meta($post->ID, 'pstl_before_disabled', true);
    $pstl_after_disabled = get_post_meta($post->ID, 'pstl_after_disabled', true);
    $pstl_more_disabled = get_post_meta($post->ID, 'pstl_more_disabled', true);

    //$pstl_block_1 = get_post_meta($post->ID, 'pstl_block_1', true);
    //$pstl_block_1_mobile = get_post_meta($post->ID, 'pstl_block_1_mobile', true);
    ?>
    <div id="postpstl" class="postbox if-js-closed">
        <h3>Post Layout Pro</h3>
        <div class="inside">
            <p class="meta-options">
                <input type="hidden" value="1" name="pstl_edit" />
                <label for="pstl_disabled" class="selectit"> <input name="pstl_disabled" value="1" type="checkbox" <?php echo $pstl_disabled ? "checked" : ""; ?>> Disable code injection on this post.</label><br />
                <label for="pstl_before_disabled" class="selectit"> <input name="pstl_before_disabled" value="1" type="checkbox" <?php echo $pstl_before_disabled ? "checked" : ""; ?>> Disable code injection before the content.</label><br />
                <label for="pstl_more_disabled" class="selectit"> <input name="pstl_more_disabled" value="1" type="checkbox" <?php echo $pstl_more_disabled ? "checked" : ""; ?>> Disable code injection in the middle of the content.</label><br />
                <label for="pstl_after_disabled" class="selectit"> <input name="pstl_after_disabled" value="1" type="checkbox" <?php echo $pstl_after_disabled ? "checked" : ""; ?>> Disable code injection after the content.</label><br />
            </p>
        </div>
    </div>
    <?php
}

function pstl_post_meta($post_id) {
    if (isset($_POST['pstl_edit'])) {
        if (isset($_POST['pstl_disabled'])) {
            // The true param avoids multiple inserts
            add_post_meta($post_id, 'pstl_disabled', '1', true);
        } else {
            delete_post_meta($post_id, 'pstl_disabled');
        }
        if (isset($_POST['pstl_after_disabled']))
            add_post_meta($post_id, 'pstl_after_disabled', '1', true);
        else
            delete_post_meta($post_id, 'pstl_after_disabled');

        if (isset($_POST['pstl_more_disabled']))
            add_post_meta($post_id, 'pstl_more_disabled', '1', true);
        else
            delete_post_meta($post_id, 'pstl_more_disabled');

        if (isset($_POST['pstl_before_disabled']))
            add_post_meta($post_id, 'pstl_before_disabled', '1', true);
        else
            delete_post_meta($post_id, 'pstl_before_disabled');
    }
}

/**
 * Detects if the user agent is one of a mobile device (if the options are setted to do this detection).
 * Empty string is returned is it's not a mobile device.
 */
function pstl_mobile_type() {
    $options = get_option('pstl');

    if (!$options['mobile']) {
        return '';
    }

    $mobile_agents = 'android|iphone|iemobile|up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|ipod|xoom|blackberry';

    if (preg_match('#(' . $mobile_agents . ')#i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
        return 'smartphone';
    }

    return '';
}
?>
