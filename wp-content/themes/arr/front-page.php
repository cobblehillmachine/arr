<?php get_header(); ?>
	<div id="slider">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php if (has_post_thumbnail( $post->ID ) ): ?>
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
				<div class="slide " style="background-image: url('<?php echo $image[0]; ?>')"></div>
			<?php endif; ?>
		<?php endwhile; wp_reset_query();?>
		
		<div class="slide-overlay"></div>
		<div class="slider-logo"><img src="<?php echo get_template_directory_uri(); ?>/images/tagline-graphic.png" /></div>
	</div>
	<div id="about" class="cont section">
		<div class="mid-cont">
			<div class="dog-shield"><img src="<?php echo get_template_directory_uri(); ?>/images/dog-shield.png" /></div>
			<h3><?php the_field('small_tagline'); ?></h3>
			<h1><?php the_field('big_tagline'); ?></h1>
			<div class="intro row">
				<?php the_field('intro_paragraph'); ?>
			</div>
			<div class="box non-profit-info">
				<?php the_field('non_profit_info'); ?>		
			</div>
			<a class="pet-finder button box-button" href="<?php the_field('pet_finder_link'); ?>" target="_blank">
				<?php the_field('pet_finder_text'); ?>
			</a>			
		</div>
	</div>
	<div id="services" class="cont gray-cont center">
		<div class="mid-cont">
			<h3>services</h3>
			<?php $the_query = new WP_Query( 'page_id=25' ); if( $the_query->have_posts() ) : while( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<h1><?php echo get_the_content(); ?></h1>
			<?php endwhile; endif; wp_reset_postdata(); ?>
			<div class="row">
			<?php query_posts(array('post_type' => 'Services', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => 6)); ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<div class="service span4 col">
						<div class="logo"><?php the_post_thumbnail('full'); ?></div>
						<h3><?php the_title(); ?></h3>
						<h2><?php echo get_the_content(); ?></h2>
					</div>
				<?php endwhile; wp_reset_query(); ?>
			</div>
			
		</div>
	</div>
	<div id="meet-michelle" class="cont section">
		<div class="mid-cont">
			<?php $the_query = new WP_Query( 'page_id=19' ); if( $the_query->have_posts() ) : while( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="photo span2">
					<?php the_post_thumbnail('full'); ?>
				</div>
				<div class="bio span6 col">
					<h3><?php the_field('small_tagline'); ?></h3>
					<h1><?php the_field('big_tagline'); ?></h1>
					<div class="cont">
						<?php the_field('intro_paragraph'); ?>
					</div>
					<?php if ( get_post_meta($post->ID, 'pfd_file', true) ) { ?>
					<a class="button pdf-file" target="_blank" href="<?php the_field('pdf_file'); ?>"><?php the_field('pdf_title'); ?></a>
					<?php } ?>
				</div>
				<div class="expertise span4 col">
					<div class="box">
						<?php the_field('expertise_areas'); ?>
					</div>
				</div>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div>
	<div id="case-file" class="cont gray-cont">
		<div class="mid-cont">
			<?php query_posts(array('posts_per_page'=>1)); while (have_posts()) : the_post(); ?>

					<div class="cont box case-box">
						<div class="stamp desktop"><img src="<?php echo get_template_directory_uri(); ?>/images/active-case-stamp.png" /></div>
						<h3>case file</h3>
						<h1><?php the_title(); ?></h1>
						<div class="intro">
							<!--<?php// the_excerpt(); ?>-->
							<?php the_field('case_summary'); ?>
						</div>
						
					
					</div>
					<!-- <a class="button box-button" href="<?php the_permalink(); ?>">LEARN MORE ABOUT THIS CASE IN OUR CASE FILE</a> -->
			<?php endwhile; wp_reset_query(); ?>
		</div>
	</div>
<?php get_footer(); ?>
