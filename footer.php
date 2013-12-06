<?php
/**
 * @package WordPress
 * @subpackage designosource-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
?>
<?php /*
		<footer id="footer" class="source-org vcard copyright">
			<small>&copy;<?php echo date("Y"); echo " "; bloginfo('name'); ?></small>
		</footer>

	</div>
*/
?>
</div>

	<?php wp_footer(); ?>





<!-- here comes the javascript -->

<!-- jQuery is called via the WordPress-friendly way via functions.php -->

<!-- this is where we put our custom functions -->

<?php
  if(is_page_template('front-page.php')){
    ?>
    <script src="<?php bloginfo('template_directory'); ?>/_/js/home.js"></script>
    <?php
  }
?>
<script src="<?php bloginfo('template_directory'); ?>/_/js/functions.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45928778-1', 'designosource.be');
  ga('send', 'pageview');

</script>

</body>

</html>
