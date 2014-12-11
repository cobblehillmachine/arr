<?php
/**
* Template Name: Template - Services
* Description: Home page Template
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/

get_header(); the_post(); ?>

<div id="slider">
	<?php if( has_post_thumbnail( $post->ID ) ) : $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
		<div class="slide " style="background-image: url('<?php echo $image[0]; ?>')"></div>
	<?php endif; wp_reset_postdata(); ?>
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
			<?php query_posts( array('post_type' => 'Services', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => 6) ); ?>
				<a href="#<?php the_title(); ?>">
					<div class="service span4 col">
						<div class="logo"><?php the_post_thumbnail('full'); ?></div>
						<h4><?php the_title(); ?></h4>
						<div class="service-info"><?php the_field('preview') ?></div>
					</div>
				</a>
			<?php wp_reset_query(); ?>
		</div>
	</div>
</div>


<?php $loop = new WP_Query( array('post_type' => 'Services', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => 3) ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
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
						<div class="flexslider">
							<ul class="slides">
								<?php query_posts(array('post_type' => 'Stories', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => 10));
								while ( have_posts() ) : the_post(); ?>
								<li>
									<div class="header">
										<h4>Past Rehabilitated Animals</h4>
										<h1><?php the_title(); ?></h1>
									</div>
									<?php $case_file = get_field('link_to_case_file');
									if ($case_file) { ?>
										<div class="content-button"><?php the_content(); ?></div>
										<a class="button case-file-yes" href="<?php the_field("link_to_case_file"); ?>">Read More About This Case</a>
										<?php }  else { ?>
											<div class="content"><?php the_content(); ?></div>
											<?php } ?>
											<div class="story-images">
												<?php the_field('before_and_after_images'); ?>
											</div>
										</li>
									<?php endwhile; wp_reset_query();?>
								</ul>
							</div>
						</div>
					</div>
				</div>

<?php get_footer(); ?>
