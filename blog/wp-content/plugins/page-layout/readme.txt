=== Page Layout ===
Contributors: Luca Realdi
Tags: page, layout, cms, widget, widgets
Requires at least: 2.9.2
Tested up to: 3.0 beta
Stable tag: 0.3

Page Layout allows to define a page layout using widgets.

== Description ==

**WARNING: USE ONLY WITH JAVASCRIPT! The backend of this plugin works only with browser with javascript enabled**

This plugin allows to dynamically activate the widgets system on a WordPress page, creating complex layouts.

You can define new layout via the function `register_layout()` in the function.php file of your theme.
The plugin define two sample defaults layouts that you can see in Screenshots section.

e.g.
`
<?php
// <your_theme>/function.php
if ( function_exists('register_layout') ){
	register_layout(array(
		'name' => 'Name of Layout',
		'zones' => array( 'name of zone one', 'name of zone two', 'name of zone three' [, ...] ),
		'thumbnail' => 'thumbnail-of-layout.jpg', // with extension (jpg/gif/png)
		'template' => 'name-of-php-template-file' // without extension
	));
}
?>
`
The code of the new template plans to use a new property of the global object $post: $post-> layout

e.g.

`
<?php 
$zones = $post->layout['zones'];
foreach ($zones as $zone){
	dynamic_sidebar($zones[0])
}
?>
`

 * The php template file should be placed in the folder `layouts` of your theme folder (`/wp-content/themes/<your_theme>/layouts/<name-of-php-template-file>.php`) or in the plugin folder (`/wp-content/plugins/page-layout/layouts/<name-of-php-template-file>.php`) if you want the layout to be independent from the theme. 
 
 * The thumbnail should be placed in the child folder of `layouts`: `layouts/thumb/<thumbnail-of-layout.jpg>`.

 * If you want to include also a related css file separate from the theme installed you can create it in `/wp-content/plugins/page-layout/css/page-layout-general.css` or for each php template `/wp-content/plugins/page-layout/css/page-layout-<name-of-php-template-file>.css`.

 * The plugin include a simple widget to display the content of current page

== Installation ==

1. Unpack the download-package
1. Upload the file to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Register (if you need) a new layout. Create and put the files of new layout in the folder `<your_theme>/layouts` and `<your_theme>/layouts/thumb`
1. Edit or add a WordPress Page and click in the metabox Page Layout
1. Select a layout and drag some widget into their areas (the mechanism is similar to that of sidebars)
1. Save and save...
1. Visit the page and modify your css file as you want


== Changelog ==

= 0.3 =

* Fix child theme bugs (thanks to Lukasz Muchlado lukasz[at]bapro[dot]pl)

= 0.2 =

* Fix widget.js (a fork of wp widget.js)

= 0.1 =

* First release...

== Screenshots ==

See http://keceloce.net/wordpress-page-layout/


== Other Notes ==

= Licence =

This plugin is released under the GPL, you can use it free of charge on your personal or commercial blog.

= Translations =

If you want to help to translate the plugin to your language, please have a look at the .pot file which contains all defintions and may be used with a [gettext](http://www.gnu.org/software/gettext/) editor like [Poedit](http://www.poedit.net/) (Windows).
Please refer to the [WordPress Codex](http://codex.wordpress.org/Installing_WordPress_in_Your_Language "Installing WordPress in Your Language") for more information.