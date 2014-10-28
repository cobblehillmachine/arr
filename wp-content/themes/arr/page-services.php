<?php get_header(); ?>
<div id="slider">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
			<div class="slide " style="background-image: url('<?php echo $image[0]; ?>')"></div>
		<?php endif; ?>
	<?php endwhile; wp_reset_query();?>
	<div class="slider-logo"><img src="<?php echo get_template_directory_uri(); ?>/images/tagline-graphic.png" /></div>
	<div class="dog-shield"><img src="<?php echo get_template_directory_uri(); ?>/images/dog-shield.png" /></div>
</div>
<div class="services cont center">
	<div class="mid-cont">
		<h4>services</h4>
		<?php $the_query = new WP_Query( 'page_id=25' ); if( $the_query->have_posts() ) : while( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<h1><?php echo get_the_content(); ?></h1>
		<?php endwhile; endif; wp_reset_postdata(); ?>
		<div class="row">
		<?php query_posts(array('post_type' => 'Services', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => 6)); ?>

			<?php while ( have_posts() ) : the_post(); ?>
			<a href="#<?php the_title(); ?>">
				<div class="service span4 col">
					<div class="logo"><?php the_post_thumbnail('full'); ?></div>
					<h4><?php the_title(); ?></h4>
					<div class="service-info"><?php the_field('preview') ?></div>
				</div>
			</a>
			<?php endwhile; wp_reset_query(); ?>
		</div>
	</div>
</div>


<?php query_posts(array('post_type' => 'Services', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => 3)); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="single-service" id="<?php the_title(); ?>">
	<div class="mid-cont">
		<h4><?php the_field('preview'); ?></h4>
		<h1><?php the_field('header'); ?></h1>
		<div class="content">
			<?php the_content();
			$cta = get_field('optional_cta');
			$second_column = get_field('second_column');
			if ($cta && !$second_column) { ?>
				<div class="cta"><?php the_field('optional_cta'); ?></div>
			<?php } ?>
		</div>
		<?php
		if ($second_column) { ?>
			<div class="content colmn-2">
				<?php the_field('second_column'); ?>
				<div class="cta"><?php the_field('optional_cta'); ?></div>
			</div>
		<?php }
		$slider = get_field('slider_images');
		if ($slider) { ?>
			<div class="box slider-wrapper">
				<div class="flexslider">

						<?php the_field('slider_images'); ?>

				</div>
			</div>
		<?php } ?>
	</div>
</div>
<?php endwhile; wp_reset_query(); ?>

<div class="stories-wrapper">
	<div class="mid-cont">
		<div class="stories">
			<div class="green"></div>
		<?php query_posts(array('post_type' => 'Stories', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => 10));
		while ( have_posts() ) : the_post(); ?>
			<div class="header">
				<h4>Past Rehabilitated Animals</h4>
				<h2><?php the_title(); ?></h2>
			</div>
			<div class="content"><?php the_content(); ?></div>
			<div class="box">Learn more about this case</div>
		<?php endwhile; wp_reset_query();?>
		</div>
	</div>
</div>

<?php get_footer(); ?>













