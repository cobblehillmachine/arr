<?php get_header(); ?>
<div class="mid-cont">
  <div class="case-wrap cont box case-box">
    <div class="dog-shield desktop"><img src="<?php echo get_template_directory_uri(); ?>/images/dog-shield.png" /></div>

      <div class="past-cases-container">

        <?php the_field('past_cases_page_field'); ?>

      </div>

    </div>
  </div>
</div>
<?php get_footer(); ?>
