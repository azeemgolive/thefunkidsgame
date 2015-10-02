$(document).ready(function() {
$('#featured').cycle({ 
     fx:      'scrollHorz', /*scrollHorz*/
        timeout: 0, 
        prev:    '#fet-prev',
        next:    '#fet-next',
        pager:   '#fet-nav',
 });

$('#slider').cycle({ 
     fx:      'fade', /*scrollHorz*/
        timeout: 6000, 
        prev:    '#slider-prev',
        next:    '#slider-next',
        pager:   '#slider-nav',
 });
      var owl = $("#owl-demo");

      owl.owlCarousel({

      items : 4, //10 items above 1000px browser width
      itemsDesktop : [1000,5], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0;
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
      
      });

      // Custom Navigation Events
      $(".next").click(function(){
        owl.trigger('owl.next');
      })
      $(".prev").click(function(){
        owl.trigger('owl.prev');
      })
      $(".play").click(function(){
        owl.trigger('owl.play',1000);
      })
      $(".stop").click(function(){
        owl.trigger('owl.stop');
      })


    });

  $(function() {
    $( "#tabs" ).tabs();
	$( "#accordion" ).accordion({
            heightStyle: "content",
            autoHeight: false,
        clearStyle: true,   
        });
  });