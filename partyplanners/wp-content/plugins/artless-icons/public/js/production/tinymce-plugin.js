/*!
 * @package    artless Icons
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */
(function(){var a;tinymce.create("tinymce.plugins.al_icons_plugin",{init:function(b,c){a=c;b.addButton("al_icons_button",{title:"Insert Icons",cmd:"al-icons",image:a+"/../../img/icon-artless.png"});b.addCommand("al-icons",function(){tinyMCE.activeEditor.windowManager.open({file:a+"/../../../application/popup/popup.php",title:"artless Icon Picker",width:720,height:420,inline:1})})},getInfo:function(){return{longname:"artless Icons ",author:"artless",authorurl:"http://artlessthemes.com/",infourl:"http://wiki.moxiecode.com/",version:"0.1"}}});tinymce.PluginManager.add("al_icons_button",tinymce.plugins.al_icons_plugin)})();