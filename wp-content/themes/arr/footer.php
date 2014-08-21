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
				<div class="footer-logo span2"><img src="<?php echo get_template_directory_uri(); ?>/images/footer-logo.png" /></div>
				<div class="footer-info span10">
					<div class="cont">
						<div class="span4">
							<label>north carolina office</label>
							<span><?php the_field('nc_phone', 'user_2'); ?></span>
						</div>
						<div class="span4">
							<label>south carolina office</label>
							<span><?php the_field('sc_phone', 'user_2'); ?></span>
						</div>
						<div class="span4">
							<label>email address</label>
							<a href="mailto:<?php the_field('email_address', 'user_2'); ?>"><span><?php the_field('email_address', 'user_2'); ?></span></a>
						</div>
					</div>
					<div class="cont">
						<a id="facebook" class="span4" target="_blank" href="<?php the_field('facebook_link', 'user_2'); ?>">follow us on facebook</a>
						<div id="copyright"><?php the_field('copyright', 'user_2'); ?>&nbsp;&nbsp;|&nbsp;&nbsp;site by<a  href="http://cobblehilldigital.com" target="_blank">&nbsp;cobble hill</a></div>
					</div>
				</div>
			</div>
		</div>
<?php wp_footer(); ?>

</body>
</html>