<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

		</div>
		<div id="footer" class="cont">
			<div class="mid-cont">
				<div class="social">
					<a href="http://instagram.com/valiantanimalrescue"><i class="fa fa-instagram"></i></a>
					<a href="https://www.facebook.com/animalrescuerelief"><i class="fa fa-facebook"></i></a>
				</div>
				<div class="footer-info">
					<span class="copyright">
						<?php the_field('copyright', 'user_2'); ?>
					</span>
					<span class="break">|</span>
					<span class="cobblehill">
						<a href="http://cobblehilldigital.com" target="_blank">site by&nbsp;cobble hill</a>
					</span>
				</div>
			</div>
		</div>
<?php wp_footer(); ?>

</body>
</html>
