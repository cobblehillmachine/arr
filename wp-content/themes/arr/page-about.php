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
<?php while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
	<?php the_field('areas_of_expertise'); ?>
<?php endwhile; wp_reset_query();?>
<?php get_footer(); ?>