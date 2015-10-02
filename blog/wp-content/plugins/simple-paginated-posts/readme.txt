=== Simple Paginated Posts ===
Contributors: ecatalyst, tlamedia
Donate link: http://www.tlamedia.dk/
Tags: pagination, post pagination, page pagination, navigation
Requires at least: 3.4
Tested up to: 4.1
License: GPLv2 or later
Stable tag: 0.1.6

Generate table of contents for paginated posts 

== Description ==

The Simple Paginated Posts plugin uses the native WordPress Page-Link tag `<!--nextpage-->` in combination with a shortcode tag [spp title="My title"] to generate a Table Of Contents for paginated posts.

= Implementation =
You simply define a title for the Table Of Contents (TOC) by placing a SPP shortcode tag right after the `<!--nextpage-->` tag.

Example:
<!--nextpage-->
[spp title="My title"]

The plugin can be configured to automatically add the TOC and page links to your site. You can also choose manual implementation and add the template functions to your theme.

If you choose to implement Simple Paginated Posts (SPP) manually you need to insert the SPP template functions in your theme

    spp_continued() - Displays "Continued from PREVIOUS TITLE"
    spp_toc() - Displays the Table Of Contents
    spp_link_pages() - Displays: Previous 1 2 3 4 Next

Please refer to the plugin homepage for full documentation of the template functions.

== Installation ==

1. Upload the `simple-paginated-posts` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Changelog ==

= 0.1.6 =

* Tested up to WordPress: 3.8

= 0.1.5 =

* Bugfix: Greedy title-rewrite caused incompatibility with Yet Another Related Posts Plugin

= 0.1.4 =

* Bugfix: Other plugins using wp_reset_query() would brake the plugin
* Bugfix: Uninstall now cleans up after uninstall
* Bugfix: Default implementation was not set and the default is now automatic implementation 

= 0.1.3 =

* Bugfix: In some case the titles for the TOC where not generated 

= 0.1.2 =

* Added spacing in page links

= 0.1.1 =

* Added option to override spp-template.php in theme
* Fixed problem with loading textdomain.
* Updated Danish translation

= 0.1 =

* Initial beta release.

== Upgrade Notice ==

= 0.1.1 =
Tested up to WordPress 3.5.

= 0.1 =
This is the first beta release so please don't use the plugin in production.
