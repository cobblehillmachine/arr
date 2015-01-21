<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="mid-cont contact">
	<div class="box">
		<div class="dog-shield"><img src="<?php echo get_template_directory_uri(); ?>/images/dog-shield.png" /></div>
		<div class="green"></div>
		<div class="cont top">
			<h1><?php the_title(); ?></h1>
			<div id="wufoo-m7sboub0iw368r">Fill out my <a href="https://arrinc.wufoo.com/forms/m7sboub0iw368r">online form</a>.</div>
				<script type="text/javascript">var m7sboub0iw368r;(function(d, t) {
				var s = d.createElement(t), options = {
				'userName':'arrinc',
				'formHash':'m7sboub0iw368r',
				'autoResize':true,
				'height':'657',
				'async':true,
				'host':'wufoo.com',
				'header':'show',
				'ssl':true};
				s.src = ('https:' == d.location.protocol ? 'https://' : 'http://') + 'www.wufoo.com/scripts/embed/form.js';
				s.onload = s.onreadystatechange = function() {
				var rs = this.readyState; if (rs) if (rs != 'complete') if (rs != 'loaded') return;
				try { m7sboub0iw368r = new WufooForm();m7sboub0iw368r.initialize(options);m7sboub0iw368r.display(); } catch (e) {}};
				var scr = d.getElementsByTagName(t)[0], par = scr.parentNode; par.insertBefore(s, scr);
				})(document, 'script');</script>
			<div class="sidebar">
				<div class="mailing-address">
					<h4>Mailing Address</h4>
					<p><?php the_field('street_address', 'user_2'); ?><br><?php the_field('city_&_state', 'user_2'); ?></p>
					<p>Fax<br><?php the_field('fax_number', 'user_2'); ?></p>
				</div>
				<div class="email-address">
					<h4>Email Address</h4>
					<p><a href="mailto:<?php the_field('email_address', 'user_2'); ?>" target=_blank><?php the_field('email_address', 'user_2'); ?></a></p>
				</div>
				<div class="telephone_numbers">
					<h4>Phone Numbers</h4>
					<p>South Carolina Office<br><?php the_field('sc_phone', 'user_2'); ?></p>
					<p>North Carolina Office<br><?php the_field('nc_phone', 'user_2'); ?></p>
					<p class="emergencies">For emergencies, please contact Animal Control. We try to respond to all calls in a timely fashion.</p>
				</div>
			</div>
		</div>

	</div>
</div>
<?php endwhile; wp_reset_query();?>
<?php get_footer(); ?>
