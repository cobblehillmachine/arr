<?php get_header(); ?>
	<div class="mid-cont">
		<div class="case-wrap cont box case-box <?php the_field('case_status'); ?>">
			<div class="dog-shield desktop"><img src="<?php echo get_template_directory_uri(); ?>/images/dog-shield.png" /></div>
			<div class="stamp"><img src="<?php echo get_template_directory_uri(); ?>/images/active-case-stamp.png" /></div>
			<h4>case update:&nbsp;<span><?php echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent ); ?></span></h4>
			<h1><?php the_title(); ?></h1>
			<div class=" sidebar ">
				<div class="sidebar-top cont sidebar-update">
					<h3>related case file</h3>
					<span class="related"><?php echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent ); ?></span>
					<a class="button" href="<?php global $post; $parentId = $post->post_parent; $linkToParent = get_permalink($parentId); echo $linkToParent; ?>">view the case file</a>

				</div>
				<div class="sidebar-bottom cont">
					<h3>related case updates</h3>
					<?php query_posts(array('post_type' => 'Case Updates', 'order' => 'ASC', 'posts_per_page' => 100, 'post_parent' => $post->post_parent, 'post__not_in' => array( get_the_ID() ))); ?>
					<?php if(  have_posts() ) { ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<a class="case-update cont" href="<?php the_permalink(); ?>">
								<h3><?php echo get_the_date(); ?></h3>
								<?php the_title(); ?>
							</a>
						<?php endwhile; wp_reset_query(); ?>
						<?php } else { ?>
							<?php $the_query = new WP_Query( 'page_id=6' ); if( $the_query->have_posts() ) : while( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<?php the_field('no_update_message'); ?>
							<?php endwhile; endif; wp_reset_query(); ?>
							<?php } ?>
						</div>
					</div>
			<div class="cont-left ">
				<div class="info cont updates">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; wp_reset_query(); ?>
				</div>
			</div>

		</div>
	</div>
<?php get_footer(); ?>
