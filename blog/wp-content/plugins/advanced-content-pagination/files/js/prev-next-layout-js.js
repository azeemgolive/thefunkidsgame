jQuery(document).ready(function ($) {

    init_buttons_width();

    var layoutBoth = $('acp_layout_both').length;

    var buttons = [];
    var buttonsCount = $('ul.paging_btns:first li.button_style').size();
    var secondButton = $('ul.paging_btns li#item2');
    var bool = true;
    var hasClassNbox = $('ul.paging_btns li.button_style').hasClass('nbox');


    $('ul.paging_btns:first li.button_style').each(function (i) {
        if (i == 1 && bool) {
            buttons[i] = secondButton;
            buttons[i + 1] = $(this);
            bool = false;
        }
        else {
            if (bool) {
                buttons[i] = $(this);
            } else {
                buttons[i + 1] = $(this);
            }
        }
    });
    buttons.pop();

    $('ul.paging_btns li.button_style').live('click', function () { 
        var itemId = $(this).attr('id');
        var clickedItemId = parseInt(itemId.substring(4));        
        var prev = 0;
        var next = 0;

        if (clickedItemId == 1) {
            prev = buttonsCount - 1;
            next = 1;
        } else if (clickedItemId == buttonsCount) {
            prev = buttonsCount - 2;
            next = 0;
        } else {
            prev = clickedItemId - 2;
            next = clickedItemId;
        }
        var nBox = hasClassNbox ? 'nbox' : '';
        var buttonsHtml = '';
        if($(this).hasClass('only_prev_next')){
            var next_title = $('#acp_only_next').val();
            var prev_title = $('#acp_only_prev').val();
            buttonsHtml = "<li class='button_style " + nBox + "acp_previous_page only_prev_next item" + (parseInt(prev) + 1) + "' id='item" + (parseInt(prev) + 1) + "'><div class='acp_title'>" + prev_title + "</div></li>";
            buttonsHtml += "<li  class='button_style " + nBox + " acp_next_page only_prev_next item" + (parseInt(next) + 1) + "' id='item" + (parseInt(next) + 1) + "'><div class='acp_title'>" + next_title + "</div></li>";
        }else{
            buttonsHtml = "<li class='button_style " + nBox + "acp_previous_page item" + (parseInt(prev) + 1) + "' id='item" + (parseInt(prev) + 1) + "'>" + buttons[prev].html() + "</li>";
            buttonsHtml += "<li  class='button_style " + nBox + " acp_next_page item" + (parseInt(next) + 1) + "' id='item" + (parseInt(next) + 1) + "'>" + buttons[next].html() + "</li>";
        }
        $('ul.paging_btns').html(buttonsHtml);
        init_buttons_width();
    });

    function init_buttons_width() {
        var width = $('.acp_wrapper').innerWidth();
        var newWidth;
        var caruselWidth = width;
        var isNumeric = $('ul.paging_btns li').hasClass('nbox');
        var itemsFullWidth;

        if (!isNumeric) {
            if (width < 500) {
                width = (width / 2) - 2;
            }
            else if (width >= 500 && width <= 750) {
                width = width / 3;
            }
            else if (width > 750) {
                width = width / 4;
            }
            width = width - 2;
            $('ul.paging_btns li.button_style').css('width', width + 'px');
        } else {
            var numericItemsWidth = $('ul.paging_btns li.nbox').outerWidth(true);
            $('ul.paging_btns li.button_style').css('width', 'auto');
            $('ul.paging_btns li.button_style').css('height', 'auto');
        }
    }
});