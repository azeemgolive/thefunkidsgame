/*!
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */
(function(a){a.fn.alResizeIcon=function(){this.find("i.al-icon-fa").each(function(){var g=a(this);var j=g.parent(".al-icon-circle");if(j.length>0){var f=g.height();var d=g.width();var c=Math.round((f-d)/2);var e=g.data("size");if(f<40){f=40}var i=f*0.5+"px "+(f*0.5+c)+"px";j.css("padding",i);j.css("-webkit-border-radius",f*2+"px");j.css("-moz-border-radius",f*2+"px");j.css("border-radius",f*2+"px");var b=0.1;if(e&&e!=""){b=e*0.1}if(b<=0.1){b=2+"px"}else{b+="em"}j.css("border-width",b);var h=g.data("color");if(h){j.css("border-color",h)}}})};a(window).load(function(){a("body").alResizeIcon()})})(jQuery);