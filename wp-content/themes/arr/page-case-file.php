<?php get_header(); ?>
		<div class="mid-cont">
		<div class="case-wrap cont box case-box">
			<div class="dog-shield desktop"><img src="<?php echo get_template_directory_uri(); ?>/images/dog-shield.png" /></div>
				<h1>CASE FILES</h1>
				<div class="cont">
				<?php query_posts(array('post_type' => 'Case Files', 'order' => 'ASC', 'posts_per_page' => 500)); ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="span6 case-cont">
							<a href="<?php the_permalink(); ?>" class="cont-link cont">
								<div class="table">
									<div class="table-cell">
										<h3><?php the_field("optional_date_of_case") ?></h3>
										<h2><?php the_title(); ?></h2>			
										<div class="button">read full case</div>
									</div>

								</div>
							</a>
						</div>
					<?php endwhile; wp_reset_query(); ?>
					<div class="span6 case-cont">
						<a href="<?php the_field("pdf_file"); ?>" target=_blank class="cont-link cont">
							<div class="table">
								<div class="table-cell">
									<h2>See More Past Cases</h2>			
									<div class="button">Download PDF</div>
								</div>

							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>