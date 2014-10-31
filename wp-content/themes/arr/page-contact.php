<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="mid-cont contact">
	<div class="box">
		<div class="dog-shield"><img src="<?php echo get_template_directory_uri(); ?>/images/dog-shield.png" /></div>
		<div class="green"></div>
		<div class="cont top">
			<h4><?php the_title(); ?></h4>
			<?php $subheading = get_field('subheading');
			if ($subheading) { ?>
				<h2><?php the_field('subheading'); ?></h2>
			<?php } ?>			
			<?php the_content(); ?>
			<div class="sidebar">
				<div class="mailing-address">
					<h4>Mailing Address</h4>
					<p><?php the_field('street_address', 'user_2'); ?><br><?php the_field('city_&_state', 'user_2'); ?></p>
				</div>
				<div class="email-address">
					<h4>Email Address</h4>
					<p><?php the_field('email_address', 'user_2'); ?></p>
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