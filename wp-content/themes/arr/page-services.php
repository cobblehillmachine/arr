<?php get_header(); ?>
<div id="slider">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
			<div class="slide " style="background-image: url('<?php echo $image[0]; ?>')"></div>
		<?php endif; ?>
	<?php endwhile; wp_reset_query();?>
	<div class="slider-logo"><img src="<?php echo get_template_directory_uri(); ?>/images/tagline-graphic.png" /></div>
</div>
<div>
	<div class="mid-cont">
		<h4>services</h4>
		<?php $the_query = new WP_Query( 'page_id=25' ); if( $the_query->have_posts() ) : while( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<h1><?php echo get_the_content(); ?></h1>
		<?php endwhile; endif; wp_reset_postdata(); ?>
		<div class="row">
		<?php query_posts(array('post_type' => 'Services', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => 6)); ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<div class="service span4 col">
					<div class="logo"><?php the_post_thumbnail('full'); ?></div>
					<h4><?php the_title(); ?></h4>
					<div class="service-info"><?php echo get_the_content(); ?></div>
				</div>
			<?php endwhile; wp_reset_query(); ?>
		</div>
		<?php $the_query = new WP_Query( 'page_id=25' ); if( $the_query->have_posts() ) : while( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<p class="button-wrapper">
			<a class="button pdf-file" target="_blank" href="<?php the_field('services_pdf'); ?>">READ MORE ABOUT OUR SERVICES</a>
		</p>
		<?php endwhile; endif; wp_reset_postdata(); ?>
	</div>
</div>
<?php while ( have_posts() ) : the_post(); ?>
	

<?php endwhile; wp_reset_query();?>
<?php get_footer(); ?>

<?php get_footer(); ?>