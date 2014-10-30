<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="mid-cont adoptions">
	<div class="box">
		<div class="dog-shield"><img src="<?php echo get_template_directory_uri(); ?>/images/dog-shield.png" /></div>
		<div class="green"></div>
		<div class="cont top">
			<h4><?php the_title(); ?></h4>
			<h2><?php the_field('subheading'); ?></h2>
			
		</div>
		
	</div>
</div>
<?php endwhile; wp_reset_query();?>
<?php get_footer(); ?>