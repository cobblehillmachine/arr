<?php get_header(); ?>
	<div class="mid-cont">
		<div class="case-wrap cont box case-box <?php the_field('case_status'); ?>">
			<div class="dog-shield desktop"><img src="<?php echo get_template_directory_uri(); ?>/images/dog-shield.png" /></div>
			<div class="stamp"><img src="<?php echo get_template_directory_uri(); ?>/images/active-case-stamp.png" /></div>
			<h4>case file</h4>
			<h1><?php the_title(); ?></h1>
			<div class="sidebar">
				<?php $photos = get_field('featured_photographs');
				if ($photos) { ?>
					<div class="sidebar-top cont feat-photographs desktop">
						<h3>featured photographs</h3>
						<div class="photos">
							<?php the_field('featured_photographs'); ?>
						</div>
					</div>
				<?php } ?>
				
				<div class="sidebar-top cont updates">
					<div class="desktop">
						<h3>case updates</h3>
						<?php query_posts(array('post_type' => 'Case Updates', 'order' => 'ASC', 'posts_per_page' => 100, 'post_parent' => $post->ID)); ?>
							<?php if(  have_posts() ) { ?>
								<?php while ( have_posts() ) : the_post(); ?>
									<a class="case-update cont" href="<?php the_permalink(); ?>">
										<h3><?php echo get_the_date(); ?></h3>
										<?php the_title(); ?>
									</a>
								<?php endwhile; wp_reset_query(); ?>
								<a class="button" href="#">view all updates</a>
							<?php } else { ?>
								<?php $the_query = new WP_Query( 'page_id=6' ); if( $the_query->have_posts() ) : while( $the_query->have_posts() ) : $the_query->the_post(); ?>
									<?php the_field('no_update_message'); ?>
								<?php endwhile; endif; wp_reset_query(); ?>
							<?php } ?>
					</div>
					<div class="mobile">
						<h3>most recent case update</h3>
						<?php query_posts(array('post_type' => 'Case Updates', 'order' => 'ASC', 'posts_per_page' => 1, 'post_parent' => $post->ID)); ?>

						<?php if(  have_posts() ) { ?>
								<?php while ( have_posts() ) : the_post(); ?>
									<a class="case-update cont" href="<?php the_permalink(); ?>">
										<h3><?php echo get_the_date(); ?></h3>
										<?php the_title(); ?>
									</a>
									<a class="button" href="#">view all updates</a>
								<?php endwhile; wp_reset_query(); ?>
							<?php } else { ?>
								<?php $the_query = new WP_Query( 'page_id=6' ); if( $the_query->have_posts() ) : while( $the_query->have_posts() ) : $the_query->the_post(); ?>
									<?php the_field('no_update_message'); ?>
								<?php endwhile; endif; wp_reset_query(); ?>
							<?php } ?>
						
					</div>
				</div>
				<div class="sidebar-bottom cont desktop">
					<h3>media reports</h3>
					<div class="reports">
						<?php the_field('media_reports'); ?>
					</div>

				</div>
			</div>
			<div class="cont-left">
				<div class="info cont">
					<h3>case summary</h3>
					<div class="active-note gray-cont cont">
						<h3>please note:</h3>
						This is an active case and only information that has been publicly reported is available at this time.
					</div>
					<?php the_field('case_summary'); ?>
				</div>
				<?php $the_query = new WP_Query( 'page_id=6' ); if( $the_query->have_posts() ) : while( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class="info cont">	
						<h3>your resources</h3>
						<?php the_field('your_resources'); ?>
						<a href="<?php the_field('donation_url'); ?>" class="button span6 donate-btn" target="_blank"><?php the_field('donation_button'); ?></a>
					</div>
				<?php endwhile; endif; wp_reset_query(); ?>
				<div class="info cont">	
					<h3>photographs</h3>
					<div class="row"><?php the_field('photographs'); ?></div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>