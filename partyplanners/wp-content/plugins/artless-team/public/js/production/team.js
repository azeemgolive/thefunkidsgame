/*!
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */
(function(d){var f=d("#al-team-tabs");var c=d("#al-team");var e=c.find("li");function a(){var g=0;e.each(function(){d(this).height("auto");if(d(this).height()>g){g=d(this).height()}});e.each(function(){d(this).height(g)})}if(c.length>0){d(window).load(function(){if(f.length>0){var g=d("#al-team-tabs>li:first").data("filter");c.mixitup({targetSelector:".al-team-mix",filterSelector:".al-team-filter",showOnLoad:g,onMixLoad:function(){a()}})}else{a()}});var b=0;d(window).resize(function(){if(b){clearTimeout(b)}b=setTimeout(a,500)})}})(jQuery);