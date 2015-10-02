jQuery(document).ready(function($) {

    var pickerImg1 = $('.colorpicker_img1');
    var modalBox1 = $('div#box1');
    var position1 = pickerImg1.position();
    /*modalBox1.css('margin-left', position1.left + 200);*/
    $('#colorpickerHolder1').ColorPicker({
        flat: true,
        onChange: function(hsb, hex, rgb) {
            $('#acp_buttons_background_css').val('#' + hex);
        }
    });

    var pickerImg2 = $('.colorpicker_img2');
    var modalBox2 = $('div#box2');
    var position2 = pickerImg2.position();
    /*modalBox2.css('margin-left', position2.left + 200);*/
    $('#colorpickerHolder2').ColorPicker({
        flat: true,
        onChange: function(hsb, hex, rgb) {
            $('#acp_buttons_background_hover_css').val('#' + hex);
        }
    });

    var pickerImg3 = $('.colorpicker_img3');
    var modalBox3 = $('div#box3');
    var position3 = pickerImg3.position();
    /*modalBox3.css('margin-left', position3.left + 200);*/
    $('#colorpickerHolder3').ColorPicker({
        flat: true,
        onChange: function(hsb, hex, rgb) {
            $('#acp_buttons_text_color_css').val('#' + hex);
        }
    });

    var pickerImg4 = $('.colorpicker_img4');
    var modalBox4 = $('div#box4');
    var position4 = pickerImg4.position();
    //    modalBox3.css('margin-left', position3.left + 200);
    $('#colorpickerHolder4').ColorPicker({
        flat: true,
        onChange: function(hsb, hex, rgb) {
            $('#acp_active_button_background_css').val('#' + hex);
        }
    });

    var pickerImg5 = $('.colorpicker_img5');
    var modalBox5 = $('div#box5');
    var position5 = pickerImg5.position();
    /*modalBox3.css('margin-left', position3.left + 200);*/
    $('#colorpickerHolder5').ColorPicker({
        flat: true,
        onChange: function(hsb, hex, rgb) {
            $('#acp_active_button_text_color_css').val('#' + hex);
        }
    });
    
    var pickerImg6 = $('.colorpicker_img6');
    var modalBox6 = $('div#box6');
    var position6 = pickerImg6.position();
    /*modalBox6.css('margin-left', position6.left + 200);*/
    $('#colorpickerHolder6').ColorPicker({
        flat: true,
        onChange: function (hsb, hex, rgb) {
            $('#acp_buttons_hover_text_color').val('#' + hex);
        }
    });
    
    var pickerImg7 = $('.colorpicker_img7');
    var modalBox7 = $('div#box7');
    var position7 = pickerImg7.position();
    /*modalBox7.css('margin-left', position7.left + 200);*/
    $('#colorpickerHolder7').ColorPicker({
        flat: true,
        onChange: function (hsb, hex, rgb) {
            $('#acp_load_container_css').val('rgba(' + rgb.r + ', ' + rgb.g + ', ' + rgb.b + ', 0.7)');
        }
    });

    if ($('#shortcode_default').is(':checked')) {
        $('.paging_btn_layout').hide();
    } else {
        $('.paging_btn_layout').show();
    }

    $('input[name=acp_wp_shortcode_pagination_view]').change(function() {
        if ($('#shortcode_default').is(':checked')) {
            $('.paging_btn_layout').hide();
        } else {
            $('.paging_btn_layout').show();
        }
    });
});