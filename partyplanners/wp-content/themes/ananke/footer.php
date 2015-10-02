<?php
/**
 * The template for displaying the footer
 */
 global $theme_option; 
?>

<div id="footer" style="<?php if($theme_option['background_footer']){ echo esc_attr( 'background-color: '.$theme_option['background_footer'].';' ); } ?>
 <?php if($theme_option['color_footer']){ echo esc_attr( 'color:'.$theme_option['color_footer'].';' ); } ?>">
	<a class="scroll" href="#home"><div class="back-top">&#xf102;</div></a>	
	<div class="container">
		<div class="sixteen columns">
			<?php echo htmlspecialchars_decode($theme_option['footer_text']); ?>
		</div>
	</div>	
</div>
<?php wp_footer(); ?>




<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-58113944-7', 'auto');
  ga('send', 'pageview');

</script>









</body>
</html>