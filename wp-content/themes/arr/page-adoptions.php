<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="mid-cont adoptions">
	<div class="box">
		<div class="dog-shield"><img src="<?php echo get_template_directory_uri(); ?>/images/dog-shield.png" /></div>
		<div class="green"></div>
		<div class="cont top">
			<h4><?php the_title(); ?></h4>
			<div class="left-cont">
				<?php the_content(); ?>
			</div>
			<div class="right-cont">
				<?php the_field('sidebar'); ?>
			</div>
			<?php endwhile; wp_reset_query();?>
		</div>		
		<?php query_posts(array('post_type' => 'Adoptions', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => 100));
		while ( have_posts() ) : the_post(); ?>
		<div class="adoption-wrapper">
			<div class="adoption cont">
				<div class="left-cont">
					<div class="image">
						<?php
						$gallery = get_field('gallery');
						if ($gallery) { ?>
							<div class="flexslider slider">
								<?php the_field("gallery"); ?>
							</div>
							<div class="flexslider carousel">
								<?php the_field("gallery"); ?>
							</div>
						<?php } else {
							the_post_thumbnail();
						} ?>
						
					</div>
					<h1><?php the_title(); ?></h1>
					<?php the_field('summary'); ?>
					<a class="button" href="https://npo.justgive.org/ARR">SPONSOR THIS ANIMAL</a>
				</div>
				<div class="right-cont">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
		<?php endwhile; wp_reset_query();?>
	</div>
</div>

<?php get_footer(); ?>