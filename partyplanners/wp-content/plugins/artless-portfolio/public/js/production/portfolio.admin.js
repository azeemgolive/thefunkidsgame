/*!
 * @package    artless Maps
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */
(function(b){function a(){b("[id^=al_pf]:not([id^=al_pf_og]).postbox").hide();var c=b("#post-formats-select").find("input:checked").val();b("#al_pf_"+c+"").show()}a();b("#post-formats-select").on("change.post-format",function(){a()})})(jQuery);