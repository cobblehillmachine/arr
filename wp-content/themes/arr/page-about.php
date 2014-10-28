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
<div class="meet-michelle">
	<div class="cont mid-cont">
		<?php while ( have_posts() ) : the_post(); ?>
		<div class='photos'>
			<?php the_field('photos'); ?>
		</div>
		<div class="content">
			<?php the_content(); ?>
		</div>
		<div class="expertise">
			<?php the_field('areas_of_expertise'); ?>
		</div>
		<?php endwhile; wp_reset_query();?>
	</div>
</div>
<div class="bottom-cont">
	<div class="cont mid-cont">
		<div class="colmn colmn-1"><?php the_field('column_1'); ?></div>
		<div class="colmn colmn-2"><?php the_field('column_2'); ?></div>
	</div>
</div>
<?php get_footer(); ?>